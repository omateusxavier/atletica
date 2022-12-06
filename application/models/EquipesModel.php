<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EquipesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDEQUIPE;
	public $LOGO;
    public $DESCRICAO;
    public $IDMODALIDADEGENERO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("equipes", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from equipes where IDEQUIPE = $this->IDEQUIPE");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        		$this->IDEQUIPE = $val->IDEQUIPE;
				$this->LOGO = $val->LOGO;
				$this->DESCRICAO = $val->DESCRICAO;
        		$this->IDMODALIDADEGENERO = $val->IDMODALIDADEGENERO;
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
	
		$sql = "delete from equipes where IDEQUIPE = ?";
		
		$query = $this->db->query($sql, array($this->IDEQUIPE));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
					    equipes
					
            set
			  LOGO = ?,
              DESCRICAO = ?,
              IDMODALIDADEGENERO = ?,
              USUARIOALT = ?,
              DATAALT = ?
              
            where
              IDEQUIPE = ?";
					
		$query = $this->db->query($sql, array($this->LOGO,
											  $this->DESCRICAO,
											  $this->IDMODALIDADEGENERO,
											  $this->USUARIOALT,
											  $this->DATAALT,
											  $this->IDEQUIPE));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
	
		$sql = "select 
					*
				from 
					equipes";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	  }//Fim da função login

}

?>