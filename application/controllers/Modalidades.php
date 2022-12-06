<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Carrega biblioteca de SESSION do Codegniter
		$this->load->library('session');
		
        date_default_timezone_set('America/Sao_Paulo');
        

        // //Carrega Configurações Básicas do Site
		$this->load->model("ConfigSiteModel");
        $this->configsite = $this->ConfigSiteModel;
        $this->configsite->carregar();
    }

    function header(){

   
    }
    
	function index(){

		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();
		
		$this->load->view("admin/ModalidadesListarView.php", $dados);
	}

	function inserir(){
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		
		$modalidade->DESCRICAO = $this->input->post("txtDescricao");
		$modalidade->GENERO = $this->input->post("txtGenero");
        $modalidade->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
		$modalidade->DATACAD = date('Y-m-d H:i');
		$modalidade->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$modalidade->DATAALT = date('Y-m-d H:i');
		
		$ret = $modalidade->inserir();
		
		if($ret){
			redirect(base_url("Modalidades?ret=S"));
		}
		else{
			redirect(base_url("Modalidades?ret=N"));
		}
	}

	function editar($idmodalidade){
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$modalidade->IDEQUIPE = $idmodalidade;
		$modalidade->carregar();
		$this->load->view("admin/ModalidadesListarView.php");
	}

	function atualizar($idmodalidade){
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$modalidade->IDEQUIPE = $idmodalidade;
		$modalidade->carregar();
		
		
		$modalidade->NOME = $this->input->post("txtNome");
		$modalidade->EMAIL = $this->input->post("txtEmail");
		$modalidade->TELEFONE = $this->input->post("txtTelefone");

		$modalidade->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$modalidade->DATAALT = date('Y-m-d H:i');
		
		if($modalidade->atualizar()){
			redirect(base_url("Modalidades?ret=S"));
		}
		else{
			redirect(base_url("Modalidades?ret=N"));
		}
	}

	function excluir(){
	
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$modalidade->IDEQUIPE = $this->input->post("txtIdEquipe_del");
		
		if($modalidade->excluir()){
			redirect(base_url("Modalidades?ret=S"));
		}
		else{
			redirect(base_url("Modalidades?ret=N"));
		}
	
  }//Fim da função excluir equipe
} //fim classe