<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GconfigSiteModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $id_config;
    public $site_titulo;
    public $site_meta_keywords;
    public $site_logo;
    public $admin_logo;
    public $contato_site;
    public $email_contato;
    public $email_remetente;
    public $slide_tempo;
    public $usuario_cad;
    public $data_cad;
    public $usuario_alt;
    public $data_alt;
	
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("gconfig_site", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from gconfig_site");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
                $this->id_config = $val->id_config;
				$this->site_titulo = $val->site_titulo;
				$this->site_meta_keywords = $val->site_meta_keywords;
				$this->site_logo = $val->site_logo;
				$this->admin_logo = $val->admin_logo;
				$this->contato_site = $val->contato_site;
				$this->email_contato = $val->email_contato;
				$this->email_remetente = $val->email_remetente;
				$this->slide_tempo = $val->slide_tempo;
				$this->usuario_cad = $val->usuario_cad;
				$this->data_cad = $val->data_cad;
                $this->usuario_alt = $val->usuario_alt;
                $this->data_alt = $val->data_alt;
				
			}
			return true;
		}
		else{
			return false;	
		}
	
	}//Fim da carregar

	function atualizar(){
	
		$sql = "update 
					gconfig_site 
					
                set 
					site_titulo = ?, 
					site_meta_keywords = ?, 
					site_logo = ?, 
					admin_logo = ?, 
					contato_site = ?, 
					email_contato = ?, 
					email_remetente = ?, 
					slide_tempo = ?, 
					usuario_alt = ?, 
                    data_alt = ?";
		
		$query = $this->db->query($sql, array($this->site_titulo, 
											  $this->site_meta_keywords, 
											  $this->site_logo, 
											  $this->admin_logo, 
											  $this->contato_site, 
											  $this->email_contato, 
											  $this->email_remetente,
											  $this->slide_tempo,
											  $this->usuario_alt, 
                                              $this->data_alt));
		
		return $query;
	
	}//Fim da função atualizar

}

?>