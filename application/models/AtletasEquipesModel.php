<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AtletasEquipesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDATLETAEQUIPE;
    public $IDATLETA;
    public $IDEQUIPE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("atletas_equipes", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from atletas_equipes where IDATLETAEQUIPE = $this->IDATLETAEQUIPE");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->IDATLETAEQUIPE = $val->IDATLETAEQUIPE;
				$this->IDATLETA = $val->IDATLETA;
                $this->IDEQUIPE = $val->IDEQUIPE;
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
	
		$sql = "delete from atletas_equipes where IDATLETAEQUIPE = ?";
		
		$query = $this->db->query($sql, array($this->IDATLETAPOSICAO));
		
		return $query;
	
  }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
                    atletas_equipes
					
                set
                    IDATLETA = ?,
                    IDEQUIPE = ?,
                    USUARIOALT = ?,
                    DATAALT = ?
                
                where
                    IDATLETAEQUIPE = ?";
					
		$query = $this->db->query($sql, array($this->IDATLETA,
                                              $this->IDEQUIPE,
                                              $this->USUARIOALT,
                                              $this->DATAALT,
                                              $this->IDATLETAEQUIPE));
											  
		return $query;
		
	}//Fim da função atualizar

    function listar(){
	
		$sql = "select 
                    ae.IDATLETAEQUIPE, 
                    ae.IDATLETA, 
                    ae.IDEQUIPE, 
                    e.DESCRICAO as 'EQUIPE', 
                    a.NOME as 'ATLETA'
                from 
                    atletas_equipes ae inner join alunos a on a.IDALUNO = ae.IDATLETA
                                           inner join equipes e on e.IDEQUIPE = ae.IDEQUIPE";

        $sql2 = "select 
                    ae.*, 
                    a.IMAGEM AS 'FOTOATLETA',
                    a.NOME AS 'NOMEATLETA',
                    e.DESCRICAO as 'NOMEEQUIPE', 
                    a.NOME as 'NOMEATLETA',
                    p.DESCRICAO as 'POSICAO',
                    c.DESCRICAO AS 'CURSO'
                from 
                    atletas_equipes ae inner join alunos a on a.IDALUNO = ae.IDATLETA 
                                       inner join equipes e on e.IDEQUIPE = ae.IDEQUIPE
                                       left join atletas_posicoes ap on ap.IDATLETA = ae.IDATLETA
                                       left join posicoes_modalidades pm on pm.IDPOSICAOMODALIDADE = ap.IDPOSICAOMODALIDADE
                                       left join posicoes p on p.IDPOSICAO = pm.IDPOSICAO
                                       inner join cursos c on c.IDCURSO = a.IDCURSO
                                       inner join modalidades_generos mg on mg.IDMODALIDADEGENERO = e.IDMODALIDADEGENERO and mg.IDMODALIDADE = pm.IDMODALIDADE 
                where
                    ae.IDEQUIPE = ? AND
                    a.TIPO = 'A'

                order by
                    ae.IDATLETA";
			
		$query = $this->db->query($sql2, array($this->IDEQUIPE));
		
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

    function listar_por_atleta(){
        $sql = "select 
                ae.IDATLETAEQUIPE, 
                ae.IDATLETA, 
                ae.IDEQUIPE, 
                e.DESCRICAO as 'EQUIPE', 
                a.NOME as 'ATLETA',
                m.DESCRICAO as 'MODALIDADE',
                g.DESCRICAO as 'GENERO'

            from 
                atletas_equipes ae inner join atletas a on a.IDATLETA = ae.IDATLETA 
                inner join equipes e on e.IDEQUIPE = ae.IDEQUIPE
                inner join modalidades_generos mg on mg.IDMODALIDADEGENERO = e.IDMODALIDADEGENERO
                inner join modalidades m on m.IDMODALIDADE = mg.IDMODALIDADE
                inner join genero g on g.IDGENERO = mg.IDGENERO
            where
                ae.IDATLETA = ?
            order by
                ae.IDEQUIPE";

        $query = $this->db->query($sql, array($this->IDATLETA));

        return $query->result();
    }

}

?>