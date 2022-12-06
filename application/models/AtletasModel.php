<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AtletasModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDATLETA;
    public $NOME;
	public $RA;
    public $EMAIL;
    public $TELEFONE;
	public $IMAGEM;
	public $SITUACAO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("atletas", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from atletas where IDATLETA = $this->IDATLETA");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDATLETA = $val->IDATLETA;
				$this->NOME = $val->NOME;
				$this->RA = $val->RA;
				$this->EMAIL = $val->EMAIL;
				$this->TELEFONE = $val->TELEFONE;
				$this->IMAGEM = $val->IMAGEM;
				$this->SITUACAO = $val->SITUACAO;
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
	
		$sql = "delete from atletas where IDATLETA = ? and SITUACAO = 'A'";
		
		$query = $this->db->query($sql, array($this->IDATLETA));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
					atletas
					
            	set
					NOME = ?,
					RA = ?,
					EMAIL = ?,
					TELEFONE = ?,
					IMAGEM = ?,
					SITUACAO = ?,
					USUARIOALT = ?,
					DATAALT = ?
              
				where
					IDATLETA = ?";
					
		$query = $this->db->query($sql, array($this->NOME,
											  $this->RA,
                                              $this->EMAIL,
                                              $this->TELEFONE,
											  $this->IMAGEM,
											  $this->SITUACAO,
											  $this->USUARIOALT,
											  $this->DATAALT,
                                          	  $this->IDATLETA));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar_atletas(){
		$sql = "SELECT * FROM atletas WHERE SITUACAO = 'A'";

		$query = $this->db->query($sql);
		
		return $query->result();
	}

	function listar_candidatos(){
		$sql = "SELECT * FROM atletas WHERE SITUACAO = 'C'";

		$query = $this->db->query($sql);
		
		return $query->result();
	}

	function buscar_ra(){
		$sql = "SELECT * FROM atletas WHERE RA = ? and SITUACAO = 'A'";

		$query = $this->db->query($sql, array($this->RA));
		
		return $query->result();
	}

}

?>