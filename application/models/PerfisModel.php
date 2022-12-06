<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PerfisModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDPERFIL ;
    public $DESCRICAO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("perfis", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from perfis where IDPERFIL = $this->IDPERFIL");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        $this->IDPERFIL = $val->IDPERFIL;
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
	
		$sql = "delete from perfis where IDPERFIL = ?";
		
		$query = $this->db->query($sql, array($this->IDPERFIL));
		
		return $query;
	
  }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
              perfis
					
            set
              DESCRICAO = ?,
              USUARIOALT = ?,
              DATAALT = ?
              
            where
              IDPERFIL = ?";
					
		$query = $this->db->query($sql, array($this->DESCRICAO,
                                          $this->USUARIOALT,
                                          $this->DATAALT,
                                          $this->IDPERFIL));
											  
		return $query;
		
	}//Fim da função atualizar

}

?>