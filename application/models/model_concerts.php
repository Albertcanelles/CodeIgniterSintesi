<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_concerts extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
        

        function getconcert() {      
        $this->db->select('id_concert,Concert,DiaHora,Lloc,Roba');
        $query = $this->db->get('Concert');
        return $query->result_array();
    }
        function getpartitures() {      
        $this->db->select('id_partitura,Nom,Partitura');
        $query = $this->db->get('Partitures');
        return $query->result_array();
    }

          function getvideos() {      
        $this->db->select('link');
        $query = $this->db->get('Videos');
        return $query->result_array();
    }

        function getassajs() {      
        $this->db->select('id_assajs,Assajs,DiaHora,Lloc,ProxActuacio');
        $query = $this->db->get('Assajs');
        return $query->result_array();
    }
        function insertAssajs($asaj, $lloc, $proxact, $data){
        $data = array(
        'Assajs'=> $asaj,
        'DiaHora'=> $data,
        'Lloc'=> $lloc,
        'ProxActuacio'=> $proxact);
        $this->db->insert('Assajs', $data);
        }

        function insertVideo($nom, $link){
        $data = array(
        'Nomvideo'=> $nom,
        'link'=> $link);
            $this->db->insert('Videos', $data);
        }

        function insertConcert($concerts, $lloc, $roba, $data, $lparti){
        $data = array(
        'Concert'=> $concerts,
        'DiaHora'=> $data,
        'Lloc'=> $lloc,
        'Roba'=> $roba,
        'LlistaPartitures' => $lparti);
       		$this->db->insert('Concert', $data);
        }

        function insertPartitures($nom, $file_name) {
         $data = array(
        'Nom'=> $nom,
        'Partitura'=> $file_name);
            $this->db->insert('Partitures', $data);   
        }
}

?>