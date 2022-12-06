<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller{

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
	
	function listar_eventos(){
		
		$this->load->model("EventosModel");
		$ev = $this->EventosModel;
		$dados['eventos'] = $ev->listar_eventos();
		
		$this->load->view("admin/CEventosListarView.php", $dados);
		
	}//Fim da função listar eventos
	
	function novo_evento(){

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
        $dados['filial'] = $f->listar_filiais();
		
		$this->load->view("admin/CEventosNovoView.php", $dados);
		
	}//Fim da função novo evento
	
	function inserir_evento(){
	
		$this->load->model("EventosModel");
		$ev = $this->EventosModel;
		
		$ev->filial = $this->input->post('txtFilial');
		$ev->evento = $this->input->post("txtTitulo");
		$ev->descricao = $this->input->post("txtDescricao");
		$ev->datainicio = implode('-', array_reverse(explode('/', $this->input->post("txtDataInicio"))));
		$ev->datafinal = implode('-', array_reverse(explode('/', $this->input->post("txtDataFinal"))));
		$ev->horarioexibir = $this->input->post("txtHorario");
		$ev->link = $this->input->post("txtLink");
		$ev->target = $this->input->post("txtTarget");
		$ev->local = $this->input->post("txtLocal");
		$ev->status = $this->input->post("txtStatus");
		$ev->tags = $this->input->post("txtTags");

        $ev->criadopor = $_SESSION['login'][0]->login;
		$ev->criadoem = date('Y-m-d H:i');
		
		$id_evento = $ev->inserir();
		
		if($id_evento){
			redirect(base_url("Evento/editar_evento/" . $id_evento));
		}
		else{
			redirect(base_url("Evento/editar_evento?ret=N"));
		}
	
	}//Fim da função inserir evento
	
	function editar_evento($id_evento){

		//Carregando o evento pelo id do evento selecionado
		$this->load->model("EventosModel");
		$ev = $this->EventosModel;
		$ev->id = $id_evento;
		$ev->carregar();

		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
		$dados['filial'] = $f->listar_filiais();
		
		// carregar as noticias para link em eventos

		$this->load->model("NoticiasModel");
		$no = $this->NoticiasModel;
		$dados['noticias'] = $no->todas_noticias();

		$this->load->view("admin/CEventosEditarView.php", $dados);
		
	}//Fim da função editar evento

  
	function atualizar_evento($id_evento){
	
		$this->load->model("EventosModel");
		$ev = $this->EventosModel;
		$ev->id = $id_evento;
		$ev->carregar();
		
    //preencher atributos do objeto específico com dados do formEditar
		$ev->evento = $this->input->post("txtTitulo");
		$ev->descricao = $this->input->post("txtDescricao");
		$ev->datainicio = implode('-', array_reverse(explode('/', $this->input->post("txtDataInicio"))));
		$ev->datafinal = implode('-', array_reverse(explode('/', $this->input->post("txtDataFinal"))));
		$ev->horarioexibir = $this->input->post("txtHorario");
		$ev->link = $this->input->post("txtLink");
		$ev->target = $this->input->post("txtTarget");
		$ev->local = $this->input->post("txtLocal");
		$ev->status = $this->input->post("txtStatus");
		$ev->tags = $this->input->post("txtTags");
		$ev->filial = $this->input->post('txtFilial');
    $ev->modificadopor = $_SESSION['login'][0]->login;
		$ev->modificadoem = date('Y-m-d H:i');
		
		if($ev->atualizar()){
			redirect(base_url("Evento/editar_evento/" . $id_evento . "?ret=S"));
		}
		else{
			redirect(base_url("Evento/editar_evento/" . $id_evento . "?ret=N"));
		}
	
	}//Fim da função atualizar evento
	
	function excluir_evento(){
	
		$this->load->model("EventosModel");
		$ev = $this->EventosModel;
		$ev->id = $this->input->post("txtIdEvento_del");
		
		if($ev->excluir()){
			redirect(base_url("Evento/listar_eventos"));
		}
		else{
			redirect(base_url("Evento/listar_eventos?ret=N"));
		}
	
    }//Fim da função excluir evento

    function copiar_evento(){
      $this->load->model("EventosModel");
      $ev = $this->EventosModel;
      $ev->id = $this->input->post("txtIdEvento_cop");
      
      // $ev->id = $idevento;
    
      $ret = $ev->carregar();
      $ev->id = null;

      if($ev->filial == 3){
          $ev->filial = 2;

          $ev->inserir();
          redirect(base_url("Evento/listar_eventos"));

      }
      else if($ev->filial == 2){
        $ev->filial = 3;

        $ev->inserir();
        redirect(base_url("Evento/listar_eventos"));
      }

      /*echo "<pre>";
      var_dump($ev);
      echo "</pre>";*/

      //filia integardas= 3
      //colegio = 2

      /*if($ret = true){
        
      }*/

      /*foreach($ret as $dado){
        if($dado->filial == 1)
      }
   
      if($ret ){
        redirect(base_url("Evento/listar_eventos"));
      }
      else{
        redirect(base_url("Evento/listar_eventos"));
        echo "<script> alert('Erro ao duplicar') </script>";
      }*/
      
      
      // var_dump($e);
    
      //$e->id = null;
    
      //if($e->filial == 1)
    }
	
}//fim classe

?>