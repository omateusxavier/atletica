<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MenuSiteModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }
	
	public $idmenu;
	public $idmenupai;
	public $idpaginadinamica;
	public $descricao;
	public $visivel;
	public $link;
	public $target;
	public $contexto;
    public $posicao;
	public $usuariocad;
	public $datacad;
	public $usuarioalt;
	public $dataalt;
	
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){

		$query = $this->db->insert("menusite", $this);
	
		if($query){
			return $this->db->insert_id();
		}
		else{
			return false;
		}
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from menusite where idmenu = $this->idmenu");
		$resultado = $query->result();
		
		//Se houver resultados, carrega resultado da consulta nos campos do Model
		if(count($resultado) > 0){
			foreach($query->list_fields() as $field){
				$this->$field = $resultado[0]->$field;
			}
			return true;
		}
		else{
			return false;	
		}
	
	}//Fim da carregar

    function carregar_site(){
	
		$sql = "select
					menusite.*,
					m.descricao as menusuperior,
                    (select count(ms.idmenu)
                    
                    	from menusite ms
                    
                    	where ms.idmenupai = menusite.idmenu) as menudrop
					
				from
					menusite left join menusite as m on m.idmenu = menusite.idmenupai
                    
                where
                    menusite.contexto = '$this->contexto'
                    
                order by menusite.posicao asc";	

		$query = $this->db->query($sql);
		return $query->result();
	
	}//Fim da função listar
	
	
	function listar(){
	
		$sql = "select
					menusite.*,
					m.descricao as menusuperior
					
				from
					menusite left join menusite as m on m.idmenu = menusite.idmenupai";	

		$query = $this->db->query($sql);
		return $query->result();
	
	}//Fim da função listar
	
	function atualizar(){
	
		$sql = "update
					menusite
					
				SET
					idmenupai = ?,
					idpaginadinamica = ?,
					descricao = ?,
					visivel = ?,
					link = ?,
					target = ?,
					contexto = ?,
                    posicao = ?,
					usuarioalt = ?,
					dataalt = ?
					
				where
					idmenu = ?";			
		
		$query = $this->db->query($sql, array($this->idmenupai,
											  $this->idpaginadinamica,
											  $this->descricao,
											  $this->visivel,
											  $this->link,
											  $this->target,
											  $this->contexto,
                                              $this->posicao,
											  $this->usuarioalt,
											  $this->dataalt,
											  
											  $this->idmenu));
		
		return $query;
	
	}//Fim da função atualizar
	
	function excluir(){
	
		$sql = "delete from menusite where idmenu = ?";
		$query = $this->db->query($sql, array($this->idmenu));
		
		return $query;
	
	}//Fim da função excluir

}

?>