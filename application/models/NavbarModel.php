<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class NavbarModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $id;
    public $idsetor;
    public $idmenudrop;
    public $dropdown;
    public $filial;
    public $menu;
    public $link;
    public $target;
    public $posicao;
    public $tipo;
    public $criadopor;
    public $criadoem;
    public $modificadopor;
    public $modificadoem;
    public $status;
    public $subdrop;
    public $idsubdrop;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("navbar", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select navbar.*, gfilial.nome_fantasia from navbar inner join gfilial on gfilial.id_filial = navbar.filial where id = $this->id");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->id = $val->id;
                $this->nome_fantasia = $val->nome_fantasia;
                $this->idmenudrop = $val->idmenudrop;
                $this->idsetor = $val->idsetor;
                $this->dropdown = $val->dropdown;
                $this->filial = $val->filial;
                $this->menu = $val->menu;
                $this->link = $val->link;
                $this->target = $val->target;
                $this->posicao = $val->posicao;
                $this->tipo = $val->tipo;
                $this->criadopor = $val->criadopor;
                $this->criadoem = $val->criadoem;
				        $this->modificadopor = $val->modificadopor;
				        $this->modificadoem = $val->modificadoem;
                $this->status = $val->status;
                $this->subdrop = $val->subdrop;
                $this->idsubdrop = $val->idsubdrop;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
    }//Fim da carregar
	
	function listar_navbar(){
		
        $query = $this->db->query("select navbar.*, gfilial.nome_fantasia as nomefilial, setores.setor as nomesetor
                                    
                                    from navbar
                                        inner join gfilial on gfilial.id_filial = navbar.filial
                                        inner join setores on setores.id = navbar.idsetor
                                    where (navbar.idmenudrop is null or navbar.idmenudrop = 0)
                                        
                                        ");
		
		return $query->result();
	
    }//Fim da função listar setores

    function listar_navbar_site(){
		
        $query = $this->db->query("select navbar.*, gfilial.nome_fantasia as nomefilial, setores.setor as nomesetor
                                    
                                    from navbar
                                        inner join gfilial on gfilial.id_filial = navbar.filial
                                        inner join setores on setores.id = navbar.idsetor
                                    where (navbar.idmenudrop is null or navbar.idmenudrop = 0) and navbar.filial = ? and navbar.status = 'P'

                                    order by navbar.posicao asc
                                        
                                        ", array($this->filial));
		
		return $query->result();
	
    }//Fim da função listar setores

    function listar_navbar_dropdown(){
		
        $query = $this->db->query("select navbar.*, gfilial.nome_fantasia as nomefilial, setores.setor as nomesetor
                                    
                                    from navbar
                                        inner join gfilial on gfilial.id_filial = navbar.filial
                                        inner join setores on setores.id = navbar.idsetor
                                        

                                    where navbar.idmenudrop is not null and
                                          navbar.idsubdrop is null and
                                          navbar.filial = ? and
                                          navbar.idmenudrop != 0 and navbar.status = 'P'

                                    order by navbar.posicao asc
                                        ", array($this->filial));
		
		return $query->result();
	
    }//Fim da função listar setores

    function listar_navbar_dropdown_sub(){
		
        $query = $this->db->query("select navbar.*, gfilial.nome_fantasia as nomefilial, setores.setor as nomesetor
                                    
                                    from navbar
                                        inner join gfilial on gfilial.id_filial = navbar.filial
                                        inner join setores on setores.id = navbar.idsetor
                                        

                                    where navbar.idsubdrop is not null and navbar.filial = ? and navbar.status = 'P'

                                    order by navbar.posicao asc
                                        ", array($this->filial));
		
		return $query->result();
	
    }//Fim da função listar setores
    
    	
	function excluir(){
	
		$sql = "delete from navbar where id = ?";
		
		$query = $this->db->query($sql, array($this->id));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
					navbar
					
				set
                    dropdown = ?,
                    idmenudrop = ?,
                    idsetor = ?,
                    link = ?,
                    target = ?,
                    menu = ?,
                    filial = ?,
                    posicao = ?,
                    tipo = ?,
					modificadopor = ?,
					modificadoem = ?,
                    status = ?,
                    subdrop = ?,
                    idsubdrop = ?
					
				where
					id = ?";
					
		$query = $this->db->query($sql, array($this->dropdown,
											  $this->idmenudrop,
											  $this->idsetor,
                                              $this->link,
                                              $this->target,
                                              $this->menu,
                                              $this->filial,
                                              $this->posicao,
                                              $this->tipo,
                                              $this->modificadopor,
                                              $this->modificadoem,
                                              $this->status,
                                              $this->subdrop,
                                              $this->idsubdrop,
											  $this->id));
											  
		return $query;
		
	}//Fim da função atualizar

    function atualizar_link(){
		
		$sql = "update
					navbar
					
				set
                    
                    link = ?
                    
					
				where
					id = ?";
					
		$query = $this->db->query($sql, array($this->link,
                                              $this->id));
											  
		return $query;
		
	}//Fim da função atualizar

}

?>