<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AlunosModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDALUNO;
	public $IDCURSO;
    public $NOME;
	public $RA;
    public $EMAIL;
    public $TELEFONE;
	public $IMAGEM;
	public $TIPO;
	public $IDGENERO;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("alunos", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from alunos where IDALUNO = $this->IDALUNO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDALUNO = $val->IDALUNO;
				$this->IDCURSO = $val->IDCURSO;
				$this->NOME = $val->NOME;
				$this->RA = $val->RA;
				$this->EMAIL = $val->EMAIL;
				$this->TELEFONE = $val->TELEFONE;
				$this->IMAGEM = $val->IMAGEM;
				$this->TIPO = $val->TIPO;
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
	
		$sql = "delete from alunos where IDALUNO = ?";
		
		$query = $this->db->query($sql, array($this->IDALUNO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
							alunos
            set
							IDCURSO = ?,
							NOME = ?,
							RA = ?,
							EMAIL = ?,
							TELEFONE = ?,
							IMAGEM = ?,
							TIPO = ?,
							IDGENERO = ?,
							USUARIOALT = ?,
							DATAALT = ?
									
						where
							IDALUNO = ?";
					
		$query = $this->db->query($sql, array($this->IDCURSO,
											  $this->NOME,
											  $this->RA,
											  $this->EMAIL,
											  $this->TELEFONE,
											  $this->IMAGEM,
											  $this->TIPO,
											  $this->IDGENERO,
											  $this->USUARIOALT,
											  $this->DATAALT,
											  $this->IDALUNO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar_atletas(){
		$sql = "SELECT 
							alunos.*, 
							cursos.DESCRICAO as 'CURSO' 
						FROM 
							alunos INNER JOIN cursos ON alunos.IDCURSO = cursos.IDCURSO 
						WHERE 
						TIPO = 'A' ";

		$query = $this->db->query($sql);
		
		return $query->result();
	}

	function listar_candidatos(){
		$sql = "SELECT 
					alunos.*, 
					cursos.DESCRICAO as 'CURSO' 
				FROM 
					alunos INNER JOIN cursos ON alunos.IDCURSO = cursos.IDCURSO 
				WHERE 
				TIPO = 'C' ";

		$query = $this->db->query($sql);
		
		return $query->result();
	}

	function buscar_ra(){
		$sql = "SELECT * FROM alunos WHERE RA = ?";

		$query = $this->db->query($sql, array($this->RA));
		
		return $query->result();
	}

}

?>