<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ConfigSiteModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDCONFIG;
    public $TITULOSITE;
    public $SITE_META_KEYWORDS;
    public $LOGO_SITE;
    public $ADMIN_LOGO;
    public $CONTATO_SITE;
    public $EMAIL_CONTATO;
    public $EMAIL_REMETENTE;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("config_site", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from config_site");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        $this->IDCONFIG = $val->IDCONFIG;
				$this->TITULOSITE = $val->TITULOSITE;
				$this->SITE_META_KEYWORDS = $val->SITE_META_KEYWORDS;
				$this->LOGO_SITE = $val->LOGO_SITE;
				$this->ADMIN_LOGO = $val->ADMIN_LOGO;
				$this->CONTATO_SITE = $val->CONTATO_SITE;
				$this->EMAIL_CONTATO = $val->EMAIL_CONTATO;
				$this->EMAIL_REMETENTE = $val->EMAIL_REMETENTE;
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