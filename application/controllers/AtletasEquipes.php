<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtletasEquipes extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Carrega biblioteca de SESSION do Codegniter
		$this->load->library('session');
		
		date_default_timezone_set('America/Sao_paulo');
		
		// //Carrega Configurações Básicas do Site
		$this->load->model("ConfigSiteModel");
		$this->configsite = $this->ConfigSiteModel;
		$this->configsite->carregar();

		//Valida se usuário está logado
		if(!isset($_SESSION['login'])){
			redirect(base_url("Admin/login"));
		}
    }

	function inserir(){
    	$idequipe = $this->input->post("txtIdEquipe");

		//carrega model AtletasEquipes
		$this->load->model("AtletasEquipesModel");
		$atleta_equipe = $this->AtletasEquipesModel;

    	//carrega model Alunos
		$this->load->model("AlunosModel");
		$aluno = $this->AlunosModel;

		//verifica se o atleta ja esta inserido na atletas_equipes
		$atleta_equipe->IDATLETA = $this->input->post("txtIdAtleta");
		$atleta_equipe->IDEQUIPE = $idequipe;
		$ret = $atleta_equipe->verifica_atleta();

		if(count($ret) > 0){
		//atleta já está inserido na equipe
		}
		else{
		// echo "pode inserir";
			$atleta_equipe->IDATLETA = $this->input->post("txtIdAtleta");
			$atleta_equipe->IDEQUIPE = $idequipe;
			$atleta_equipe->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
			$atleta_equipe->DATACAD = date('Y-m-d H:i');
			$atleta_equipe->USUARIOALT = $_SESSION['login'][0]->LOGIN;
			$atleta_equipe->DATAALT = date('Y-m-d H:i');
			
			$ret = $atleta_equipe->inserir();

			if($ret){
				redirect(base_url("Equipes/editar/".$idequipe."?ret=S"));
			}
			else{
				redirect(base_url("Equipes/editar/".$idequipe."?ret=N"));
			}
		}
	}

	// function editar($idatletaequipe){
	// 	$this->load->model("AtletasModel");
	// 	$atleta = $this->AtletasModel;
	// 	$atleta->IDATLETA = $idatleta;
	// 	$atleta->carregar();
	// 	$this->load->view("admin/AtletasEditarView.php");
	// }

	// function atualizar($idatletaequipe){
	// 	$this->load->model("AtletasModel");
	// 	$atleta = $this->AtletasModel;
	// 	$atleta->IDATLETA = $idatleta;
	// 	$atleta->carregar();

		

	// 	//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
	// 	$config['upload_path'] = "imagens/atletas/";
	// 	$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
	// 	$config['encrypt_name'] = TRUE;
	// 	$this->load->library('upload', $config);

	// 	// var_dump($this->upload->do_upload('txtImagemEdit'));
	// 	// die();
		
	// 	//Executa upload da imagem
	// 	if($this->upload->do_upload('txtImagemEdit')){
	// 		$dados_imagem = $this->upload->data();
	// 		$atleta->IMAGEM = $dados_imagem['file_name'];
	// 	}
	// 	else{
	// 		$msg = $this->upload->display_errors();
	// 	}
		
	// 	$atleta->NOME = $this->input->post("txtNome");
	// 	$atleta->EMAIL = $this->input->post("txtEmail");
	// 	$atleta->TELEFONE = $this->input->post("txtTelefone");
	// 	$atleta->SITUACAO = $this->input->post("txtSituacao");

	// 	$atleta->USUARIOALT = $_SESSION['login'][0]->LOGIN;
	// 	$atleta->DATAALT = date('Y-m-d H:i');
		
	// 	if($atleta->atualizar()){
	// 		redirect(base_url("Atletas?ret=S"));
	// 	}
	// 	else{
	// 		redirect(base_url("Atletas?ret=N"));
	// 	}
	// }

	// function excluir(){
	
	// 	$this->load->model("AtletasModel");
	// 	$atleta = $this->AtletasModel;
	// 	$atleta->IDATLETA = $this->input->post("txtIdAtleta_del");
		
	// 	if($atleta->excluir()){
	// 		redirect(base_url("Atletas?ret=S"));
	// 	}
	// 	else{
	// 		redirect(base_url("Atletas?ret=N"));
	// 	}
	
  // }
  //Fim da função excluir 
	
	
	
	

  //adicionado
  
	
}//fim classe