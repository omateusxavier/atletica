<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class NotificacoesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

	  public $id_notificacao;
	  public $tipo;
	  public $titulo;
	  public $descricao;
	  public $json;
    public $status;
    public $id_usuariodest;
    public $data_cad;
	
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("notificacoes", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from notificacoes where id_notificacao = $this->id_notificacao");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->id_notificacao = $val->id_notificacao;
				$this->tipo = $val->tipo;
                $this->titulo = $val->titulo;
                $this->descricao = $val->descricao;
				$this->json = $val->json;
				$this->status = $val->status;
                $this->id_usuariodest = $val->id_usuariodest;
                $this->data_cad = $val->data_cad;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
	}//Fim da carregar

	function atualizar(){
	
		$sql = "update 
                    notificacoes 
				
				set 
					status = ?
					
				where
					id_notificacao = ?";
		
		$query = $this->db->query($sql, array($this->status, 
											  $this->id_notificacao));
		
		return $query;
	
	}//Fim da função atualizar
    
    function listar_notificacoes(){

        $sql = "select * from notificacoes";
		
		$query = $this->db->query($sql);
		
		return $query->result();

    }//Fim da função listar notificacoes
	
	function excluir(){
		
		$sql = "delete from notificacoes where id_notificacao = ?";
		
		$query = $this->db->query($sql, array($this->id_notificacao));
		
		return $query;
		
	}//Fim da função excluir

}

?>