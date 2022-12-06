<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AtletasModalidadesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDATLETAMODALIDADE;
    public $IDATLETA;
    public $IDMODALIDADE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("atletas_modalidades", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from atletas_modalidades where IDATLETAMODALIDADE = $this->IDATLETAMODALIDADE");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->IDATLETAMODALIDADE = $val->IDATLETAMODALIDADE;
				$this->IDATLETA = $val->IDATLETA;
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
	
		$sql = "delete from atletas_modalidades where IDATLETAMODALIDADE = ?";
		
		$query = $this->db->query($sql, array($this->IDATLETAMODALIDADE));
		
		return $query;
	
    }//Fim da função excluir

    function excluir_por_atleta(){
	
		$sql = "delete from atletas_modalidades where IDATLETA = ?";
		
		$query = $this->db->query($sql, array($this->IDATLETA));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    atletas_modalidades
					
                set
                    IDATLETA = ?,
                    IDMODALIDADE = ?,
                    USUARIOALT = ?,
                    DATAALT = ?
                
                where
                    IDATLETAMODALIDADE = ?";
					
		$query = $this->db->query($sql, array($this->IDATLETA,
                                              $this->IDMODALIDADE,
                                              $this->USUARIOALT,
                                              $this->DATAALT,
                                              $this->IDATLETAMODALIDADE));
											  
		return $query;
		
	}//Fim da função atualizar

    function listar(){

        $sql2 = "select 
                    ae.*, 
                    a.IMAGEM AS 'FOTOATLETA',
                    a.NOME AS 'NOMEATLETA',
                    e.DESCRICAO as 'NOMEEQUIPE', 
                    a.NOME as 'NOMEATLETA',
                    p.DESCRICAO as 'POSICAO',
                    c.DESCRICAO AS 'CURSO'
                from 
                    atletas_modalidades am inner join alunos a on a.IDALUNO = am.IDATLETA 
                                           inner join modalidades m on m.IDMODALIDADE = am.IDMODALIDADE
                                           left join atletas_posicoes ap on ap.IDATLETA = am.IDATLETA
                where
                    a.TIPO = 'A'";
			
		$query = $this->db->query($sql2, array($this->IDEQUIPE));
		
		return $query->result();
	  
	}//Fim da função listar

    function listar_modalidade_atleta(){

        $sql = "select distinct
                    m.IDMODALIDADE,
                    m.DESCRICAO AS 'MODALIDADE'
                from 
                    atletas_modalidades am inner join alunos a on a.IDALUNO = am.IDATLETA 
                                        inner join modalidades m on m.IDMODALIDADE = am.IDMODALIDADE
                                        left join atletas_posicoes ap on ap.IDATLETA = am.IDATLETA
                where
                    a.TIPO = 'A' AND
                    am.IDATLETA = ?";
			
		$query = $this->db->query($sql, array($this->IDATLETA));
		
		return $query->result();
	  
	}//Fim da função listar

    function verifica_atleta(){
        $sql = "select 
                    ae.IDATLETAEQUIPE, 
                    ae.IDATLETA, 
                    ae.IDEQUIPE, 
                    e.DESCRICAO as 'EQUIPE', 
                    a.NOME as 'ATLETA'
                from 
                    atletas_equipes ae inner join atletas a on a.IDATLETA = ae.IDATLETA inner join equipes e on e.IDEQUIPE = ae.IDEQUIPE
                where
                    ae.IDATLETA = ? and
                    ae.IDEQUIPE = ?";
			
		$query = $this->db->query($sql, array($this->IDATLETA, 
                                              $this->IDEQUIPE));
		
		return $query->result();
    }

}

?>