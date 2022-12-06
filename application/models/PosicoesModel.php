<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PosicoesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDPOSICAO;
    public $DESCRICAO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("posicoes", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from posicoes where IDPOSICAO = $this->IDPOSICAO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        		$this->IDPOSICAO = $val->IDPOSICAO;
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
	
		$sql = "delete from posicoes where IDPOSICAO = ?";
		
		$query = $this->db->query($sql, array($this->IDPOSICAO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
					    posicoes
					
            set
              DESCRICAO = ?,
              USUARIOALT = ?,
              DATAALT = ?
              
            where
              IDPOSICAO = ?";
					
		$query = $this->db->query($sql, array($this->DESCRICAO,
                                          $this->IDMODALIDADE,
                                          $this->USUARIOALT,
                                          $this->DATAALT,
                                          $this->IDPOSICAO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
	
		$sql = "select 
					*
				from 
					posicoes";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	  }//Fim da função listar

}

?>