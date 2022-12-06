<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModalidadesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDMODALIDADE;
    public $DESCRICAO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("modalidades", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from modalidades where IDMODALIDADE = $this->IDMODALIDADE");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDMODALIDADE = $val->IDMODALIDADE;
				$this->DESCRICAO = $val->DESCRICAO;
				$this->USUARIOCAD = $val->USUARIOCAD;
				$this->DATACAD = $val->DATACAD;
				$this->USUARIOALT = $val->USUARIOALT;
				$this->DATAALT = $val->DATAALT;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
    }//Fim da carregar
	
	function excluir(){
	
		$sql = "delete from modalidades where IDMODALIDADE = ?";
		
		$query = $this->db->query($sql, array($this->IDMODALIDADE));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
					modalidades
					
				set
					DESCRICAO = ?,
					USUARIOALT = ?,
					DATAALT = ?
				
				where
					IDMODALIDADE = ?";
					
		$query = $this->db->query($sql, array($this->DESCRICAO,
											  $this->USUARIOALT,
											  $this->DATAALT,
											  $this->IDMODALIDADE));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
	
		$sql = "select 
					*
				from 
					modalidades";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	  }//Fim da função listar

}

?>