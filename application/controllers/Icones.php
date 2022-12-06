<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Icones extends CI_Controller{

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
	
	function listar_icones(){
		
		$this->load->model("IconesModel");
		$no = $this->IconesModel;
		$dados['icones'] = $no->visualizar_icones();

		
		$this->load->view("admin/CIconesListarView.php", $dados);
		
	}//Fim da função listar noticias
	
	function novo_icone(){
		
		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
		$dados['filial2'] = $f->listar_filiais();

		$this->load->model("PaginasModel");
        $p = $this->PaginasModel;
        $dados['pagina'] = $p->listar_paginas_pesquisa_dinamico();
		
		$this->load->view("admin/CIconesNovoView.php", $dados);
		
	}//Fim da função nova noticia
	
	function inserir_icones(){

		$this->load->model("IconesModel");
		$i = $this->IconesModel;
		
		$i->filial = $this->input->post('txtFilial');
		$filial_retorno = $this->input->post("txtFilial");
		$i->titulo = $this->input->post("txtTitulo");
		$i->status = $this->input->post("txtStatus");
		$i->target = $this->input->post("txtTarget");

		if($filial_retorno = 2){
			$filial = 'colegio';
		} elseif($filial_retorno == 3){
			$filial = 'integradas';

		} else {
			$filial = 'home';
		}

		if($target == 'DINAMICA'){

			$i->link = $filial.'/'.$this->input->post("txtLink_D");
		} else {

			$i->link = $filial.'/'.$this->input->post("txtLink");

		}
		$i->posicao = $this->input->post("txtPosicao");
		if(isset($_POST["txtIcone"])){
			$i->icone = $this->input->post("txtIcone");
		} 
        $i->criadopor = $_SESSION['login'][0]->login;
        $i->criadoem = date('Y-m-d H:i');
		
        $id_icone = $i->inserir();
        
		//Se inserido com sucesso
		if($id_icone){
			//Se opção de remover capa não marcada
			if($this->input->post("txtRemoverCapa") == "N"){
				//Se houver imagem sendo inserida
				if($_FILES['txtCapa']['name'] != ''){
			   
					//Definindo caminho da imagem
					$caminho = "imagens/icones/" . $id_icone;

					//Se pasta não existir, cria
					if(!file_exists($caminho)){
						mkdir($caminho);
					}
				   
					//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
					$config['upload_path'] = $caminho;
					$config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					//Executa upload da imagem
					if($this->upload->do_upload('txtCapa')){
						
						$dados_imagem = $this->upload->data();

						$mini['image_library'] = 'gd2';
						$mini['source_image'] = $caminho . '/'. $dados_imagem['file_name'];
						$mini['create_thumb'] = TRUE;
						$mini['maintain_ratio'] = FALSE;
						$mini['width'] = 100;
						$mini['height'] = 75;
						
						$this->load->library('image_lib', $mini);
						
						$this->image_lib->resize();

						$i->img = $dados_imagem['file_name'];
						
						$i->id = $id_icone;
						$i->atualizar();
					}
			   
				}
				
			}
			
		
			redirect(base_url("Icones/editar_icones/" . $id_icone));
		}
		else{
			redirect(base_url("Icones/listar_icones?ret=N"));
		}
	
	}//Fim da função inserir noticia
	
	function editar_icones($id_icones){
		
		$this->load->model("IconesModel");
		$no = $this->IconesModel;
		$no->id = $id_icones;
		$no->carregar();
		
		// carregar as filiais
        $this->load->model("GfilialModel");
        $f = $this->GfilialModel;
		$dados['filial'] = $f->listar_filiais();
		
		$this->load->model("PaginasModel");
        $p = $this->PaginasModel;
        $dados['pagina'] = $p->listar_paginas_pesquisa_dinamico();

		$this->load->view("admin/CIconesEditarView.php", $dados);
		
	}//Fim da função editar noticia
	
	function atualizar_arquivo($idicone){
	
		$this->load->model("IconesModel");
		$no = $this->IconesModel;
		$no->id = $idicone;
		// inicia upload de arquivo se tiver

			//Definindo caminho da imagem
			$caminho = "arquivos/icones/";

			//Se pasta não existir, cria
			if(!file_exists($caminho)){
				mkdir($caminho);
			}
		   
			//Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
			$config_arq['upload_path'] = $caminho;
			$config_arq['allowed_types']  = 'gif|jpg|png|jpeg|bmp|doc|docx|pdf|rar|zip';
			$config_arq['encrypt_name'] = TRUE;
			$this->load->library('upload', $config_arq);

			//Executa upload do arquivo
			if($this->upload->do_upload('txtArquivo')){
				
				$dados_arquivo = $this->upload->data();

				$no->arquivo = $dados_arquivo['file_name'];

				$no->modificadopor = $_SESSION['login'][0]->login;
				$no->modificadoem = date('Y-m-d H:i');
			
				$no->atualizar_arquivo();

				redirect(base_url('Icones/editar_icones/'.$idicone."/?up=ok"));
				
			}

			$no->atualizar_arquivo();

			redirect(base_url('Icones/editar_icones/'.$idicone."/?up=removido"));
	   
		
        
	}//Fim da função atualizar noticia
	
	function excluir_icone(){
	
		$this->load->model("IconesModel");
		$no = $this->IconesModel;
		$no->id = $this->input->post("txtIdIcone_del");
	
		$no->excluir();
		
		redirect(base_url("Icones/listar_icones"));
		
		
	
	}//Fim da função excluir noticia
	
	function integracao(){

		$db2 = $this->load->database('db2', TRUE);

		$sql = "select * 
		
					from noticias
					
				order by idnoticias asc";

		$query = $db2->query($sql);
		$dados = $query->result();

		$this->load->model("NoticiasModel");
		$n = $this->NoticiasModel;

		foreach($dados as $d){

			$n->filial = $d->idinstituicao_n;
			if($d->idinstituicao_n == 2){
				$n->idsetor = 11;
			}
			else {
				$n->idsetor == 24;
			}
			$n->data = $d->datanoticias;
			$n->titulo = $d->titulonoticias;
			$n->previa = $d->previanoticias;
			$n->descricao = $d->textonoticias;
			$n->criadopor = $d->idusuarios_n;
			$n->criadoem = $d->datanoticias;
			if($d->exibirnoticias == 1){
				$n->exibirindex = 'S';
			}
			else {
				$n->exibirindex = 'N';
			}
			if($d->statusnoticias == 1){
				$n->status = 'P';
			}
			else {
				$n->status = 'N';
			}
			$n->tags = $d->titulonoticias;
			//$n->inserir(); desabilitado ultimo processo em 19/09/2018 17:30

			echo "terminou";

		}
		
	}

	function atualizar_icones($idicone){

		$this->load->model("IconesModel");
		$n = $this->IconesModel;
		$n->id = $idicone;
		$n->carregar();

		$n->id = $idicone;
		$n->filial = $this->input->post("txtFilial");
        $filial_retorno = $this->input->post("txtFilial");
        
		if($filial_retorno == 2){
			$filial = 'colegio';
		} elseif($filial_retorno == 3){
			$filial = 'integradas';

		} else {
			$filial = 'home';
		}
		$n->titulo = $this->input->post("txtTitulo");
		$n->target = $this->input->post("txtTarget");
		$target = $this->input->post("txtTarget");

		if($target == 'DINAMICA'){
			$n->link = $filial.'/'.$this->input->post("txtLink_D");
			
		} else {
			$n->link = $this->input->post("txtLink");
			
		}

        
		$n->posicao = $this->input->post("txtPosicao");

		if(isset($_POST["txtIcone"])){
			$n->icone = $this->input->post("txtIcone");
		}
		
		$n->status = $this->input->post("txtStatus");
		$n->modificadopor = $_SESSION['login'][0]->login;
		$n->modificadoem = date('Y-m-d H:i');

		//Se opção de remover capa marcada
		if($this->input->post("txtRemoverCapa") == "S"){
			
			if($n->img != ''){
				//Definindo caminho da imagem
				$caminho_exclusao = $caminho = "imagens/icones/" . $idicone . "/" . $n->img;

				//excluir arquivo do servidor
				unlink($caminho_exclusao);
			}
				
			$n->img = null;
			
		}
		//Se houver imagem nova
		else if($_FILES['txtCapa']['name'] != ''){
	   
			//Definindo caminho da imagem
            $caminho = "imagens/icones/" . $idicone;

            //Se pasta não existir, cria
			if(!file_exists($caminho)){
                mkdir($caminho);
            }
           
            //Configura biblioteca de UPLOAD do CODEIGNITER e inicializa
            $config['upload_path'] = $caminho;
            $config['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            //Executa upload da imagem
            if($this->upload->do_upload('txtCapa')){
                
				$dados_imagem = $this->upload->data();
				
				$mini['image_library'] = 'gd2';
				$mini['source_image'] = $caminho . '/'. $dados_imagem['file_name'];
				$mini['create_thumb'] = TRUE;
				$mini['maintain_ratio'] = FALSE;
				$mini['width'] = 100;
				$mini['height'] = 75;
				
				$this->load->library('image_lib', $mini);
				
				$this->image_lib->resize();

				$n->img = $dados_imagem['file_name'];
            
			}
	   
		}
       
		if($n->atualizar()){
			redirect(base_url("Icones/editar_icones/" . $idicone . "?ret=S"));
		}
		else{
			redirect(base_url("Icones/editar_icones/" . $idicone . "?ret=N"));
        } 

		
	}

	function Atualizar_Posicao(){

		$this->load->model("IconesModel");
		$i = $this->IconesModel;

		$ordem = $_GET['linhaId'];
		$posicao = 1;
		foreach($ordem as $o){
			$i->posicao = $posicao;
			$i->id = intval($o);
			$i->atualizar_posicao();
			
			$posicao++;
		}
		
	}

	function atualizar_titulo(){

		$this->load->model("NoticiasModel");
		$n = $this->NoticiasModel;
		$consulta = $n->listar_noticias();

		foreach($consulta as $con){

			$up = $this->NoticiasModel;

			$url = str_replace(" ", "-", strtolower($con->titulo));
			$url_nova = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(º)/","/(°)/"),explode(" ","a a e e i i o o u u n n c c - -"),$url);
			$url_pronta = $url_nova."-".$con->id;
			
			$up->url_amigavel = $url_pronta;
			$up->id = $con->id;
			$up->atualizar_titulo();
		}

		echo "terminou";

		
		
	}


	
}

?>