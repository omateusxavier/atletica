<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menusite extends CI_Controller {

	public function __construct(){
		parent::__construct();

		date_default_timezone_set('America/Sao_paulo');
			
		session_start();

		if(!isset($_SESSION['login'])){
			redirect(base_url("Usuario/login"));
		}

	}
	
	public function index(){

		$this->load->model("MenuSiteModel");
		$m = $this->MenuSiteModel;
		$dados['itensmenu'] = $m->listar();

        $this->load->model("PaginasModel");
		$p = $this->PaginasModel;
		$dados['pagina'] = $p->listar_paginas_p_vinculo();

		$this->load->view('admin/MenuSiteListarView.php', $dados);
	
	}//Fim da função index

	public function listar(){

		redirect(base_url("Menusite"));
	
	}//Fim da função listar

	function inserir(){

		$this->load->model("MenuSiteModel");
		$m = $this->MenuSiteModel;
		
		$m->descricao = $this->input->post("txtDescricao");
		$m->visivel = $this->input->post("txtVisivel");
		$m->link = $this->input->post("txtUrl");
		$m->target = $this->input->post("txtTarget");
		$m->contexto = $this->input->post("txtContexto");
		$m->posicao = $this->input->post("txtPosicao");
		$m->idmenupai = $this->input->post("txtIdMenuPai");
        $m->idpaginadinamica = $this->input->post("txtIdpaginaDinamica");
		$m->usuariocad = $_SESSION['login']->login;
		$m->datacad = date("Y-m-d H:I");
		$m->usuarioalt = $_SESSION['login']->login;
		$m->dataalt = date("Y-m-d H:I");

		$idmenu = $m->inserir();

		if($idmenu){
			redirect(base_url("Menusite/listar?ret=S"));
		}
		else{
			redirect(base_url("Menusite/listar?ret=N"));
		}

	}//Fim da função inserir

	function frame_editar($idmenu){

		$this->load->model("MenuSiteModel");
		$m = $this->MenuSiteModel;
		$m->idmenu = $idmenu;
		$m->carregar();

		$this->load->view("admin/MenuSiteEditarView.php");


	}//Fim da função frame editar

	function atualizar(){

		$this->load->model("MenuSiteModel");
		$m = $this->MenuSiteModel;
		$m->idmenu = $this->input->post("txtIdMenu");
        $m->idpaginadinamica = $this->input->post("txtIdpaginaDinamica");
		$m->carregar();
		
		$m->descricao = $this->input->post("txtDescricao");
		$m->visivel = $this->input->post("txtVisivel");
		$m->link = $this->input->post("txtUrl");
		$m->target = $this->input->post("txtTarget");
		$m->contexto = $this->input->post("txtContexto");
		$m->posicao = $this->input->post("txtPosicao");
		$m->usuarioalt = $_SESSION['login']->login;
		$m->dataalt = date("Y-m-d H:I");

		if($m->atualizar()){
			redirect(base_url("Menusite/listar?ret=S"));
		}
		else{
			redirect(base_url("Menusite/listar?ret=N"));
		}

	}//Fim da função atualizar

	function excluir(){

		$this->load->model("MenuSiteModel");
		$m = $this->MenuSiteModel;
		$m->idmenu = $this->input->post("txtIdDel");
		$m->carregar();

		if($m->excluir()){
			redirect(base_url("Menusite/listar"));
		}
		else{
			redirect(base_url("Menusite/listar?ret=N"));
		}

	}//Fim da função excluir

}