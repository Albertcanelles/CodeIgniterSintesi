<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
 
     switch ($this->session->userdata('rol')) {
      
            case 'Administrador':
                redirect(base_url().'index.php/welcome/index');
                break;
            case 'Membre':
                redirect(base_url().'index.php/welcome/welcomemembers');
                break;    
            default:        
               redirect('login_view');
                break;      
			
        }
    // redirect(base_url().'index.php/welcome/welcomemembers');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   //query the database
   $role = $this->user->getRole($username);
   $result = $this->user->login($username, $password, $role);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(

         'id' => $row->id_membre,
         'username' => $row->usuari,
         'rol' => $row->rol
       );
       $this->session->set_userdata('logged_in', $sess_array); 
     }
     
        switch ($role) {    
            case 'Administrador':
                redirect(base_url().'index.php/welcome/index');
                break;
            case 'Membre':
                redirect(base_url().'index.php/welcome/welcomemembers');
                break;    
            default:        
              redirect(base_url().'index.php/login');
                break;      
        }
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Has introduit malament el teu compte o contrasenya');
     return false;
   }
 }
}
?>
