<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar extends CI_Controller{

    public $configsite;

	function __construct(){
		parent::__construct();
		
		session_start();
		
        date_default_timezone_set('America/Sao_Paulo');

        //Carrega Configurações Básicas do Site
		$this->load->model("GconfigSiteModel");
        $this->configsite = $this->GconfigSiteModel;
        $this->configsite->carregar();
		
	}
	
	function listar_navbar(){
		
		$this->load->model("NavbarModel");
		$n = $this->NavbarModel;
        $dados['navbar'] = $n->listar_navbar();

        // carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
        $dados['filial'] = $f->listar_filiais();

        $this->load->model("PaginasModel");
        $p = $this->PaginasModel;
        $dados['pagina'] = $p->listar_paginas_pesquisa_dinamico();
		
		$this->load->view("admin/CNavbarListarView.php", $dados);
		
    }//Fim da função listar 
    
    function novo_navbar(){

        // carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
        $dados['filial'] = $f->listar_filiais();

        $this->load->model("PaginasModel");
        $p = $this->PaginasModel;
        $dados['pagina'] = $p->listar_paginas_pesquisa_dinamico();
		
		$this->load->view("admin/CNavbarNovoView.php", $dados);
		
	}//Fim da função novo 
	
	function inserir_Navbar(){
	
		$this->load->model("NavbarModel");
		$n = $this->NavbarModel;
        
        if($this->input->post("txtSubmenu") == 'S'){
            $sub = $n->idmenudrop = $this->input->post("txtIdmenudrop");
           
        } else {
            $n->idmenudrop = NULL;
            
        }

        if($this->input->post("txtIdmenudrop") != ''){
            $n->idmenudrop = $this->input->post("txtIdmenudrop"); 
        }

        if($this->input->post("txtIdsubdrop") != ''){
            $n->idsubdrop = $this->input->post("txtIdsubdrop");
            $n->idmenudrop = $this->input->post("txtIdmenudrop");
            
        } else {
            $n->idsubdrop = NULL;
            
        }
       

        $n->id = $this->input->post("txtIdNavbar");
        $n->idsetor = 1;
        $n->filial = $this->input->post("txtFilial");
        $n->menu = $this->input->post("txtMenu");
        $drop = $n->dropdown = $this->input->post("txtDropdown");
       
        $n->posicao = $this->input->post("txtPosicao");
        if($drop == 'S'){
            $n->link = '#';
        } else {
            if($this->input->post("txtFilial") == 2){
                $controller = 'colegio';
            } else {
                $controller = 'integradas';
            }

            $target = $this->input->post("txtTarget");

            if($target == 'DINAMICA'){

                $url = str_replace(" ", "-", strtolower($this->input->post("txtLink_D")));
		        $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
		        $url_pronta = $url_nova;
			
                $n->link = $controller."/pagina/";
                $linkparte1 = $controller."/pagina/";
                $linkparte3 = $url_pronta;
                $linkmontado = true;
                
            } elseif($target == 'CURSO'){

                $url = str_replace(" ", "-", strtolower($this->input->post("txtLink_D")));
		        $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
		        $url_pronta = $url_nova;
			
                $n->link = $controller."/cursos/";
                $linkparte1 = $controller.'/cursos/';
                $linkparte3 = $url_pronta;
                $linkmontado = true;

            } else {

                $url = str_replace(" ", "-", strtolower($this->input->post("txtLink")));
		        $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
                $url_pronta = $url_nova;
                
                $n->link = $url_pronta;
                $linkmontado = false;
            }
            
        }
        $n->target = $this->input->post("txtTarget");

        
        $n->tipo = $this->input->post("txtTipo");
        $n->status = $this->input->post("txtStatus");
        $n->criadopor = $_SESSION['login'][0]->login;
		$n->criadoem = date('Y-m-d H:i');
		
		$id_navbar = $n->inserir();
		
		if($id_navbar){

            // atualiza o link da pagina
            if($linkmontado == true){
                $n->link = $linkparte1.$id_navbar.'/'.$linkparte3;
                $n->id = $id_navbar;
                $n->atualizar_link();
            } 

            

            if($this->input->post("txtSubmenu") == 'S'){
                redirect(base_url("Navbar/editar_navbar/" . $sub . "?aba=drop"));
            } else {
                redirect(base_url("Navbar/editar_navbar/" . $id_navbar));
            }
		}
		else{
			redirect(base_url("Navbar/listar_navbar?ret=N"));
		}
	
	}//Fim da função inserir setor
	
	function editar_navbar($id_navbar){
		
		$this->load->model("NavbarModel");
		$n = $this->NavbarModel;
		$n->id = $id_navbar;
        $n->carregar();

        $s = $this->NavbarModel;
        $s->id = $id_navbar;
        $dados['navbar'] = $s->listar_navbar_dropdown();

        $s = $this->NavbarModel;
        $s->id = $id_navbar;
        $dados['navbar_sub'] = $s->listar_navbar_dropdown_sub();
        
         // carregar as filiais
         $this->load->model("GfilialModel");
         $f = $this->GfilialModel;
         $dados['filial'] = $f->listar_filiais();

         $this->load->model("PaginasModel");
         $p = $this->PaginasModel;
         $dados['pagina'] = $p->listar_paginas_pesquisa_dinamico();

		$this->load->view("admin/CNavbarEditarView.php", $dados);
		
	}//Fim da função editar setor
	
	function atualizar_navbar($id_navbar){
	
		$this->load->model("NavbarModel");
		$n = $this->NavbarModel;
		$n->id = $id_navbar;
		$n->carregar();
		
        $n->idmenudrop = $this->input->post("txtIdmenudrop");
        $n->id = $id_navbar;
        $n->idsetor = 1;
        $n->filial = $this->input->post("txtFilial");
        $n->menu = $this->input->post("txtMenu");
        $drop = $n->dropdown = $this->input->post("txtDropdown");
       
        $n->posicao = $this->input->post("txtPosicao");
        if($drop == 'S'){
            $n->link = '#';
        } else {
            // verifica filial
            if($this->input->post("txtFilial") == 2){
                $controller = 'colegio';
            } else {
                $controller = 'integradas';
            }

            // verifica
            if($this->input->post("txtTarget") == 'DINAMICA'){

                $url = str_replace(" ", "-", strtolower($this->input->post("txtLink_D"))); //antes estava txtMenu
		        $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
                // $n->link = $controller."/pagina/".$id_navbar."/".$url_nova;
                $n->link = $this->input->post("txtLink_D");

            }elseif($this->input->post("txtTarget") == 'CURSO'){

                $url = str_replace(" ", "-", $this->input->post("txtMenu"));
		        $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
                $n->link = $controller."/cursos/".$id_navbar."/".$url_nova;

            } else {
                $target = $this->input->post("txtTarget");

                $url = str_replace(" ", "-", $this->input->post("txtLink_D"));
                $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
            
                $n->link = $url_nova;

                if($this->input->post("txtLink_D") == 'DINAMICA'){

                    $url = str_replace(" ", "-", strtolower($this->input->post("txtMenu")));
                    $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
                    $n->link = $controller."/pagina/".$id_navbar."/".$url_nova;
    
                }elseif($this->input->post("txtLink_D") == 'CURSO'){
    
                    $url = str_replace(" ", "-", $this->input->post("txtMenu"));
                    $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
                    $n->link = $controller."/cursos/".$id_navbar."/".$url_nova;
    
                } else {
                    $target = $this->input->post("txtLink_D");
    
                    $url = str_replace(" ", "-", $this->input->post("txtLink_D"));
                    $url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
                
                    $n->link = $url_nova;
    
                    
                }

                
            }
        }
        
        $n->target = $this->input->post("txtTarget");
        $n->tipo = $this->input->post("txtTipo");
        $n->status = $this->input->post("txtStatus");
        $n->modificadopor = $_SESSION['login'][0]->login;
        $n->modificadoem = date('Y-m-d H:i');
        $n->subdrop = $this->input->post("txtSubdrop");
		
		if($n->atualizar()){
			redirect(base_url("Navbar/editar_navbar/" . $id_navbar . "?ret=S"));
		}
		else{
			redirect(base_url("Setor/editar_navbar/" . $id_navbar . "?ret=N"));
		}
	
	}//Fim da função atualizar setor
	
	function excluir_navbar($controler){
    
        
		$this->load->model("NavbarModel");
		$n = $this->NavbarModel;
        $n->id = $this->input->post("txtIdNavbar_del");
        
        $sql = "select id
        
                    from navbar
                    
                where idmenudrop = ?";

        $query = $this->db->query($sql, array($this->input->post("txtIdNavbar_del")));

        $retorno = $query->result();

        
            if(count($retorno == 0)){
		
                if($n->excluir()){
                    if($controler == 'listar_navbar'){
                        $retornar = redirect(base_url("Navbar/listar_navbar"));
                    } else {
                        $idpai = $this->input->post("txtIdpai");
                        $retornar = redirect(base_url("Navbar/editar_navbar/".$idpai."/?aba=drop")); 
                    }
                }
                else{
                    redirect(base_url("Navbar/listar_navbar?ret=N"));
                }
            } else {
                redirect(base_url("Navbar/listar_navbar?ret=N"));
            }
	
    }//Fim da função excluir setor

    function excluir(){
    
        
		$this->load->model("NavbarModel");
		$n = $this->NavbarModel;
        $n->id = $this->input->post("txtIdNavbar_del");
        $idpai = $this->input->post("txtIdpai");
        
        $sql = "select id
        
                    from navbar
                    
                where idmenudrop = ?";

        $query = $this->db->query($sql, array($this->input->post("txtIdNavbar_del")));

        $retorno = $query->result();

        if($n->excluir()){
                    
            redirect(base_url("Navbar/editar_navbar/".$idpai."/?aba=drop")); 
                    
        }
        else{
            redirect(base_url("Navbar/listar_navbar?ret=N"));
        }
    
	
    }//Fim da função excluir setor
	
}

?>