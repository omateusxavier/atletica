<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatos extends CI_Controller {

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
		$dados['candidatos'] = $aluno->listar_candidatos();

		// ----------------------------------------------
		$this->load->model("AlunosModel");
		$aluno = $this->AlunosModel;
		$dados['candidatos'] = $aluno->listar_candidatos();

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
		
		$this->load->view("admin/CandidatosListarView.php", $dados);
	}

	function inserir(){
		$this->load->model("AtletasModel");
		$atleta = $this->AtletasModel;

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
			
			
			$atleta->NOME = $this->input->post("txtNome");
			$atleta->RA = $this->input->post("txtRA");
			$atleta->EMAIL = $this->input->post("txtEmail");
			$atleta->TELEFONE = $this->input->post("txtTelefone");
            $atleta->SITUACAO = "C";
			$atleta->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
			$atleta->DATACAD = date('Y-m-d H:i');
			$atleta->USUARIOALT = $_SESSION['login'][0]->LOGIN;
			$atleta->DATAALT = date('Y-m-d H:i');
			
			$ret = $atleta->inserir();

			if($ret){
				redirect(base_url("Atletas"));
			}
			else{
				redirect(base_url("Atletas?ret=N"));
			}
		}

		
		
		
	}

	function editar($idcandidato){
		$this->load->model("AlunosModel");
		$aluno = $this->AlunosModel;
		$aluno->IDALUNO = $idcandidato;
		$aluno->carregar();

		//model generos
		$this->load->model("GenerosModel");
		$genero = $this->GenerosModel;
		$dados['generos'] = $genero->listar();

		//model cursos
		$this->load->model("CursosModel");
		$curso = $this->CursosModel;
		$dados['cursos'] = $curso->listar();

		//model candidato modalidade
		$this->load->model("CandidatosModalidadesModel");
		$candidato_modalidade = $this->CandidatosModalidadesModel;
		//buscar modalidades que o atleta atua
		$candidato_modalidade->IDCANDIDATO = $idcandidato;
		$dados['candidatos_modalidades'] = $candidato_modalidade->listar_modalidade_candidato();

		//model modalidades 
		$this->load->model("ModalidadesModel");
		$modalidade = $this->ModalidadesModel;
		$dados['modalidades'] = $modalidade->listar();

		//model candidato posicoes
		$this->load->model("CandidatosPosicoesModel");
		$candidato_posicao = $this->CandidatosPosicoesModel;
		//buscar modalidades que o atleta atua
		$candidato_posicao->IDCANDIDATO = $idcandidato;
		$dados['candidatos_posicoes'] = $candidato_posicao->listar_posicao_candidato();

		//model posicoes 
		$this->load->model("PosicoesModalidadesModel");
		$posicao_modalidade = $this->PosicoesModalidadesModel;
		$dados['posicoes_modalidades'] = $posicao_modalidade->listar();

		$this->load->view("admin/CandidatosEditarView.php", $dados);
	}

	function atualizar($idcandidato){
		$tipo = $this->input->post("txtTipo");
		$idmodalidades = $this->input->post("txtIdModalidade");
		$idposicoes = $this->input->post("txtIdPosicao");

		//model candidato modalidade
		$this->load->model("CandidatosModalidadesModel");
		$candidato_modalidade = $this->CandidatosModalidadesModel;

		//model candidato posicoes
		$this->load->model("CandidatosPosicoesModel");
		$candidato_posicao = $this->CandidatosPosicoesModel;
		

		//carrega model Alunos
		$this->load->model("AlunosModel");
		$candidato = $this->AlunosModel;
		$candidato->IDALUNO = $idcandidato;
		$candidato->carregar();

		//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
		$config['upload_path'] = "imagens/alunos/";
		$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		//Executa upload da imagem
		if($this->upload->do_upload('txtImagemEdit')){
			$dados_imagem = $this->upload->data();
			$candidato->IMAGEM = $dados_imagem['file_name'];
		}
		else{
			$msg = $this->upload->display_errors();
		}

		$candidato->IDCURSO = $this->input->post("txtIdCurso");
		$candidato->NOME = $this->input->post("txtNome");
		$candidato->RA = $this->input->post("txtRA");
		$candidato->EMAIL = $this->input->post("txtEmail");
		$candidato->TELEFONE = $this->input->post("txtTelefone");
		$candidato->TIPO = $this->input->post("txtTipo");
		$candidato->IDGENERO = $this->input->post("txtIdGenero");

		$candidato->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		$candidato->DATAALT = date('Y-m-d H:i');
		
		if($candidato->atualizar()){
			$erro = 0;
			if(isset($idmodalidades)){
				$candidato_modalidade->IDCANDIDATO = $idcandidato;
				
				if($candidato_modalidade->excluir_por_candidato()){
					//adicionar dnv
					foreach($idmodalidades as $val){
						$candidato_modalidade->IDCANDIDATO = $idcandidato;
						$candidato_modalidade->IDMODALIDADE = $val;
						$candidato_modalidade->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
						$candidato_modalidade->DATACAD = date('Y-m-d H:i');
						$candidato_modalidade->USUARIOALT = $_SESSION['login'][0]->LOGIN;
						$candidato_modalidade->DATAALT = date('Y-m-d H:i');

						$retorno = $candidato_modalidade->inserir();

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
				$candidato_posicao->IDCANDIDATO = $idcandidato;

				if($candidato_posicao->excluir_por_candidato()){
					//amarrar candidato na candidato posicoes
					foreach($idposicoes as $dado){
						$candidato_posicao->IDCANDIDATO = $idcandidato;
						$candidato_posicao->IDPOSICAOMODALIDADE = $dado;
						$candidato_posicao->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
						$candidato_posicao->DATACAD = date('Y-m-d H:i');
						$candidato_posicao->USUARIOALT = $_SESSION['login'][0]->LOGIN;
						$candidato_posicao->DATAALT = date('Y-m-d H:i');

						if($candidato_posicao->inserir()){
							$erro = $erro;
						}
						else{
							$erro++;
						}
					}
				}
			}
				

			if($erro == 0){
				redirect(base_url("Candidatos?ret=S"));
			}
			else{
				redirect(base_url("Candidatos?ret=N"));
			}
			
		}
		else{
			redirect(base_url("Candidatos?ret=N"));
		}
		
	}
	function excluir(){
	
		$this->load->model("AtletasModel");
		$atleta = $this->AtletasModel;
		$atleta->IDATLETA = $this->input->post("txtIdCandidato_del");
		
		if($atleta->excluir()){
			redirect(base_url("Candidatos?ret=S"));
		}
		else{
			redirect(base_url("Candidatos?ret=N"));
		}
	
  }//Fim da função excluir usuario
	
	
	
	

  //adicionado
  
	
}