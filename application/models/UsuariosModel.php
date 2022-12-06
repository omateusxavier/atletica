<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsuariosModel extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    public $IDUSUARIO;
    public $NOME;
    public $LOGIN;
    public $SENHA;
    public $IDPERFIL;
    public $USUARIOCAD;
    public $DATACAD;
    public $USUARIOALT;
    public $DATAALT;
	
	/*  -------------------  Métodos de Banco  -------------------  */
	
	function inserir(){
		
		$query = $this->db->insert("usuarios", $this);
	
		return $this->db->insert_id();
	
	}//Fim da função inserir
	
	function carregar(){
	
		$query = $this->db->query("select * from usuarios where IDUSUARIO = $this->IDUSUARIO");
		
		if($query->result()){
	
			foreach($query->result() as $val){
				
        $this->IDUSUARIO = $val->IDUSUARIO;
				$this->NOME = $val->NOME;
        $this->LOGIN = $val->LOGIN;
        $this->SENHA = $val->SENHA;
				$this->IDPERFIL = $val->IDPERFIL;
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

    function login(){
	
      $sql = "select 
            usuarios.*,
            
            perfis.DESCRICAO
            
          from 
            usuarios inner join perfis on perfis.IDPERFIL = usuarios.IDPERFIL
            
          where 
            usuarios.LOGIN = ? and 
            usuarios.SENHA = ?";
          
      $query = $this->db->query($sql, array($this->LOGIN, $this->SENHA));
      
      return $query->result();
    
    }//Fim da função login
	
	function excluir(){
	
		$sql = "delete from usuarios where IDUSUARIO = ?";
		
		$query = $this->db->query($sql, array($this->IDUSUARIO));
		
		return $query;
	
    }//Fim da função excluir
	
	function atualizar(){
		
		$sql = "update
					    usuarios
					
            set
              NOME = ?,
              LOGIN = ?,
              SENHA = ?,
              USUARIOALT = ?,
              DATAALT = ?
              
            where
              IDUSUARIO = ?";
					
		$query = $this->db->query($sql, array($this->NOME,
                                          $this->LOGIN,
                                          $this->SENHA,
                                          $this->USUARIOALT,
                                          $this->DATAALT,
                                          $this->IDUSUARIO));
											  
		return $query;
		
	}//Fim da função atualizar

}

?>