<?php
Class User extends CI_Model
{
	function __construct(){
		 parent::__construct();
		 
		 
	}
 function login($username, $password, $role)
 {
	 
   $this -> db -> select('id_membre, usuari, contraseña,rol');
   $this -> db -> from('Membres');
   $this -> db -> where('usuari', $username);
   $this -> db -> where('contraseña', md5($password));
   $this -> db -> where('rol', $role);
   

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getRole($user){
	 $this -> db -> select('rol');
	 
	 $this -> db -> where('usuari', $user);
	  
	 $query = $this -> db -> get('Membres',1);
	
			return $query->row()->rol;
	
	 }
 
}
?>
