<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_concerts extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
        // Tots els gets que consulten les dades a la base dades 

        function getconcert() {      
        $this->db->select('id_concert,Concert,DiaHora,Lloc,Roba,Passcalles');
        $query = $this->db->get('Concert');
        return $query->result_array();
    }
        function getpartitures() {      
        $this->db->select('id_partitura,Nom,Partitura');
        $query = $this->db->get('Partitures');
        return $query->result_array();
    }

          function getvideos() {      
        $this->db->select('id_video, Nomvideo, link');
        $query = $this->db->get('Videos');
        return $query->result_array();
    }

        function getassajs() {      
        $this->db->select('id_assajs,Assajs,DiaHora,Lloc,ProxActuacio');
        $query = $this->db->get('Assajs');
        return $query->result_array();
    }

        function getUser() {
            $this->db->select('id_membre,usuari,rol');
            $query = $this->db->get('Membres');
            return $query->result_array();
        }

        // Tots els inserts que inserten dades

         function insertConcert($concerts, $lloc, $roba, $fecha, $passacalles){
        $data = array(
        'Concert'=> $concerts,
        'DiaHora'=> $fecha,
        'Lloc'=> $lloc,
        'Roba'=> $roba,
        'Passcalles' => $passacalles);
            $this->db->insert('Concert', $data);
        }

        function insertAssajs($asaj, $lloc, $proxact, $fecha){
        $data = array(
        'Assajs'=> $asaj,
        'DiaHora'=> $fecha,
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
		
		function insertUsuari($usuari, $contrasenya, $rol){
        $data = array(
        'usuari'=> $usuari,
        'contraseña'=> md5($contrasenya),
        'rol'=> $rol);
            $this->db->insert('Membres', $data);
        }
        

        function insertPartitures($nom, $file_name) {
         $data = array(
        'Nom'=> $nom,
        'Partitura'=> $file_name);
            $this->db->insert('Partitures', $data);   
        }

        // Tots els delete per eliminar les dades

         function eliminarConcert($id)  {
            $this->db->delete('Concert', array('id_concert' => $id)); 
        }
         function eliminarAssajs($id)  {
            $this->db->delete('Assajs', array('id_assajs' => $id)); 
        }

         function eliminarVideo($id)  {
            $this->db->delete('Videos', array('id_video' => $id)); 
        }
        function eliminarPartitura($id)  {
            $this->db->delete('Partitures', array('id_partitura' => $id)); 
        }
        function eliminarMembre($id)  {
            $this->db->delete('Membres', array('id_membre' => $id)); 
        }

        // Tots els update

         function modificarMembres($id, $contra)
    {

        $data = array('contraseña' => md5($contra));
        $this->db->where('id_membre',$id);
        $this->db->update('Membres', $data);
    }
    function modificarConcert($id, $concerts, $lloc, $roba, $fecha, $passacalles){
        $data = array(
        'Concert'=> $concerts,
        'DiaHora'=> $fecha,
        'Lloc'=> $lloc,
        'Roba'=> $roba,
        'Passcalles' => $passacalles);
            $this->db->where('id_concert',$id);
            $this->db->update('Concert', $data);
        }
    function modificarAssaigs($id, $asaj, $lloc, $proxact, $fecha){
        $data = array(
        'Assajs'=> $asaj,
        'DiaHora'=> $fecha,
        'Lloc'=> $lloc,
        'ProxActuacio'=> $proxact);
            $this->db->where('id_assajs',$id);
            $this->db->update('Assajs', $data);
        }
}

?>
