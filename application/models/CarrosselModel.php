<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CarrosselModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $id;
	public $filial;
    public $img;
    public $titulo;
    public $descricao;
    public $modelo;
    public $posicao;
    public $link;
    public $target;
    public $criadopor;
    public $criadoem;
    public $modificadopor;
    public $modificadoem;
	public $status;
	public $btn;
	public $box;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("carrossel", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from carrossel where id = $this->id");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->id = $val->id;
				$this->filial = $val->filial;
                $this->img = $val->img;
				$this->titulo = $val->titulo;
				$this->descricao = $val->descricao;
				$this->modelo = $val->modelo;
				$this->posicao = $val->posicao;
				$this->link = $val->link;
				$this->target = $val->target;
				$this->criadopor = $val->criadopor;
                $this->criadoem = $val->criadoem;
				$this->modificadopor = $val->modificadopor;
				$this->modificadoem = $val->modificadoem;
				$this->status = $val->status;
				$this->btn = $val->btn;
				$this->box = $val->box;
			}
			return true;
		}
		else{
			return false;	
		}
	
    }//Fim da carregar
    
    function carregar_site(){
	
        $query = $this->db->query("select carrossel.*, gfilial.nome_fantasia as nome_filial 

                                        from carrossel

                                        inner join gfilial on gfilial.id_filial = carrossel.filial

                                        where carrossel.status = 'P' and carrossel.filial = ?
                                        order by carrossel.posicao asc", array($this->filial));
		
		return $query->result();
	
			
	}//Fim da carregar site
	
	function excluir(){
	
		$sql = "delete from carrossel where id = ?";
		
		$query = $this->db->query($sql, array($this->id));
		
		return $query;
	
    }//Fim da função excluir
	
	function listar_slides(){
		
		$query = $this->db->query("select * from carrossel");
		
		return $query->result();
	
    }//Fim da função listar slides
	
	function atualizar(){
	
		$sql = "update
					carrossel
					
				set
					img = ?,
					titulo = ?,
					descricao = ?,
					modelo = ?,
					posicao = ?,
					link = ?,
					target = ?,
					modificadopor = ?,
					modificadoem = ?,
					status = ?,
					btn = ?,
					box = ?
					
				where
					id = ?";
		
		$query = $this->db->query($sql, array($this->img,
											  $this->titulo,
											  $this->descricao,
											  $this->modelo,
											  $this->posicao,
											  $this->link,
											  $this->target,
											  $this->modificadopor,
											  $this->modificadoem,
											  $this->status,
											  $this->btn,
											  $this->box,
											  $this->id));
		
		return $query;
	
    }//Fim da função atualizar

}

?>