<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ArtigosModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $id;
	public $filial;
    public $titulo;
    public $descricao;
    public $criadopor;
    public $criadoem;
    public $modificadopor;
    public $modificadoem;
    public $status;
	public $tags;
	public $url_amigavel;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("artigos", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from artigos where id = $this->id");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->id = $val->id;
				$this->filial = $val->filial;
                $this->titulo = $val->titulo;
				$this->autores = $val->autores;
				$this->capa = $val->capa;
                $this->descricao = $val->descricao;
				$this->criadopor = $val->criadopor;
				$this->criadoem = $val->criadoem;
				$this->modificadopor = $val->modificadopor;
				$this->modificadoem = $val->modificadoem;
				$this->status = $val->status;
				$this->tags = $val->tags;
				$this->url_amigavel = $val->url_amigavel;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
	}//Fim da carregar
	
	function carregar_url(){
	
		$query = $this->db->query("select * from artigos where url_amigavel = '$this->url_amigavel'");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->id = $val->id;
				$this->filial = $val->filial;
                $this->titulo = $val->titulo;
				$this->autores = $val->autores;
				$this->capa = $val->capa;
                $this->descricao = $val->descricao;
				$this->criadopor = $val->criadopor;
				$this->criadoem = $val->criadoem;
				$this->modificadopor = $val->modificadopor;
				$this->modificadoem = $val->modificadoem;
				$this->status = $val->status;
				$this->tags = $val->tags;
				$this->url_amigavel = $val->url_amigavel;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
    }//Fim da carregar
	
	function carregar_site(){

        date_default_timezone_set('America/Sao_Paulo');
        
        $hoje = date('Y-m-d');
	
		$query = $this->db->query("select * from artigos where status = 'P' ORDER BY id DESC");
		
		return $query->result();
	
	}//Fim da carregar site
	
	function carregar_mais_lidos(){

        date_default_timezone_set('America/Sao_Paulo');
        
        $hoje = date('Y-m-d');
	
		$query = $this->db->query("select artigos.*, count(cliques_log.id) as totalcliques
		
									from artigos
										inner join cliques_log on cliques_log.idcount = artigos.id and cliques_log.tabela = 'artigos'
									
									where artigos.status = 'P'
									
									ORDER BY cliques DESC LIMIT 5");
		
		return $query->result();
	
    }//Fim da carregar site
	
	function listar_artigos(){
		
		$query = $this->db->query("select * from artigos");
		
		return $query->result();
	
    }//Fim da função listar artigos
	
	function atualizar(){
	
		$sql = "update
					artigos
					
				set
					titulo = ?,
					autores = ?,
					capa = ?,
					descricao = ?,
					modificadopor = ?,
					modificadoem = ?,
					status = ?,
					tags = ?,
					url_amigavel = ?
					
				where	
					id = ?";
		
		$query = $this->db->query($sql, array($this->titulo,
											  $this->autores,
											  $this->capa,
											  $this->descricao,
											  $this->modificadopor,
											  $this->modificadoem,
											  $this->status,
											  $this->tags,
											  $this->url_amigavel,
											  $this->id));
		
		return $query;
	
    }//Fim da função atualizar
	
	function excluir(){
	
		$sql = "delete from artigos where id = ?";
		
		$query = $this->db->query($sql, array($this->id));
		
		return $query;
	
    }//Fim da função excluir

}

?>