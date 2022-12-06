<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GenerosModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDGENERO;
    public $DESCRICAO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("genero", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from genero where IDGENERO = $this->IDGENERO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDGENERO = $val->IDGENERO;
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
	
		$sql = "delete from genero where IDGENERO = ?";
		
		$query = $this->db->query($sql, array($this->IDGENERO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    genero
					
				set
					DESCRICAO = ?,
					USUARIOALT = ?,
					DATAALT = ?
				
				where
					IDGENERO = ?";
					
		$query = $this->db->query($sql, array($this->DESCRICAO,
											  $this->USUARIOALT,
											  $this->DATAALT,
											  $this->IDGENERO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
	
		$sql = "select 
					*
				from 
					genero";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	  }//Fim da função listar

}

?>