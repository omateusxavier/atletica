<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class IconesModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $id;
	  public $filial;
    public $titulo;
	  public $arquivo;
    public $link;
    public $target;
    public $img;
    public $criadopor;
    public $criadoem;
    public $modificadopor;
    public $modificadoem;
    public $status;
    public $url_amigavel;
	  public $posicao;
	  public $icone;
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("icones", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from icones where id = $this->id");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->id = $val->id;
				$this->filial = $val->filial;
                $this->titulo = $val->titulo;
				$this->arquivo = $val->arquivo;
                $this->img = $val->img;
                $this->target = $val->target;
                $this->link = $val->link;
				$this->criadopor = $val->criadopor;
				$this->criadoem = $val->criadoem;
				$this->modificadopor = $val->modificadopor;
				$this->modificadoem = $val->modificadoem;
				$this->status = $val->status;
                $this->url_amigavel = $val->url_amigavel;
				$this->posicao = $val->posicao;
				$this->icone = $val->icone;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
    }//Fim da carregar
    
    function carregar_site(){
	
        $query = $this->db->query("select icones.*
										from icones
											
                                        where status = 'P' and
											  filial = ?
                                        order by posicao asc", array($this->filial));
		
		if($query->result()){
	
            return $query->result();
            
        } else{

			
		}
	
    }//Fim da carregar site
    
    function visualizar_icones(){
	
        $query = $this->db->query("select icones.*, gusuarios.nome as criadopor 
                                        from icones
                                            left join gusuarios on gusuarios.login = icones.criadopor
                                        
                                        ");
		
		if($query->result()){
	
            return $query->result();
            
        } else{

			
		}
	
    }//Fim da carregar site
	
	function excluir(){
	
		$sql = "delete from icones where id = ?";
		
		$query = $this->db->query($sql, array($this->id));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
	
		$sql = "update
					icones
					
				set
					filial = ?,
					titulo = ?,
					arquivo = ?,
					link = ?,
					target = ?,
					img = ?,
					criadopor = ?,
					criadoem = ?,
					modificadopor = ?,
					modificadoem = ?,
					posicao = ?,
					status = ?,
					url_amigavel = ?,
					icone = ?
					
				where
					id = ?";
		
		$query = $this->db->query($sql, array($this->filial,
											  $this->titulo,
											  $this->arquivo,
											  $this->link,
											  $this->target,
											  $this->img,
											  $this->criadopor,
											  $this->criadoem,
											  $this->modificadopor,
											  $this->modificadoem,
											  $this->posicao,
											  $this->status,
											  $this->url_amigavel,
											  $this->icone,
											  $this->id));
		
		return $query;
	
	}//Fim da função atualizar

	function atualizar_arquivo(){
	
		$sql = "update
					icones
					
				set
					arquivo = ?,
					modificadopor = ?,
					modificadoem = ?
					
				where
					id = ?";
		
		$query = $this->db->query($sql, array(
											  $this->arquivo,
											  $this->modificadopor,
											  $this->modificadoem,
											  $this->id));
		
		return $query;
	
	}//Fim da função atualizar

	function atualizar_posicao(){
	
		$sql = "update
					icones
					
				set
					posicao = ?
					
				where
					id = ?";
		
		$query = $this->db->query($sql, array(
											  $this->posicao,
											  $this->id));
		
		return $query;
	
	}//Fim da função atualizar
	
	function atualizar_titulo(){
	
		$sql = "update
					icones
					
				set
					
					url_amigavel = ?
					
				where
					id = ?";
		
		$query = $this->db->query($sql, array(
											  $this->url_amigavel,
											  $this->id));
		
		return $query;
	
    }//Fim da função atualizar

}

?>