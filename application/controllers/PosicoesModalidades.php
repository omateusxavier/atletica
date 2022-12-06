<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PosicoesModalidades extends CI_Controller {

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


	function inserir(){
        $erro = 0;
        $this->load->model("PosicoesModalidadesModel");
		$posicaoModalidade = $this->PosicoesModalidadesModel;
        $modalidades = $this->input->post("txtModalidade");
        foreach($modalidades as $i => $val){
            //verifica se ja não existe modalidade amarrada a essa posicao

            $posicaoModalidade->IDPOSICAO = $this->input->post("txtIdPosicao");
            $posicaoModalidade->IDMODALIDADE = $val;
            $posicaoModalidade->USUARIOCAD = $_SESSION['login'][0]->LOGIN;
		    $posicaoModalidade->DATACAD = date('Y-m-d H:i');
		    $posicaoModalidade->USUARIOALT = $_SESSION['login'][0]->LOGIN;
		    $posicaoModalidade->DATAALT = date('Y-m-d H:i');

            $ret = $posicaoModalidade->inserir();

            if($ret){
                $erro = $erro;
            }
            else{
                $erro++;
            }
        }
		if($erro == 0){
			redirect(base_url("Posicoes?ret=S"));
		}
		else{
			redirect(base_url("Posicoes?ret=N"));
		}
	}

	function buscar_posicoes_modalidades($idmodalidade){
		$posicoes = array();
		$modalidades_escolhidas = explode(',',$idmodalidade );
		
		if(isset($_POST)){

				//Consulta Posições de determinada(s) modalidade(s) 
				$sql = "SELECT
							pm.IDPOSICAO,
							pm.IDPOSICAOMODALIDADE,
							p.DESCRICAO,
							m.DESCRICAO AS 'MODALIDADE'
						FROM
							posicoes_modalidades pm INNER JOIN posicoes p ON p.IDPOSICAO = pm.IDPOSICAO
													INNER JOIN modalidades m ON m.IDMODALIDADE = pm.IDMODALIDADE
						WHERE
							pm.IDMODALIDADE IN(".$idmodalidade.")";

				$query = $this->db->query($sql);

				$posicoes = $query->result();
			
		}
		echo json_encode(array('posicoes'=> $posicoes), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

	}//Fim da função buscar_posicoes_modalidades

	

	// function editar($idposicao){
	// 	$this->load->model("PosicoesModel");
	// 	$posicao = $this->PosicoesModel;
	// 	$posicao->IDPOSICAO = $idposicao;
	// 	$posicao->carregar();

	// 	//posicoes modalidades
	// 	$this->load->model("PosicoesModalidadesModel");
	// 	$posicaoModalidade = $this->PosicoesModalidadesModel;
	// 	$posicaoModalidade->IDPOSICAO = $idposicao;
	// 	$dados['posicoes_modalidades'] = $posicaoModalidade->listar_unico();

	// 	$this->load->view("admin/PosicoesEditarView.php", $dados);
	// }

	// function atualizar($idposicao){
	// 	$this->load->model("PosicoesModel");
	// 	$posicao = $this->PosicoesModel;
	// 	$posicao->IDPOSICAO = $idposicao;
	// 	$posicao->carregar();
		
		
	// 	$posicao->DESCRICAO = $this->input->post("txtNome");

	// 	$posicao->USUARIOALT = $_SESSION['login'][0]->LOGIN;
	// 	$posicao->DATAALT = date('Y-m-d H:i');
		
	// 	if($posicao->atualizar()){
	// 		redirect(base_url("Posicoes?ret=S"));
	// 	}
	// 	else{
	// 		redirect(base_url("Posicoes?ret=N"));
	// 	}
	// }

	// function excluir(){
	
	// 	$this->load->model("PosicoesModel");
	// 	$posicao = $this->PosicoesModel;
	// 	$posicao->IDPOSICAO = $this->input->post("txtIdEquipe_del");
		
	// 	if($posicao->excluir()){
	// 		redirect(base_url("Posicoes?ret=S"));
	// 	}
	// 	else{
	// 		redirect(base_url("Posicoes?ret=N"));
	// 	}
	
    // }
} //fim classe