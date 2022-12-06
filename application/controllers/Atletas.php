<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atletas extends CI_Controller {

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
    
	function index(){

		$this->load->model("AlunosModel");
		$aluno = $this->AlunosModel;
		$dados['atletas'] = $aluno->listar_atletas();

		$this->load->model("CursosModel");
		$curso = $this->CursosModel;
		$dados['cursos'] = $curso->listar();

		$this->load->model("PosicoesModel");
		$posicao = $this->PosicoesModel;
		$dados['posicoes'] = $posicao->listar();

		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();

		$this->load->model("PosicoesModalidadesModel");
		$posicao_modalidade = $this->PosicoesModalidadesModel;
		$dados['posicoes_modalidades'] = $posicao_modalidade->listar();

		$this->load->model("GenerosModel");
		$genero = $this->GenerosModel;
		$dados['generos'] = $genero->listar();
		
		$this->load->view("admin/AtletasListarView.php", $dados);
	}

	function inserir_atleta(){
		// echo "<pre>";
		// var_dump($_POST);
		// echo "</pre>";
		// die();

		$idmodalidades = $this->input->post("txtIdModalidade");
		$idposicoes = $this->input->post("txtIdPosicao");

		$this->load->model("AlunosModel");
		$atleta = $this->AlunosModel;

		//carrega atletas modalidades
		$this->load->model("AtletasModalidadesModel");
		$atleta_modalidade = $this->AtletasModalidadesModel;

		//carrega atletas posicoes
		$this->load->model("AtletasPosicoesModel");
		$atleta_posicao = $this->AtletasPosicoesModel;

		//carrega posicoes modalidades
		$this->load->model("PosicoesModalidadesModel");
		$posicao_modalidade = $this->PosicoesModalidadesModel;

		//verifica se RA ja esta inserido
		$atleta->RA = $this->input->post("txtRA");
		if($atleta->buscar_ra()){
			//ja possui
			redirect(base_url("Atletas?ret=possui"));

		}
		else{
			//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
			$config['upload_path'] = "imagens/atletas/";
			$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);


			if($_FILES['txtImagem']['name'] != ""){
				//Executa upload da imagem
			if($this->upload->do_upload('txtImagem')){
				$dados_imagem = $this->upload->data();
				$atleta->IMAGEM = $dados_imagem['file_name'];
			}
			else{
				$msg = $this->upload->display_errors();
			}
			}
			else{
				$atleta->IMAGEM = 'semfoto.jpg';
			}
			
			$atleta->IDCURSO = $this->input->post("txtIdCurso");
			$atleta->NOME = $this->input->post("txtNome");
			$atleta->RA = $this->input->post("txtRA");
			$atleta->EMAIL = $this->input->post("txtEmail");
			$atleta->TELEFONE = $this->input->post("txtTelefone");
			$atleta->TIPO = "A";
			$atleta->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
			$atleta->DATACAD = date('Y-m-d H:i');
			$atleta->USUARIOALT = $_SESSION['login'][0]->LOGIN;
			$atleta->DATAALT = date('Y-m-d H:i');
			
			$ret = $atleta->inserir();
			if($ret){
				$erro = 0;
				//amarrar atleta na atletas_modalidades
				foreach($idmodalidades as $val){
					$atleta_modalidade->IDATLETA = $ret;
					$atleta_modalidade->IDMODALIDADE = $val;
					$atleta_modalidade->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
					$atleta_modalidade->DATACAD = date('Y-m-d H:i');
					$atleta_modalidade->USUARIOALT = $_SESSION['login'][0]->LOGIN;
					$atleta_modalidade->DATAALT = date('Y-m-d H:i');

					$retorno = $atleta_modalidade->inserir();

					if($retorno){
						//id inserção atletas modalidades
						
						$erro = $erro;
					}
					else{
						$erro++;
					}
				}

				//amarrar atleta na atletas posicoes
				foreach($idposicoes as $dado){
					$atleta_posicao->IDATLETA = $ret;
					$atleta_posicao->IDPOSICAOMODALIDADE = $dado;
					$atleta_posicao->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
					$atleta_posicao->DATACAD = date('Y-m-d H:i');
					$atleta_posicao->USUARIOALT = $_SESSION['login'][0]->LOGIN;
					$atleta_posicao->DATAALT = date('Y-m-d H:i');

					if($atleta_posicao->inserir()){
						$erro = $erro;
					}
					else{
						$erro++;
					}
				}

				if($erro == 0){
					redirect(base_url("Atletas"));
				}
				else{
					redirect(base_url("Atletas?ret=N"));
				}
				
			}
			else{
				redirect(base_url("Atletas?ret=N"));
			}
		}

		
		
		
	}

	function editar_atleta($idatleta){
		$this->load->model("AlunosModel");
		$aluno = $this->AlunosModel;
		$aluno->IDALUNO = $idatleta;
		$aluno->carregar();

		//model generos
		$this->load->model("GenerosModel");
		$genero = $this->GenerosModel;
		$dados['generos'] = $genero->listar();

		//model cursos
		$this->load->model("CursosModel");
		$curso = $this->CursosModel;
		$dados['cursos'] = $curso->listar();

		//model atleta modalidade
		$this->load->model("AtletasModalidadesModel");
		$atleta_modalidade = $this->AtletasModalidadesModel;
		//buscar modalidades que o atleta atua
		$atleta_modalidade->IDATLETA = $idatleta;
		$dados['atletas_modalidades'] = $atleta_modalidade->listar_modalidade_atleta();

		//model modalidades 
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();

		//model atleta posicoes
		$this->load->model("AtletasPosicoesModel");
		$atleta_posicao = $this->AtletasPosicoesModel;
		//buscar modalidades que o atleta atua
		$atleta_posicao->IDATLETA = $idatleta;
		$dados['atletas_posicoes'] = $atleta_posicao->listar_posicao_atleta();

		//model posicoes 
		$this->load->model("PosicoesModalidadesModel");
		$posicao_modalidade = $this->PosicoesModalidadesModel;
		$dados['posicoes_modalidades'] = $posicao_modalidade->listar();

		//model atletas equipes
		$this->load->model("AtletasEquipesModel");
		$atleta_equipe = $this->AtletasEquipesModel;
		$atleta_equipe->IDATLETA = $idatleta;
		$dados['atletas_equipes'] = $atleta_equipe->listar_por_atleta();

		$this->load->view("admin/AtletasEditarView.php", $dados);
	}

	function atualizar_atleta($idatleta){
		$tipo = $this->input->post("txtTipo");
		$idmodalidades = $this->input->post("txtIdModalidade");
		$idposicoes = $this->input->post("txtIdPosicao");

		//carrega model AtletasModalidades
		$this->load->model("AtletasModalidadesModel");
		$atleta_modalidade = $this->AtletasModalidadesModel;

		//carrega model AtletasPosicoes
		$this->load->model("AtletasPosicoesModel");
		$atleta_posicao = $this->AtletasPosicoesModel;
		

		//carrega model Alunos
		$this->load->model("AlunosModel");
		$atleta = $this->AlunosModel;
		$atleta->IDALUNO = $idatleta;
		$atleta->carregar();

		
		//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
		$config['upload_path'] = "imagens/alunos/";
		$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		//Executa upload da imagem
		if($this->upload->do_upload('txtImagemEdit')){
			$dados_imagem = $this->upload->data();
			$atleta->IMAGEM = $dados_imagem['file_name'];
		}
		else{
			$msg = $this->upload->display_errors();
		}
		

		$atleta->IDCURSO = $this->input->post("txtIdCurso");
		$atleta->NOME = $this->input->post("txtNome");
		$atleta->RA = $this->input->post("txtRA");
		$atleta->EMAIL = $this->input->post("txtEmail");
		$atleta->TELEFONE = $this->input->post("txtTelefone");
		$atleta->TIPO = $this->input->post("txtTipo");
		$atleta->IDGENERO = $this->input->post("txtIdGenero");

		$atleta->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$atleta->DATAALT = date('Y-m-d H:i');
		
		if($atleta->atualizar()){
			$erro = 0;
			if(isset($idmodalidades)){
				$atleta_modalidade->IDATLETA = $idatleta;
				
				if($atleta_modalidade->excluir_por_atleta()){
					//adicionar dnv
					foreach($idmodalidades as $val){
						$atleta_modalidade->IDATLETA = $idatleta;
						$atleta_modalidade->IDMODALIDADE = $val;
						$atleta_modalidade->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
						$atleta_modalidade->DATACAD = date('Y-m-d H:i');
						$atleta_modalidade->USUARIOALT = $_SESSION['login'][0]->LOGIN;
						$atleta_modalidade->DATAALT = date('Y-m-d H:i');

						$retorno = $atleta_modalidade->inserir();

						if($retorno){
							$erro = $erro;
						}
						else{
							$erro++;
						}
					}
				}
			}

			if(isset($idposicoes)){
				$atleta_posicao->IDATLETA = $idatleta;

				if($atleta_posicao->excluir_por_atleta()){
					//amarrar atleta na atletas posicoes
					foreach($idposicoes as $dado){
						$atleta_posicao->IDATLETA = $idatleta;
						$atleta_posicao->IDPOSICAOMODALIDADE = $dado;
						$atleta_posicao->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
						$atleta_posicao->DATACAD = date('Y-m-d H:i');
						$atleta_posicao->USUARIOALT = $_SESSION['login'][0]->LOGIN;
						$atleta_posicao->DATAALT = date('Y-m-d H:i');

						if($atleta_posicao->inserir()){
							$erro = $erro;
						}
						else{
							$erro++;
						}
					}
				}
			}
				

			if($erro == 0){
				redirect(base_url("Atletas?ret=S"));
			}
			else{
				redirect(base_url("Atletas?ret=N"));
			}
			
		}
		else{
			redirect(base_url("Atletas?ret=N"));
		}
		
	}

	function excluir_atleta(){
		//carrega model alunos
		$this->load->model("AlunosModel");
		$atleta = $this->AlunosModel;

		//carrega model AtletasModalidades
		$this->load->model("AtletasModalidadesModel");
		$atleta_modalidade = $this->AtletasModalidadesModel;

		//carrega model AtletasPosicoes
		$this->load->model("AtletasPosicoesModel");
		$atleta_posicao = $this->AtletasPosicoesModel;
		
		$idatleta =  $this->input->post("txtIdAtleta_del");
		$erro = 0;

		//excluir todas as modalidades que o atleta esta amarrado
		$atleta_modalidade->IDATLETA = $idatleta;
		if($atleta_modalidade->excluir_por_atleta()){
			$erro = $erro;
		}
		else{
			$erro++;
		}

		//excluir todas as posicoes que o atleta esta amarrado
		$atleta_posicao->IDATLETA = $idatleta;
		if($atleta_posicao->excluir_por_atleta()){
			$erro = $erro;
		}
		else{
			$erro++;
		}

		//excluir registro Atleta
		if($erro == 0){
			$atleta->IDALUNO = $idatleta;
			if($atleta->excluir()){
				redirect(base_url("Atletas?ret=S"));
			}
			else{
				redirect(base_url("Atletas?ret=N"));
			}
		}
		else{
			// echo "erro nao é igual a 0"; die();
			redirect(base_url("Atletas?ret=N"));
		}

		
	
  }//Fim da função excluir usuario
  //adicionado
  
	
}