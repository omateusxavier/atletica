<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CursosModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDCURSO;
	public $DESCRICAO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("cursos", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from cursos where IDCURSO = $this->IDCURSO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDCURSO = $val->IDCURSO;
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
	
		$sql = "delete from cursos where IDCURSO = ?";
		
		$query = $this->db->query($sql, array($this->IDCURSO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
							cursos
            set
							DESCRICAO = ?,
							USUARIOALT = ?,
							DATAALT = ?
									
						where
							IDCURSO = ?";
					
		$query = $this->db->query($sql, array($this->DESCRICAO,
																					$this->USUARIOALT,
																					$this->DATAALT,
																					$this->IDCURSO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
		$sql = "SELECT 
							*
						FROM 
							cursos";

		$query = $this->db->query($sql);
		
		return $query->result();
	}

}

?>