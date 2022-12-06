<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CandidatosPosicoesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDCANDIDATOPOSICAO;
    public $IDCANDIDATO;
    public $IDPOSICAOMODALIDADE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("candidatos_posicoes", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from candidatos_posicoes where IDCANDIDATOPOSICAO = $this->IDCANDIDATOPOSICAO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        		$this->IDCANDIDATOPOSICAO = $val->IDCANDIDATOPOSICAO;
				$this->IDCANDIDATO = $val->IDCANDIDATO;
        		$this->IDPOSICAOMODALIDADE = $val->IDPOSICAOMODALIDADE;
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
	
		$sql = "delete from candidatos_posicoes where IDCANDIDATOPOSICAO = ?";
		
		$query = $this->db->query($sql, array($this->IDCANDIDATOPOSICAO));
		
		return $query;
	
  	}//Fim da função excluir

	  function excluir_por_candidato(){
	
		$sql = "delete from candidatos_posicoes where IDCANDIDATO = ?";
		
		$query = $this->db->query($sql, array($this->IDCANDIDATO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    candidatos_posicoes
					
                set
                    IDCANDIDATO = ?,
                    IDPOSICAOMODALIDADE = ?,
                    USUARIOALT = ?,
                    DATAALT = ?
                
                where
                    IDCANDIDATOPOSICAO = ?";
					
		$query = $this->db->query($sql, array($this->IDCANDIDATO,
                                              $this->IDPOSICAOMODALIDADE,
                                              $this->USUARIOALT,
                                              $this->DATAALT,
                                              $this->IDCANDIDATOPOSICAO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar_posicao_candidato(){

        $sql = "select distinct
					cp.IDPOSICAOMODALIDADE,
					p.IDPOSICAO,
					p.DESCRICAO AS 'POSICAO',
					m.IDMODALIDADE,
					m.DESCRICAO AS 'MODALIDADE'
				from 
                    candidatos_posicoes cp inner join alunos a on a.IDALUNO = cp.IDCANDIDATO 
                                           inner join posicoes_modalidades pm on pm.IDPOSICAOMODALIDADE = cp.IDPOSICAOMODALIDADE
										   inner join posicoes p on p.IDPOSICAO = pm.IDPOSICAO
										   inner join modalidades m on m.IDMODALIDADE = pm.IDMODALIDADE
										
										
				where
					a.TIPO = 'C' AND
					cp.IDCANDIDATO = ?";
			
		$query = $this->db->query($sql, array($this->IDCANDIDATO));
		
		return $query->result();
	  
	}//Fim da função listar_posicao_candidato

}

?>