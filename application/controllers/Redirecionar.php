<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redirecionar extends CI_Controller{

    public $configsite;

	function __construct(){
		parent::__construct();
		
		//Carrega biblioteca de SESSION do Codegniter
		$this->load->library('session');
		
        date_default_timezone_set('America/Sao_Paulo');
        
        //Carrega Configurações Básicas do Site
		$this->load->model("GconfigSiteModel");
        $this->configsite = $this->GconfigSiteModel;
        $this->configsite->carregar();
		
	}

	function sif(){
		
        redirect('http://portal.fundacaojau.edu.br:8077/sif2');
	
    }//Fim da função index

    function servicosportal(){
		
        redirect('http://portal.fundacaojau.edu.br:8077/sif2/ServicosPortal/');
	
    }//Fim da função index
    
    function portal(){

        redirect('http://portal.fundacaojau.edu.br:8077/sif2/aluno');
	
    }//Fim da função index
    
    function professor(){

        redirect('http://portal.fundacaojau.edu.br:8077/sif2/professor');
	
    }//Fim da função index
    
    function portaldoaluno(){

        redirect('http://portal.fundacaojau.edu.br:8077/sif2/aluno');
	
    }//Fim da função index
    
    function portaldoprofessor(){

        redirect('http://portal.fundacaojau.edu.br:8077/sif2/professor');
	
	}//Fim da função index

    function portaldocolaborador(){

        redirect('http://portal.fundacaojau.edu.br:8077/sif2/PortalColaborador/meurh');
	
	}

    function ead(){

        redirect('https://portal.fundacaojau.edu.br:4433/ead/login');
	
	}

    function matriculapos(){

        redirect('http://portal.fundacaojau.edu.br:8178/web/app/Edu/PortalProcessoSeletivo?c=1&f=1&ps=226#/es/informacoes');
    }

    function matriculacolegio2022(){

        redirect('https://portal.fundacaojau.edu.br:4433/sif2/Campanha/matriculas_colegio_2022');
    }

    function bolsastecnico(){

        redirect('http://portal.fundacaojau.edu.br:8177/frameHTML/web/app/Edu/PortalProcessoSeletivo/?c=1&f=3&ps=251#/es/informacoes');
    }

    /*
    function login(){

        if(fsockopen('201.33.248.225', 8077, $errno, $errstr, 30)){
            redirect('http://201.33.248.225:8077/login');
        } else {
            redirect('http://179.174.61.140:8077/login');
        }
    }
    */
	
}

?>