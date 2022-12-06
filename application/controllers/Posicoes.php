<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posicoes extends CI_Controller {

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
    
	function index(){

		$this->load->model("PosicoesModel");
		$posicao = $this->PosicoesModel;
		$dados['posicoes'] = $posicao->listar();

        $this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();
		
		$this->load->view("admin/PosicoesListarView.php", $dados);
	}

	function inserir(){
		$this->load->model("PosicoesModel");
		$posicao = $this->PosicoesModel;
		
		$posicao->DESCRICAO = $this->input->post("txtDescricao");
        $posicao->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
		$posicao->DATACAD = date('Y-m-d H:i');
		$posicao->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$posicao->DATAALT = date('Y-m-d H:i');
		
		$ret = $posicao->inserir();
		
		if($ret){
			redirect(base_url("Posicoes?ret=S"));
		}
		else{
			redirect(base_url("Posicoes?ret=N"));
		}
	}

	function editar($idposicao){
		$this->load->model("PosicoesModel");
		$posicao = $this->PosicoesModel;
		$posicao->IDPOSICAO = $idposicao;
		$posicao->carregar();

		//posicoes modalidades
		$this->load->model("PosicoesModalidadesModel");
		$posicaoModalidade = $this->PosicoesModalidadesModel;
		$posicaoModalidade->IDPOSICAO = $idposicao;
		$dados['posicoes_modalidades'] = $posicaoModalidade->listar_unico();

		//modalidades
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();

		$this->load->view("admin/PosicoesEditarView.php", $dados);
	}

	function atualizar($idposicao){
		$this->load->model("PosicoesModel");
		$posicao = $this->PosicoesModel;
		$posicao->IDPOSICAO = $idposicao;
		$posicao->carregar();
		
		
		$posicao->DESCRICAO = $this->input->post("txtNome");

		$posicao->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$posicao->DATAALT = date('Y-m-d H:i');
		
		if($posicao->atualizar()){
			redirect(base_url("Posicoes?ret=S"));
		}
		else{
			redirect(base_url("Posicoes?ret=N"));
		}
	}

	function excluir(){
	
		$this->load->model("PosicoesModel");
		$posicao = $this->PosicoesModel;
		$posicao->IDPOSICAO = $this->input->post("txtIdEquipe_del");
		
		if($posicao->excluir()){
			redirect(base_url("Posicoes?ret=S"));
		}
		else{
			redirect(base_url("Posicoes?ret=N"));
		}
	
  }//Fim da função excluir equipe
} //fim classe