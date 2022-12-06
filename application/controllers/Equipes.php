<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipes extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Carrega biblioteca de SESSION do Codegniter
		$this->load->library('session');
		
        date_default_timezone_set('America/Sao_Paulo');
        

        // //Carrega Configurações Básicas do Site
		$this->load->model("ConfigSiteModel");
        $this->configsite = $this->ConfigSiteModel;
        $this->configsite->carregar();

		//Valida se usuário está logado
		if(!isset($_SESSION['login'])){
			redirect(base_url("Admin/login"));
		}
    }
    
	function index(){

		$this->load->model("EquipesModel");
		$equipe = $this->EquipesModel;
		$dados['equipes'] = $equipe->listar();

		$this->load->model("ModalidadesGeneroModel");
		$modalidadeGenero = $this->ModalidadesGeneroModel;
		$dados['modalidades'] = $modalidadeGenero->listar();

		$this->load->model("ModalidadesGeneroModel");
		$modalidade_genero = $this->ModalidadesGeneroModel;
		$dados['modalidades_generos'] = $modalidade_genero->listar();
		
		$this->load->view("admin/EquipesListarView.php", $dados);
	}

	function listar(){

		$this->load->model("EquipesModel");
		$equipe = $this->EquipesModel;
		$dados['equipes'] = $equipe->listar();

		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();

		
		
		$this->load->view("admin/EquipesListarView2.php", $dados);
	}

	function inserir(){
		$this->load->model("EquipesModel");
		$equipe = $this->EquipesModel;


		//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
		$config['upload_path'] = "imagens/equipes/logos/";
		$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);


		if($_FILES['txtImagem']['name'] != ""){
			//Executa upload da imagem
		if($this->upload->do_upload('txtImagem')){
			$dados_imagem = $this->upload->data();
			$equipe->LOGO = $dados_imagem['file_name'];
		}
		else{
			$msg = $this->upload->display_errors();
		}
		}
		else{
			$equipe->LOGO = 'semfoto.jpg';
		}
		
		$equipe->DESCRICAO = $this->input->post("txtDescricao");
		$equipe->IDMODALIDADEGENERO = $this->input->post("txtModalidade");
    	$equipe->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
		$equipe->DATACAD = date('Y-m-d H:i');
		$equipe->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$equipe->DATAALT = date('Y-m-d H:i');
		
		$ret = $equipe->inserir();
		
		if($ret){
			redirect(base_url("Equipes?ret=S"));
		}
		else{
			redirect(base_url("Equipes?ret=N"));
		}
	}

	function editar($idequipe){
		$this->load->model("EquipesModel");
		$equipe = $this->EquipesModel;
		$equipe->IDEQUIPE = $idequipe;
		$equipe->carregar();

		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();

		$this->load->model("AtletasEquipesModel");
		$atleta_equipe = $this->AtletasEquipesModel;
		$atleta_equipe->IDEQUIPE = $idequipe;
		$dados['atletas_equipes'] = $atleta_equipe->listar();

		$this->load->model("AlunosModel");
		$aluno = $this->AlunosModel;
		$dados['atletas'] = $aluno->listar_atletas();

		$this->load->view("admin/EquipesEditarView.php", $dados);
	}

	function atualizar_equipe($idequipe){
		$this->load->model("EquipesModel");
		$equipe = $this->EquipesModel;
		$equipe->IDEQUIPE = $idequipe;
		$equipe->carregar();
		
		
		$atleta->NOME = $this->input->post("txtNome");
		$atleta->EMAIL = $this->input->post("txtEmail");
		$atleta->TELEFONE = $this->input->post("txtTelefone");

		$atleta->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$atleta->DATAALT = date('Y-m-d H:i');
		
		if($equipe->atualizar()){
			redirect(base_url("Equipes?ret=S"));
		}
		else{
			redirect(base_url("Equipes?ret=N"));
		}
	}

	function excluir(){
	
		$this->load->model("EquipesModel");
		$equipe = $this->EquipesModel;
		$equipe->IDEQUIPE = $this->input->post("txtIdEquipe_del");
		
		if($equipe->excluir()){
			redirect(base_url("Equipes?ret=S"));
		}
		else{
			redirect(base_url("Equipes?ret=N"));
		}
	
  }//Fim da função excluir equipe
} //fim classe