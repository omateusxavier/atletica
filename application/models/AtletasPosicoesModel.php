<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AtletasPosicoesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDATLETAPOSICAO;
    public $IDATLETA;
    public $IDPOSICAOMODALIDADE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("atletas_posicoes", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from atletas_posicoes where IDATLETAPOSICAO = $this->IDATLETAPOSICAO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        		$this->IDATLETAPOSICAO = $val->IDATLETAPOSICAO;
				$this->IDATLETA = $val->IDATLETA;
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
	
		$sql = "delete from atletas_posicoes where IDATLETAPOSICAO = ?";
		
		$query = $this->db->query($sql, array($this->IDATLETAPOSICAO));
		
		return $query;
	
  	}//Fim da função excluir

	  function excluir_por_atleta(){
	
		$sql = "delete from atletas_posicoes where IDATLETA = ?";
		
		$query = $this->db->query($sql, array($this->IDATLETA));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
              atletas_posicoes
					
            set
              IDATLETA = ?,
              IDPOSICAOMODALIDADE = ?,
              USUARIOALT = ?,
              DATAALT = ?
              
            where
              IDATLETAPOSICAO = ?";
					
		$query = $this->db->query($sql, array($this->IDATLETA,
                                          $this->IDPOSICAOMODALIDADE,
                                          $this->USUARIOALT,
                                          $this->DATAALT,
                                          $this->IDATLETAPOSICAO));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar_posicao_atleta(){

        $sql = "select distinct
					ap.IDPOSICAOMODALIDADE,
					p.IDPOSICAO,
					p.DESCRICAO AS 'POSICAO',
					m.IDMODALIDADE,
					m.DESCRICAO AS 'MODALIDADE'
				from 
					atletas_posicoes ap inner join alunos a on a.IDALUNO = ap.IDATLETA 
										inner join posicoes_modalidades pm on pm.IDPOSICAOMODALIDADE = ap.IDPOSICAOMODALIDADE
										inner join posicoes p on p.IDPOSICAO = pm.IDPOSICAO
										inner join modalidades m on m.IDMODALIDADE = pm.IDMODALIDADE
										
										
				where
					a.TIPO = 'A' AND
					ap.IDATLETA = ?
				order by
					m.IDMODALIDADE";
			
		$query = $this->db->query($sql, array($this->IDATLETA));
		
		return $query->result();
	  
	}//Fim da função listar_posicao_atleta

}

?>