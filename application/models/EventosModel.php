<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EventosModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $id;
	  public $filial;
    public $evento;
    public $descricao;
    public $datainicio;
    public $datafinal;
    public $horarioexibir;
    public $link;
    public $target;
    public $local;
    public $criadopor;
    public $criadoem;
    public $modificadopor;
    public $modificadoem;
    public $status;
	  public $tags;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("eventos", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir

  
	function carregar(){
    
		$query = $this->db->query("select * from eventos where id = $this->id");
    
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        $this->id = $val->id;
				$this->filial = $val->filial;
        $this->evento = $val->evento;
        $this->descricao = $val->descricao;
				$this->datainicio = $val->datainicio;
				$this->datafinal = $val->datafinal;
				$this->horarioexibir = $val->horarioexibir;
				$this->link = $val->link;
				$this->target = $val->target;
				$this->local = $val->local;
				$this->criadopor = $val->criadopor;
				$this->criadoem = $val->criadoem;
				$this->modificadopor = $val->modificadopor;
				$this->modificadoem = $val->modificadoem;
				$this->status = $val->status;
				$this->tags = $val->tags;
				
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
	
		$query = $this->db->query("select * from eventos 
										where status = 'P' and
										datafinal >= '$hoje' and
										filial = ? 
									ORDER BY datainicio ASC LIMIT 5", array($this->filial));
		
		return $query->result();
	
    }//Fim da carregar site
	
	function listar_eventos(){
		
		$query = $this->db->query("select * from eventos ORDER BY datafinal desc");
		
		return $query->result();
	
    }//Fim da função listar eventos
	
	function atualizar(){
	
		$sql = "update
					eventos
					
				set
					evento = ?,
					descricao = ?,
					datainicio = ?,
					datafinal = ?,
					horarioexibir = ?,
					link = ?,
					target = ?,
					local = ?,
					modificadopor = ?,
					modificadoem = ?,
					status = ?,
					tags = ?,
					filial = ?
					
				where	
					id = ?";
		
		$query = $this->db->query($sql, array($this->evento,
											  $this->descricao,
											  $this->datainicio,
											  $this->datafinal,
											  $this->horarioexibir,
											  $this->link,
											  $this->target,
											  $this->local,
											  $this->modificadopor,
											  $this->modificadoem,
											  $this->status,
											  $this->tags,
											  $this->filial,
											  $this->id));
		
		return $query;
	
    }//Fim da função atualizar
	
	function excluir(){
	
		$sql = "delete from eventos where id = ?";
		
		$query = $this->db->query($sql, array($this->id));
		
		return $query;
	
    }//Fim da função excluir

    //função todos eventos relacioandos filial adicionado
    function todos_eventos_filial(){
	
      $query = $this->db->query("select eventos.*, gusuarios.nome as criadopor
                                      from eventos
                                          left join gusuarios on gusuarios.login = eventos.criadopor
                                           
                  where eventos.status = 'P' and
                      eventos.filial = $this->filial
                                      ORDER BY eventos.datafinal DESC
                                      ");
      return $query->result();
    }
  
}

?>