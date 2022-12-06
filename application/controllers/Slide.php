<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller{

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
	
	function listar_slides(){

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
        $dados['filial2'] = $f->listar_filiais();
		
		$this->load->model("CarrosselModel");
		$c = $this->CarrosselModel;
        $dados['slides'] = $c->listar_slides();
        
		$this->load->view("admin/CSlidesListarView.php", $dados);
		
	}//Fim da função listar slides
	
	function inserir_slide(){
	
		$this->load->model("CarrosselModel");
		$c = $this->CarrosselModel;
		
		$c->filial = $this->input->post("txtFilial");;
		$c->titulo = $this->input->post("txtTitulo");
		$c->descricao = $this->input->post("txtDescricao");
		$c->modelo = $this->input->post("txtModelo");
		$c->posicao = $this->input->post("txtPosicao");
		$c->link = $this->input->post("txtLink");
		$c->target = $this->input->post("txtTarget");
		$c->status = $this->input->post("txtStatus");
		$c->btn = $this->input->post("txtBtn");
		$c->box = $this->input->post("txtBox");
		
		//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
		$config['upload_path'] = "imagens/carrossel/";
		$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		
		//Executa upload da imagem
		if($this->upload->do_upload('txtImagem')){
			
			$dados_imagem = $this->upload->data();
			$c->img = $dados_imagem['file_name'];
			
		}
		
        $c->criadopor = $_SESSION['login'][0]->login;
		$c->criadoem = date('Y-m-d H:i');
		
		$id_slide = $c->inserir();
		
		if($id_slide){
			redirect(base_url("Slide/editar_slide/" . $id_slide));
		}
		else{
			redirect(base_url("Slide/listar_slides?ret=N"));
		}
	
	}//Fim da função inserir slide
	
	function editar_slide($id_slide){

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
        $dados['filial'] = $f->listar_filiais();
		
		$this->load->model("CarrosselModel");
		$c = $this->CarrosselModel;
		$c->id = $id_slide;
		$c->carregar();

		$this->load->view("admin/CSlidesEditarView.php", $dados);
		
	}//Fim da função editar slide
	
	function atualizar_slide($id_slide){
	
		$this->load->model("CarrosselModel");
		$c = $this->CarrosselModel;
		$c->id = $id_slide;
		$c->carregar();

		$c->filial = $this->input->post("txtFilial");
		$c->titulo = $this->input->post("txtTitulo");
		$c->descricao = $this->input->post("txtDescricao");
		$c->modelo = $this->input->post("txtModelo");
		$c->posicao = $this->input->post("txtPosicao");
		$c->link = $this->input->post("txtLink");
		$c->target = $this->input->post("txtTarget");
		$c->btn = $this->input->post("txtBtn");
        $c->box = $this->input->post("txtBox");
        $c->status = $this->input->post("txtStatus");

		//Se houver nova imagem sendo inserida
		if($_FILES['txtImagem']['name'] != ''){
			
			//Exclui imagem antiga
			$caminho = "imagens/carrossel/" . $c->img;
			unlink($caminho);
			
			//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
			$config['upload_path'] = "imagens/carrossel";
			$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			
			//Executa upload da imagem
			if($this->upload->do_upload('txtImagem')){
				
				$dados_imagem = $this->upload->data();
				$c->img = $dados_imagem['file_name'];
				
			}
		
		}

        $c->modificadopor = $_SESSION['login'][0]->login;
		$c->modificadoem = date('Y-m-d H:i');
		
		if($c->atualizar()){
			redirect(base_url("Slide/editar_slide/" . $id_slide . "?ret=S"));
		}
		else{
			redirect(base_url("Slide/editar_slide/" . $id_slide . "?ret=N"));
		}
	
	}//Fim da função atualizar slide
	
	function excluir_slide(){
	
		$this->load->model("CarrosselModel");
		$c = $this->CarrosselModel;
		$c->id = $this->input->post("txtIdSlide_del");
		$c->carregar();

        //Definindo caminho da imagem
        $caminho = "imagens/carrossel/" . $c->img;

        //Se arquivo deletado do servidor, exclui do banco de dados
        if(unlink($caminho)){
            
			if($c->excluir()){
				redirect(base_url("Slide/listar_slides"));
			}
			else{
				redirect(base_url("Slide/listar_slides?ret=N"));
			}
			
        }
        else{
            redirect(base_url("Slide/listar_slides?ret=N"));
        }
	
    }//Fim da função excluir slide
	
}

?>