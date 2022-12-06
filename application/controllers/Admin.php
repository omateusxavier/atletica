<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public $configsite;

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
    
    function suporte(){

        redirect('https://download.anydesk.com/AnyDesk.exe?_ga=2.119344463.778331816.1589556556-210514161.1587571047');
    }

	function index(){
        //Se nao houver usuário logado, redireciona para login
        if(!isset($_SESSION['login'])){
        
            redirect(base_url("Admin/login"));
            
        }
				else{
					$this->load->view('admin/IndexView.php');
				}
		
	}//Fim da função index
	
	function login(){
		
		$this->load->view('admin/LoginView.php');
		
	}//Fim da função login
	
	function logar(){
		
		//Model Usuario
		$this->load->model("UsuariosModel");
		$user = $this->UsuariosModel;
		
		$user->LOGIN = $this->input->post("txtLogin");
		$user->SENHA = $this->input->post("txtSenha");
		
		$ret = $user->login();

		if($ret){
			
			foreach($ret as $val){
				$ativo = $val->ATIVO;
                $id_usuario = $val->IDUSUARIO;  
			}
			
			if($ativo == "S"){  
				
                $_SESSION['login'] = $ret;

                // //Model Filial Usuario
                // $this->load->model("GusuarioFilialModel");
                // $uf = $this->GusuarioFilialModel;
                // $uf->id_usuario = $id_usuario;
                // $_SESSION['login_filiais_usuario'] = $uf->listar_filiais_usuario();
				
				//Model Perfil
				// $this->load->model("GacoesModel");
				// $a = $this->GacoesModel;
        //         $_SESSION['login_menu'] = $a->listar_acoes();
                
        //         //Atualiza o usuario, registra a data do ultimo acesso
        //         $user->id_usuario = $id_usuario;
        //         $user->carregar();
        //         $user->ultimo_acesso = date('Y-m-d H:i');
        //         $user->atualizar();
				
				// if(isset($_GET['url_retorno'])){
				// 	redirect(base_url($_GET['url_retorno']));
				// }
				// else{
				// 	redirect(base_url("Admin"));
				// }

				redirect(base_url("Admin"));

			}
			else{
				
				redirect(base_url("Admin/login?ret=1&login=" . $this->input->post("txtLogin")));
				
			}

		}
		else{
			redirect(base_url("Admin/login?ret=N&login=" . $this->input->post("txtLogin")));
		}
		
	}//Fim da função logar
	
	function logout(){
		
		unset($_SESSION['login']);
        unset($_SESSION['login_menu']);
        unset($_SESSION['login_filiais_usuario']);
		
		redirect(base_url("Admin"));
		
	}//Fim da função logout
	
	function listar_usuarios(){
		
		$this->load->model("GusuarioModel");
		$user = $this->GusuarioModel;
		$dados['usuarios'] = $user->listar_usuarios();
		
		$this->load->model("GdepartModel");
		$depart = $this->GdepartModel;
		$dados['departamentos'] = $depart->listar_departamentos();
		
		$this->load->model("GperfilModel");
		$perf = $this->GperfilModel;
		$dados['perfis'] = $perf->listar_perfis();
		
		$this->load->view("admin/GListarUsuariosView.php", $dados);
		
	}//Fim da função listar usuários
	
	function inserir_usuario(){
	
		$this->load->model("GusuarioModel");
		$u = $this->GusuarioModel;
		
		$u->ativo = "S";
		$u->nome = $this->input->post("txtNome");
		$u->email = $this->input->post("txtEmail");
		$u->id_departamento = $this->input->post("txtDepart");
		$u->id_perfil = $this->input->post("txtPerfil");
		$u->login = $this->input->post("txtLogin");
        $u->senha = $this->input->post("txtSenha");
        
        $user->cep = $this->input->post("txtCep");
        $user->endereco = $this->input->post("txtEndereco");
        $user->numero = $this->input->post("txtNumero");
        $user->bairro = $this->input->post("txtBairro");
        $user->complemento = $this->input->post("txtComplemento");
        $user->uf = $this->input->post("txtUf");
        $user->cidade = $this->input->post("txtCidade");

        $user->telefone1 = $this->input->post("txtFone1");
        $user->telefone2 = $this->input->post("txtFone2");
        $user->telefone3 = $this->input->post("txtFone3");

        $user->usuario_cad = $_SESSION['login'][0]->login;
		$user->data_cad = date('Y-m-d H:i');
		
		if($u->inserir()){
			redirect(base_url("Admin/listar_usuarios?ret=S"));
		}
		else{
			redirect(base_url("Admin/listar_usuarios?ret=N"));
		}
	
	}//Fim da função inserir usuario
	
	function editar_usuario($id_usuario){
		
		$this->load->model("GusuarioModel");
		$u = $this->GusuarioModel;
		$u->id_usuario = $id_usuario;
		$u->carregar();
		
		$this->load->model("GdepartModel");
		$depart = $this->GdepartModel;
		$dados['departamentos'] = $depart->listar_departamentos();
		
		$this->load->model("GperfilModel");
		$perf = $this->GperfilModel;
    $dados['perfis'] = $perf->listar_perfis();

    $this->load->model("GfilialModel");
    $f = $this->GfilialModel;
    $dados['filiais'] = $f->listar_filiais();
        
    $this->load->model("GusuarioFilialModel");
		$uf = $this->GusuarioFilialModel;
    $uf->id_usuario = $id_usuario;
    $dados['filiais_usuario'] = $uf->listar_filiais_usuario();

    $this->load->model("GUsuarioPermissaoModel");
    $p = $this->GUsuarioPermissaoModel;
    $p->id_usuario = $id_usuario;
    $dados['permissoes'] = $p->carregar();

    $this->load->model("PaginasModel");
  	$pa = $this->PaginasModel;
    $dados['paginas'] = $pa->listar_paginas_pesquisa_dinamico();

		$this->load->view("admin/GEditarUsuarioView.php", $dados);
		
	}//Fim da função editar usuario
	
	function atualizar_usuario($id_usuario){
	
		$this->load->model("GusuarioModel");
		$user = $this->GusuarioModel;
		$user->id_usuario = $id_usuario;
		$user->carregar();
		
		if($this->input->post("txtAtivo") == "S"){
			$user->ativo = "S";	
		}
		else{
			$user->ativo = "N";
		}
		
		$user->nome = $this->input->post("txtNome");
		$user->email = $this->input->post("txtEmail");
		$user->id_departamento = $this->input->post("txtDepart");
		$user->id_perfil = $this->input->post("txtPerfil");
        $user->senha = $this->input->post("txtSenha");
        
        $user->cep = $this->input->post("txtCep");
        $user->endereco = $this->input->post("txtEndereco");
        $user->numero = $this->input->post("txtNumero");
        $user->bairro = $this->input->post("txtBairro");
        $user->complemento = $this->input->post("txtComplemento");
        $user->uf = $this->input->post("txtUf");
        $user->cidade = $this->input->post("txtCidade");

        $user->telefone1 = $this->input->post("txtFone1");
        $user->telefone2 = $this->input->post("txtFone2");
        $user->telefone3 = $this->input->post("txtFone3");

		$user->usuario_alt = $_SESSION['login'][0]->login;
		$user->data_alt = date('Y-m-d H:i');
		
		if($user->atualizar()){
			redirect(base_url("Admin/listar_usuarios?ret=S"));
		}
		else{
			redirect(base_url("Admin/listar_usuarios?ret=N"));
		}
	
	}//Fim da função inserir usuario
	
	function excluir_usuario(){
	
		$this->load->model("GusuarioModel");
		$u = $this->GusuarioModel;
		$u->id_usuario = $this->input->post("txtIdUsuario_del");
		
		if($u->excluir()){
			redirect(base_url("Admin/listar_usuarios"));
		}
		else{
			redirect(base_url("Admin/listar_usuarios?ret=N"));
		}
	
  }//Fim da função excluir usuario
	
	function listar_acoes(){
		
		$this->load->model("GacoesModel");
		$a = $this->GacoesModel;
		$dados['acoes'] = $a->listar_acoes();
		
		$this->load->model("GmoduloModel");
		$mod = $this->GmoduloModel;
		$dados['modulos2'] = $mod->listar_modulos();
		
		$this->load->view("admin/GListarAcoesView.php", $dados);
		
	}//Fim da função listar acoes
	
	function inserir_acao(){
		
		$this->load->model("GacoesModel");
		$a = $this->GacoesModel;
		$a->id_modulo = $this->input->post("txtIdModulo");
		$a->titulo = $this->input->post("txtTitulo");
		$a->descricao = $this->input->post("txtDescricao");
		$a->url = $this->input->post("txtUrl");
		$a->usuario_cad = $_SESSION['login'][0]->login;
		$a->data_cad = date('Y-m-d H:i');
		
		$id_acao = $a->inserir();
		
		if($id_acao){
			redirect(base_url("Admin/editar_acao/" . $id_acao));
		}
		else{
			redirect(base_url("Admin/listar_acoes?ret=N"));
		}
		
    }
		//Fim da função listar acoes
    
    function notificacoes_frame(){

        // $this->load->view("admin/NotificacoesFrameView.php");

    }//Fim da função notificacoes frame

    function notificacao_vista($id_notificacao){

        //Model notificações
        $this->load->model("NotificacoesModel");
        $n = $this->NotificacoesModel;
        $n->id_notificacao = $id_notificacao;
        $n->carregar();

        $n->status = 2;
        $n->atualizar();

        echo "OK";

    }//Fim da função notificacoes frame

    function inserir_filial_usuario($id_usuario){

        $this->load->model("GusuarioFilialModel");
		$uf = $this->GusuarioFilialModel;
        $uf->id_usuario = $id_usuario;
        $uf->id_filial = $this->input->post("txtFilial");
        $uf->usuario_cad = $_SESSION['login'][0]->login;
        $uf->data_cad = date('Y-m-d H:i');

        $uf->inserir();

        redirect(base_url("Admin/editar_usuario/" . $id_usuario . "?tab=filiais"));

    }//Fim da inserir filial usuario

    function inserir_permissao_usuario($id_usuario){

        $this->load->model("GUsuarioPermissaoModel");
		$uf = $this->GUsuarioPermissaoModel;
        $uf->id_usuario = $id_usuario;
        $uf->id_pagina = $this->input->post("txtPagina");
        $uf->criadopor = $_SESSION['login'][0]->login;
        $uf->criadoem = date('Y-m-d H:i');
        $uf->status = 'P';

        $uf->inserir();

        redirect(base_url("Admin/editar_usuario/" . $id_usuario . "?tab=permissao"));

    }//Fim da inserir filial usuario

    function excluir_filial_usuario(){

        $this->load->model("GusuarioFilialModel");
		$uf = $this->GusuarioFilialModel;
        $uf->id_usuariofilial = $this->input->post("txtIdUsuarioFilial_del");
        $uf->carregar();

        $uf->excluir();

        redirect(base_url("Admin/editar_usuario/" . $uf->id_usuario . "?tab=filiais"));

    }//Fim da função excluir filial usuario

    function listar_modulos(){
		
		$this->load->model("GmoduloModel");
		$mod = $this->GmoduloModel;
		$dados['lista_modulos'] = $mod->listar_modulos();
		
		$this->load->view("admin/GListarModulosView.php", $dados);
		
    }//Fim da função listar modulos
    
    function config_site(){

        $this->load->view("admin/GconfigSiteView.php");

    }//Fim da função configurações do site
	
	function atualizar_config_site(){
	
        $this->configsite->contato_site = $this->input->post("txtContatoSite");
		$this->configsite->email_contato = $this->input->post("txtEmailContato");
		$this->configsite->email_remetente = $this->input->post("txtEmailRemetente");
		$this->configsite->slide_tempo = $this->input->post("txtSlideTempo");
		
		if($this->configsite->atualizar()){
			redirect(base_url("Admin/config_site?ret=S"));
		}
		else{
			redirect(base_url("Admin/config_site?ret=N"));
		}
		
	}//Fim da função atualizar config site
	
	function listar_perfis(){

        $this->load->model("GperfilModel");
		$perf = $this->GperfilModel;
        $dados['perfis'] = $perf->listar_perfis();

        //Model Ações
        $this->load->model("GacoesModel");
        $a = $this->GacoesModel;
        $dados['acoes'] = $a->listar_acoes();

        $this->load->view("admin/GlistarPerfisView.php", $dados);

    }//Fim da função listar perfis

    function inserir_perfil(){

        $this->load->model("GperfilModel");
        $p = $this->GperfilModel;
        $p->supervisor = $this->input->post("txtSupervisor");
        $p->descricao = $this->input->post("txtDescricao");
        $p->acoes = implode(';', $this->input->post("txtAcoes"));
        $p->usuario_cad = $_SESSION['login'][0]->login;
        $p->data_cad = date('Y-m-d H:i');

        $id_perfil = $p->inserir();

        if($id_perfil){
            redirect(base_url("Admin/editar_perfil/" . $id_perfil));
        }
        else{
            redirect(base_url("Admin/listar_perfis?ret=N"));
        }

    }//Fim da função inserir perfil
	
	function editar_perfil($id_perfil){

        $this->load->model("GperfilModel");
        $p = $this->GperfilModel;
        $p->id_perfil = $id_perfil;
        $p->carregar();
		
		//Model Ações
        $this->load->model("GacoesModel");
        $a = $this->GacoesModel;
        $dados['acoes'] = $a->listar_acoes();

        $this->load->view("admin/GEditarPerfilView.php", $dados);

    }//Fim da função editar perfil
	
	function atualizar_perfil($id_perfil){

        $this->load->model("GperfilModel");
        $p = $this->GperfilModel;
        $p->id_perfil = $id_perfil;
        $p->carregar();
		
        $p->supervisor = $this->input->post("txtSupervisor");
        $p->descricao = $this->input->post("txtDescricao");
        $p->acoes = implode(';', $this->input->post("txtAcoes"));
        $p->usuario_alt = $_SESSION['login'][0]->login;
        $p->data_alt = date('Y-m-d H:i');

        if($p->atualizar()){
            redirect(base_url("Admin/editar_perfil/" . $id_perfil . "?ret=S"));
        }
        else{
            redirect(base_url("Admin/editar_perfil/" . $id_perfil . "?ret=N"));
        }

    }//Fim da função atualizar perfil
	
	function gerenciar_arquivos(){
		
		$this->load->view("admin/CGerenciadorFilemanagerView.php");
		
	}//Fim da função gerenciador de arquivos
	
	function listar_notificacoes(){
		
		//Model Notificações
        $this->load->model("NotificacoesModel");
        $n = $this->NotificacoesModel;
        $dados['notificacoes'] = $n->listar_notificacoes();

		$this->load->view("admin/GNotificacoesListarView.php", $dados);
		
	}//Fim da função listar notificacoes
	
	function excluir_notificacao(){
		
		//Model Notificações
        $this->load->model("NotificacoesModel");
        $n = $this->NotificacoesModel;
        $n->id_notificacao = $this->input->post("txtIdNotificacao_del");
		$n->excluir();
		
		redirect(base_url("Admin/listar_notificacoes"));
		
	}//Fim da função listar notificacoes
	
	
}

?>