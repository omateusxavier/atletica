<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CandidatosModalidadesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDCANDIDATOMODALIDADE;
    public $IDCANDIDATO;
    public $IDMODALIDADE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("candidatos_modalidades", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from candidatos_modalidades where IDCANDIDATOMODALIDADE = $this->IDCANDIDATOMODALIDADE");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->IDCANDIDATOMODALIDADE = $val->IDCANDIDATOMODALIDADE;
				$this->IDCANDIDATO = $val->IDCANDIDATO;
                $this->IDMODALIDADE = $val->IDMODALIDADE;
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
	
		$sql = "delete from candidatos_modalidades where IDCANDIDATOMODALIDADE = ?";
		
		$query = $this->db->query($sql, array($this->IDCANDIDATOMODALIDADE));
		
		return $query;
	
    }//Fim da função excluir

    function excluir_por_candidato(){
	
		$sql = "delete from candidatos_modalidades where IDCANDIDATO = ?";
		
		$query = $this->db->query($sql, array($this->IDCANDIDATO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    candidatos_modalidades
					
                set
                    IDCANDIDATO = ?,
                    IDMODALIDADE = ?,
                    USUARIOALT = ?,
                    DATAALT = ?
                
                where
                    IDCANDIDATOMODALIDADE = ?";
					
		$query = $this->db->query($sql, array($this->IDCANDIDATO,
                                              $this->IDMODALIDADE,
                                              $this->USUARIOALT,
                                              $this->DATAALT,
                                              $this->IDCANDIDATOMODALIDADE));
											  
		return $query;
		
	}//Fim da função atualizar

    function listar(){

        $sql = "select 
                    a.IMAGEM AS 'FOTOCANDIDATO',
                    a.NOME AS 'NOMECANDIDATO',
                    p.DESCRICAO as 'POSICAO',
                    c.DESCRICAO AS 'CURSO'
                from 
                    candidatos_modalidades cm inner join alunos a on a.IDALUNO = am.IDCANDIDATO 
                                              inner join modalidades m on m.IDMODALIDADE = cm.IDMODALIDADE
                                              left join candidatos_posicoes cp on cp.IDCANDIDATO = cm.IDCANDIDATO
                where
                    a.TIPO = 'C'";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	}//Fim da função listar

    function listar_modalidade_candidato(){

        $sql = "select distinct
                    m.IDMODALIDADE,
                    m.DESCRICAO AS 'MODALIDADE'
                from 
                candidatos_modalidades cm inner join alunos a on a.IDALUNO = cm.IDCANDIDATO 
                                        inner join modalidades m on m.IDMODALIDADE = cm.IDMODALIDADE
                                        left join candidatos_posicoes cp on cp.IDCANDIDATO = cm.IDCANDIDATO
                where
                    a.TIPO = 'C' AND
                    cm.IDCANDIDATO = ?";
			
		$query = $this->db->query($sql, array($this->IDCANDIDATO));
		
		return $query->result();
	  
	}//Fim da função listar

}

?>