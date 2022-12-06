<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PosicoesModalidadesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDPOSICAOMODALIDADE;
    public $IDPOSICAO;
    public $IDMODALIDADE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("posicoes_modalidades", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from posicoes_modalidades where IDPOSICAOMODALIDADE = $this->IDPOSICAOMODALIDADE");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
				$this->IDPOSICAOMODALIDADE = $val->IDPOSICAOMODALIDADE;
				$this->IDPOSICAO = $val->IDPOSICAO;
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
	
		$sql = "delete from posicoes_modalidades where IDPOSICAOMODALIDADE = ?";
		
		$query = $this->db->query($sql, array($this->IDPOSICAOMODALIDADE));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    posicoes_modalidades
					
				set
					IDPOSICAO = ?,
                    IDMODALIDADE = ?,
					USUARIOALT = ?,
					DATAALT = ?
				
				where
					IDPOSICAOMODALIDADE = ?";
					
		$query = $this->db->query($sql, array($this->IDPOSICAO,
                                              $this->IDMODALIDADE,
											  $this->USUARIOALT,
											  $this->DATAALT,
											  $this->IDPOSICAOMODALIDADE));
											  
		return $query;
		
	}//Fim da função atualizar

	function listar(){
	
		$sql = "select 
                    pm.IDPOSICAOMODALIDADE, 
                    pm.IDPOSICAO, 
                    pm.IDMODALIDADE, 
                    p.DESCRICAO as 'POSICAO', 
                    m.DESCRICAO as 'MODALIDADE'
                from 
                    posicoes_modalidades pm inner join posicoes p on p.IDPOSICAO = pm.IDPOSICAO
                                        inner join modalidades m on m.IDMODALIDADE = pm.IDMODALIDADE";
			
		$query = $this->db->query($sql);
		
		return $query->result();
	  
	  }//Fim da função listar

      function listar_unico(){
	
		$sql = "select 
                    pm.IDPOSICAOMODALIDADE, 
                    pm.IDPOSICAO, 
                    pm.IDMODALIDADE, 
                    p.DESCRICAO as 'POSICAO', 
                    m.DESCRICAO as 'MODALIDADE'
                from 
                    posicoes_modalidades pm inner join posicoes p on p.IDPOSICAO = pm.IDPOSICAO
                                        inner join modalidades m on m.IDMODALIDADE = pm.IDMODALIDADE
                where
                    pm.IDPOSICAO = ?";
			
		$query = $this->db->query($sql, array($this->IDPOSICAO));
		
		return $query->result();
	  
	  }//Fim da função listar

	  function listar_idposicaomodalidade(){
	
		$sql = "select 
                    pm.IDPOSICAOMODALIDADE, 
                    pm.IDPOSICAO, 
                    pm.IDMODALIDADE, 
                    p.DESCRICAO as 'POSICAO', 
                    m.DESCRICAO as 'MODALIDADE'
                from 
                    posicoes_modalidades pm inner join posicoes p on p.IDPOSICAO = pm.IDPOSICAO
                                        inner join modalidades m on m.IDMODALIDADE = pm.IDMODALIDADE
                where
                    pm.IDPOSICAO = ? AND
					pm.IDMODALIDADE = ?";
			
		$query = $this->db->query($sql, array($this->IDPOSICAO,
											  $this->IDMODALIDADE));
		
		return $query->result();
	  
	  }//Fim da função listar

}

?>