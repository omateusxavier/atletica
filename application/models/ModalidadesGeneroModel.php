<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModalidadesGeneroModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDMODALIDADEGENERO;
    public $IDMODALIDADE;
    public $IDGENERO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("modalidades_generos", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from modalidades_generos where IDMODALIDADEGENERO = $this->IDMODALIDADEGENERO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDMODALIDADEGENERO = $val->IDMODALIDADEGENERO;
				$this->IDMODALIDADE = $val->IDMODALIDADE;
                $this->IDGENERO = $val->IDGENERO;
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
	
		$sql = "delete from modalidades_generos where IDMODALIDADEGENERO = ?";
		
		$query = $this->db->query($sql, array($this->IDMODALIDADEGENERO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    modalidades_generos
					
				set
					IDMODALIDADE = ?,
                    IDGENERO = ?,
					USUARIOALT = ?,
					DATAALT = ?
				
				where
					IDMODALIDADEGENERO = ?";
					
		$query = $this->db->query($sql, array($this->IDMODALIDADE,
                                              $this->IDGENERO,
											  $this->USUARIOALT,
											  $this->DATAALT,
											  $this->IDMODALIDADEGENERO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
	
		$sql = "select 
                    mg.IDMODALIDADEGENERO, 
                    mg.IDMODALIDADE, 
                    mg.IDGENERO, 
                    m.DESCRICAO as 'MODALIDADE', 
                    g.DESCRICAO as 'GENERO'
                from 
                    modalidades_generos mg inner join modalidades m on m.IDMODALIDADE = mg.IDMODALIDADE
                                           inner join genero g on g.IDGENERO = mg.IDGENERO";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	  }//Fim da função listar

}

?>