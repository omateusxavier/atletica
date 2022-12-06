<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller{

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
	
	function listar_paginas(){
		
		$this->load->model("PaginasModel");
		$p = $this->PaginasModel;
		$dados['paginas'] = $p->listar_paginas();

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
        $dados['filial'] = $f->listar_filiais();
		
		$this->load->view("admin/CPaginasListarView.php", $dados);
		
	}//Fim da função listar paginas
	
	function nova_pagina(){
		
		$this->load->model("SetoresModel");
		$set = $this->SetoresModel;
		$dados['setores'] = $set->listar_setores();
		
		$this->load->model("GaleriasModel");
		$ga = $this->GaleriasModel;
		$dados['galerias'] = $ga->listar_galerias();

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
		$dados['filial'] = $f->listar_filiais();
		
		// carrega as paginas sem vinculos

		$this->load->model("PaginasModel");
		$p = $this->PaginasModel;
		$dados['paginas'] = $p->listar_paginas_p_vinculo();
		
		$this->load->view("admin/CPaginasNovaView.php", $dados);
		
	}//Fim da função nova pagina
	
	function inserir_pagina(){
	
		$this->load->model("PaginasModel");
		$p = $this->PaginasModel;

		$filial = $p->id_filial = $this->input->post("txtFilial");

		foreach($filial as $f){
		
			$p->id_pagina = null;
			$p->id_filial = $f;
			$p->id_setor = $this->input->post("txtSetor");
			$p->titulo = $this->input->post("txtTitulo");
			$p->texto = $this->input->post("txtTexto");
			$p->tags = $this->input->post("txtTags");
			$p->layout = $this->input->post("txtLayout");
			$p->status = $this->input->post("txtStatus");
			$p->subtitulo = $this->input->post("txtSubtitulo");
			$p->id_pagina_relacionada = $this->input->post("txtVinculo");
			
			//Se pagina possuir layout com galeria
			if($p->layout == 3 or ($p->layout == 4 or ($p->layout == 6 or ($p->layout == 8)))){
				
				$p->id_galeria = $this->input->post("txtGaleriaPagina");

			}

			$p->criadopor = $_SESSION['login'][0]->login;
			$p->criadoem = date('Y-m-d H:i');

			$id_pagina = $p->inserir();
			
				if($id_pagina){

					$url = str_replace(array(" ",",",":","."), "-", $this->input->post("txtTitulo"));
					$url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
					$url_pronta = $url_nova;
					
					$p->url_amigavel = strtolower($url_pronta);
					$p->id_pagina = $id_pagina;
					$p->atualizar_url();

					//Se opção de remover capa não marcada
					if($this->input->post("txtRemoverCapa") == "N"){
						
						//Se houver imagem sendo inserida
						if($_FILES['txtCapa']['name'] != ''){
							
							//Definindo caminho da imagem
							$caminho = "imagens/dinamica/" . $id_pagina;

							//Se pasta não existir, cria
							if(!file_exists($caminho)){
								mkdir($caminho);
							}
						
							//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
							$config['upload_path'] = $caminho;
							$config['allowed_types']  = 'gif|jpg|png|jpeg';
							$config['encrypt_name'] = TRUE;
							$this->load->library('upload', $config);

							//Executa upload da imagem
							if($this->upload->do_upload('txtCapa')){
								
								$dados_imagem = $this->upload->data();

								$p->capa = $dados_imagem['file_name'];
								$p->id_pagina = $id_pagina;
								$p->upload_capa();
							
							}
					
						}
						
					}
					
					//Se pagina possuir layout com menu
					if($p->layout == 2 or ($p->layout == 3 or ($p->layout == 7 or ($p->layout == 8)))){

						//Model pagina menu
						$this->load->model("PaginaMenuModel");
						$pm = $this->PaginaMenuModel;
						
						if(count($this->input->post("txtDescricaoMenu")) > 0){
							
							foreach($_POST["txtDescricaoMenu"] as $i => $val){
								
								if($_POST["txtDescricaoMenu"][$i] != ''){

									if($_POST["txtIdMenu"][$i] == ''){
								
										$pm->id_pagina = $id_pagina;
										$pm->descricao = $_POST["txtDescricaoMenu"][$i];
										$pm->link = $_POST["txtLinkMenu"][$i];
										$pm->alvo = $_POST["txtAlvoMenu"][$i];
										$pm->criadopor = $_SESSION['login'][0]->login;
										$pm->criadoem = date('Y-m-d H:i');
										
										$pm->inserir();
									}
									
								}
								
							}
							
						}
						
					}
					
				}

		}

		redirect(base_url("Pagina/editar_pagina/" . $id_pagina));

		
	
	}//Fim da função inserir pagina
	
	function editar_pagina($id_pagina){
		
		$this->load->model("PaginasModel");

		$pag = $this->PaginasModel;
		$dados['paginas_vincular'] = $pag->listar_paginas_p_vinculo();

		$v = $this->PaginasModel;
		$v->id_pagina_relacionada = $id_pagina;
		$dados['vinculo'] = $v->listar_paginas_vinculadas();

		$p = $this->PaginasModel;
		$p->id_pagina = $id_pagina;
		$p->carregar();

		$d = $this->PaginasModel;
		$dados['dinamico'] = $p->listar_paginas();
		
		$this->load->model("SetoresModel");
		$set = $this->SetoresModel;
		$dados['setores'] = $set->listar_setores();
		
		$this->load->model("GaleriasModel");
		$ga = $this->GaleriasModel;
		$dados['galerias'] = $ga->listar_galerias();
		
		//Model pagina menu
		$this->load->model("PaginaMenuModel");
		$pm = $this->PaginaMenuModel;
		$pm->id_pagina = $id_pagina;
		$dados['itens_menu'] = $pm->listar_menu_pagina();

		$this->load->model("PaginaTextosModel");
		$pm = $this->PaginaTextosModel;
		$pm->idpagina = $id_pagina;
		$dados['itens_textos'] = $pm->listar_textos_pagina();

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
		$dados['filiais'] = $f->listar_filiais();

		$this->load->view("admin/CPaginasEditarView.php", $dados);
		
	}//Fim da função editar pagina
	
	function atualizar_pagina($id_pagina){
	
		$this->load->model("PaginasModel");
		$p1 = $this->PaginasModel;
		$p1->id_pagina = $id_pagina;
		$p1->carregar();

		$p1->id_filial = $this->input->post("txtFilial");
		$p1->id_setor = $this->input->post("txtSetor");
		$p1->titulo = $this->input->post("txtTitulo");
		$p1->texto = $this->input->post("txtTexto");
		$p1->tags = $this->input->post("txtTags");
		$p1->layout = $this->input->post("txtLayout");
		$p1->status = $this->input->post("txtStatus");
		$p1->subtitulo = $this->input->post("txtSubtitulo");
		$p1->id_pagina_relacionada = $this->input->post("txtVinculo");

		$url = str_replace(array(" ",",",":",".","(",")","/","|"), "-", $this->input->post("txtTitulo"));
		$url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
		$url_pronta = $url_nova;
		
		$p1->url_amigavel = strtolower($url_pronta);
		$p1->id_pagina = $id_pagina;
		$p1->atualizar_url();

		//Se pagina possuir layout com galeria
		if($p1->layout == 3 or ($p1->layout == 4 or ($p1->layout == 6 or ($p1->layout == 8)))){
			$p1->id_galeria = $this->input->post("txtGaleriaPagina");
		}
		else{
			$p1->id_galeria == null;
		}
		
        $p1->modificadopor = $_SESSION['login'][0]->login;
		$p1->modificadoem = date('Y-m-d H:i');
		
		if($p1->atualizar()){
			
			//Se opção de remover capa não marcada
			if($this->input->post("txtRemoverCapa") == "N"){
					
				//Se houver imagem sendo inserida
				if($_FILES['txtCapa']['name'] != ''){
			
					//Definindo caminho da imagem
					$caminho = "imagens/dinamica/" . $id_pagina;

					//Se pasta não existir, cria
					if(!file_exists($caminho)){
						mkdir($caminho);
					}
				
					//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
					$config['upload_path'] = $caminho;
					$config['allowed_types']  = 'gif|jpg|png|jpeg';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					//Executa upload da imagem
					if($this->upload->do_upload('txtCapa')){
						
						$dados_imagem = $this->upload->data();

						$p1->capa = $dados_imagem['file_name'];
						$p1->id = $id_pagina;
						$p1->upload_capa();
					
					}
			
				}
				
			}


			//Se pagina possuir layout com menu
			if($p1->layout == 2 or ($p1->layout == 3 or ($p1->layout == 7 or ($p1->layout == 8 or ($p1->layout == 9))))){
				
				if(count($this->input->post("txtDescricaoMenu")) > 0){
					
					//Model pagina menu
					$this->load->model("PaginaMenuModel");
					$pm = $this->PaginaMenuModel;

					foreach($_POST["txtDescricaoMenu"] as $i => $val){

                        $iddomenu = $_POST["txtIdMenu"][$i];

						if($iddomenu == ''){

                            $pm->id_pagina = $id_pagina;
                            $pm->id_paginamenu = null;
							$pm->descricao = $_POST["txtDescricaoMenu"][$i];
							$pm->link = $_POST["txtLinkMenu"][$i];
							$pm->alvo = $_POST["txtAlvoMenu"][$i];
							$pm->criadopor = $_SESSION['login'][0]->login;
							$pm->criadoem = date('Y-m-d H:i');

							$pm->inserir();

						}
						else if($iddomenu != ''){

								
							$pm->id_pagina = $id_pagina;
							$pm->id_paginamenu = $_POST["txtIdMenu"][$i];
							$pm->descricao = $_POST["txtDescricaoMenu"][$i];
							$pm->link = $_POST["txtLinkMenu"][$i];
							$pm->alvo = $_POST["txtAlvoMenu"][$i];
							$pm->criadopor = $_SESSION['login'][0]->login;
							$pm->criadoem = date('Y-m-d H:i');
							
							$pm->atualizar();
                        }
                        
                        
					}
					
				}
				
			}
			redirect(base_url("Pagina/editar_pagina/" . $id_pagina . "?ret=S"));
		}
		else{
			redirect(base_url("Pagina/editar_pagina/" . $id_pagina . "?ret=N"));
		}
	
	}//Fim da função atualizar pagina
	
	function excluir_pagina(){
	
		$this->load->model("PaginasModel");
		$p = $this->PaginasModel;
		$p->id_pagina = $this->input->post("txtIdPagina_del");
		
		if($p->excluir()){
			redirect(base_url("Pagina/listar_paginas"));
		}
		else{
			redirect(base_url("Pagina/listar_paginas?ret=N"));
		}
	
	}//Fim da função excluir pagina

	function Excluir_item_menu($idmenu, $idpagina){
	
		$this->load->model("PaginaMenuModel");
		$p = $this->PaginaMenuModel;
		$p->id_paginamenu = $idmenu;
		
		$p->excluir();

		redirect(base_url("Pagina/editar_pagina/".$idpagina));
		
	
	}//Fim da função excluir pagina

	function inserir_texto_pagina(){

		$idpagina =  $this->input->post("txtIdpagina_texto");
		
		$this->load->model("PaginaTextosModel");
		$t = $this->PaginaTextosModel;
		$t->idpagina = $this->input->post("txtIdpagina_texto");
		$t->titulo = $this->input->post("txtTitulo");
		$t->posicao = $this->input->post("txtPosicao");
		$t->descricao = $this->input->post("txtTexto_texto");
		$t->criadopor = $_SESSION['login'][0]->login;
		$t->criadoem = date('Y-m-d H:i');
		$t->inserir();

		redirect(base_url("Pagina/editar_pagina/".$idpagina));
		

	} // função para inserir textos vinculados a pagina

	function editar_pagina_texto($id, $idpagina){

		$this->load->model("PaginaTextosModel");
		$p = $this->PaginaTextosModel;
		$p->id = $id;
		$p->carregar();

		$this->load->view("admin/CPaginasEditarTextoVinculadoView.php");
		

	} // função para inserir textos vinculados a pagina

	function atualizar_pagina_texto($id, $idpagina){

		$this->load->model("PaginaTextosModel");
		$t = $this->PaginaTextosModel;
		$t->id = $id;
		$t->idpagina = $idpagina;
		$t->titulo = $this->input->post("txtTitulo");
		$t->posicao = $this->input->post("txtPosicao");
		$t->descricao = $this->input->post("txtTexto");
		$t->modificadopor = $_SESSION['login'][0]->login;
		$t->modificadoem = date('Y-m-d H:i');
		$t->atualizar();

		redirect(base_url("Pagina/editar_pagina_texto/".$id."/".$idpagina."/?sucesso"));
		

	} // função para atualizar textos vinculados a pagina

	function Excluir_pagina_texto($id, $idpagina){
	
		$this->load->model("PaginaTextosModel");
		$p = $this->PaginaTextosModel;
		$p->id = $id;
		$p->excluir();

		redirect(base_url("Pagina/editar_pagina_texto/".$id."/".$idpagina."/?sucesso"));

	
	}//Fim da função excluir pagina
	
	
	
}

?>