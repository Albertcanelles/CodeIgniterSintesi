<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
      
      parent::__construct();
      $this->load->database();   // Carreguem la base de dades
      $this->load->library('form_validation');  // La llibreria per fer els camps requerits
      $this->load->model('model_concerts');		// Carreguem el model que farem servir
    } 
	/*
	 */

	// Totes les vistes carregan les dades des de el model i pasan-lo en variable data
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function concert()
	{
		$data = $this->model_concerts->getconcert();
		$this->load->view('Concerts', $data);
		
	}

	public function video()
	{
		$data = $this->model_concerts->getvideos();
		$this->load->view('Videos', $data);		
	}
	

	public function membre() {
		$data = $this->model_concerts->getUser();
		$this->load->view('Membres', $data);
		
	}



	public function partitura()
	{
			 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
		$data = $this->model_concerts->getpartitures();
		$this->load->view('Partitures', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}

	public function assajs()
	{
		$data = $this->model_concerts->getassajs();
		$this->load->view('Assajos', $data);
		
	}

	// Totes les funcions d'instar tambe amb els seus requireds i que no poden entra si no es logueixen i el plus de pushbots per enviar notifacions 

	public function insertarconcert() {
		$this->form_validation->set_rules('Concert', 'Concert', 'required|xss_clean');
		$this->form_validation->set_rules('Lloc', 'Lloc', 'required|xss_clean');
		$this->form_validation->set_rules('Roba', 'Roba', 'required|xss_clean');
		$this->form_validation->set_rules('Diahora', 'Diahora', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');

		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getconcert();
				$this->load->view('Concerts', $data);
			}else{
		$concerts = $this->input->post('Concert');
		$lloc = $this->input->post('Lloc');
		$roba = $this->input->post('Roba');
		$fecha = $this->input->post('Diahora');
		$passacalles = $this->input->post('optionsRadios');
		//$lparti = $this->select->post('ListPartitures');
		$this->model_concerts->insertConcert($concerts, $lloc, $roba, $fecha,$passacalles);
		// Push The notification with parameters
		$this->load->library('PushBots');
		$pb = new PushBots();
		// Application ID
		$appID = '538380281d0ab1d1048b45a7';
		// Application Secret
		$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
		$pb->App($appID, $appSecret);
		// Notification msg
		$msg="Un nou concert :D";
		$pb->Alert($msg);

		$platforms= array(0,1);
		$pb->Platform($platforms);
		// Push it !
		$pb->Push();
		redirect('welcome/concert');
	}
	}
	
	public function insertarassajs() {
		$this->form_validation->set_rules('Assajs', 'Assajs', 'required|xss_clean');
		$this->form_validation->set_rules('Lloc', 'Lloc', 'required|xss_clean');
		$this->form_validation->set_rules('proxact', 'proxact', 'required|xss_clean');
		$this->form_validation->set_rules('Diahora', 'Diahora', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');
		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getassajs();
				$this->load->view('Assajos', $data);
			}else{
		$asaj = $this->input->post('Assajs');
		$lloc = $this->input->post('Lloc');
		$proxact = $this->input->post('proxact');
		$fecha = $this->input->post('Diahora');		
		$this->model_concerts->insertAssajs($asaj, $lloc, $proxact, $fecha);
		// Push The notification with parameters
		$this->load->library('PushBots');
		$pb = new PushBots();
		// Application ID
		$appID = '538380281d0ab1d1048b45a7';
		// Application Secret
		$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
		$pb->App($appID, $appSecret);
		// Notification msg
		$msg="Proper Assaig el ".$asaj." el dia ".$fecha;
		$pb->Alert($msg);
		$platforms= array(0,1);
		$pb->Platform($platforms);
		// Push it !
		$pb->Push();
		redirect('welcome/assajs');	
	}
	}
	
	public function insertusuaris() {
		$this->form_validation->set_rules('Usuari', 'Usuari', 'required|xss_clean');
		$this->form_validation->set_rules('Contrasenya', 'Contrasenya', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');
		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getUser();
				$this->load->view('Membres', $data);
			}else{
		$usuari = $this->input->post('Usuari');
		$contrasenya = $this->input->post('Contrasenya');
		$rol = $this->input->post('optionUsers');
		$this->model_concerts->insertUsuari($usuari, $contrasenya,$rol);
		redirect('welcome/membre');	
	}
	}
	
	public function insertvideos() {
		$this->form_validation->set_rules('Nom', 'Nom', 'required|xss_clean');
		$this->form_validation->set_rules('Link', 'Link', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');
		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getvideos();
				$this->load->view('Videos', $data);
			}else{
		$nom = $this->input->post('Nom');
		$link = $this->input->post('Link');
		$this->model_concerts->insertVideo($nom, $link);
		// Parametres que pasem utilitzant la llibreria pushbots
		$this->load->library('PushBots');
		$pb = new PushBots();
		// Application ID
		$appID = '538380281d0ab1d1048b45a7';
		// Application Secret
		$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
		$pb->App($appID, $appSecret);
		// Missatge que vols 
		$msg="Aqui teniu el video de".$nom;
		$pb->Alert($msg);
		$platforms= array(0,1);
		$pb->Platform($platforms);
		// Ho envia
		$pb->Push();
		redirect('welcome/video');	
	}
	}
	
// Funcio per pujar partitures al servidor 	

	public function upload() {
		$data['content'] = 'Partitures';
		$this->load->vars($data);
		$this->load->view('Partitures');
	}

	public function DoUpload() {

		$config_file = array (
		'upload_path' => './partitures/',    // Directori on es guardarant sempre començant desde l'arrel de CD
		'allowed_types' => 'pdf|doc|docx',   // Formats soportats 
		'overwrite' => false,				// No rescriu els fitxers que tenen el mateix nom posa un 1 al final per evitar concordança
		'max_size' => 0,
		'max_width' => 0,
		'max_height' => 0,
		'encrypt_name' => false,			// La resta de valors no comentats astan per defecte 
		'remove_spaces' => true,			// Elimina els possibles espais que poden haver al nom del fitxer
		);
		$this->upload->initialize($config_file);
		if (!$this->upload->do_upload('cipote')) {
			$error = $this->upload->display_errors();
			echo $error;
		}
		else {
			$this->session->set_flashdata('success_upload','Pujat Correcament');
			$nom = $this->upload->file_name; 								// Amb la funciona file_name agafo el nom del fitxer
			$file_name = base_url()."partitures/".$this->upload->file_name;  		// Aqui concateno el nom del fitxer amb el base_url i el directori mes el nom del fitxer
			$this->model_concerts->insertPartitures($nom, $file_name);
			// Aquest es el tros de codi que envia la notificacio agafant la llibreria que carregem aqui baix
			$this->load->library('PushBots');
			$pb = new PushBots();
			// Id de la teva Applicacio
			$appID = '538380281d0ab1d1048b45a7';
			// la Clau secreta de l'aplicacio
			$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
			$pb->App($appID, $appSecret);
			// El misstage que voldras que reben
			$msg="Nova partitura: ".$nom;
			$pb->Alert($msg);
			$platforms= array(0,1);
			$pb->Platform($platforms);
			// Ho envia i et torna a la pagina de partitures
			$pb->Push();
			redirect('welcome/partitura');
			}
	}

	// Funcions que son per la vista de l'usuari 

	public function welcomemembers()
	{
		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('welcome_members');
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}


	public function vistaassaj()
	{
		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->model('model_concerts');
	 $data = $this->model_concerts->getassajs();
	 $this->load->view('vassaj', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}
	
	public function vistaconcert()
	{
		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
    $this->load->model('model_concerts');
		$data = $this->model_concerts->getconcert();
		$this->load->view('vconcert',$data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}

	public function vistapartitures()
	{

		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getpartitures();
		$this->load->view('vpartitures', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
	}

	public function vistavideos()
	{

		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getvideos();
		$this->load->view('vvideos', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}

		// Aquest controlador carreguen el mateix que l'anterior pero per la vista admin unicament

	public function vistaassajadmin()
	{
		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->model('model_concerts');
	 $data = $this->model_concerts->getassajs();
	 $this->load->view('adminvassaj', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}
	
	public function vistaconcertadmin()
	{
		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
    $this->load->model('model_concerts');
		$data = $this->model_concerts->getconcert();
		$this->load->view('adminvconcert',$data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}

	public function vistapartituresadmin()
	{

		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getpartitures();
		$this->load->view('adminvpartitures', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
	}

	public function vistavideosadmin()
	{

		 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getvideos();
		$this->load->view('adminvvideos', $data);
   }
   else
   {
     //Si no esta logueixat el torna a la pagina de logeig
     redirect('login', 'refresh');
   }
		
	}

		// Funcions d'eliminar agafan l'id 

	public function eliminarConcerts($id)
	{

		$this->load->model('model_concerts');
		$this->model_concerts->eliminarConcert($id);
		redirect('welcome/concert');
	}

	public function eliminarAssajos($id)
	{
		$this->load->model('model_concerts');
		$this->model_concerts->eliminarAssajs($id);
		redirect('welcome/assajs');
	}

	public function eliminarVideos($id)
	{
		$this->load->model('model_concerts');
		$this->model_concerts->eliminarVideo($id);
		redirect('welcome/video');
	}

	public function eliminarMembres($id)
	{
		$this->load->model('model_concerts');
		$this->model_concerts->eliminarMembre($id);
		redirect('welcome/membre');
	}

	public function eliminarPartitures($id)
	{
		$this->load->model('model_concerts');
		$this->model_concerts->eliminarPartitura($id);
		redirect('welcome/partitura');
	}

		// Funcions encarregades d'actualitzar per l'id tenen els camps requerids i no poden entra directament al link si no es logueixen

	public function updateMembre($id)
	{
		
		$this->form_validation->set_rules('Contrasenya', 'Contraseña', 'required|matches[comfirmala]');
		$this->form_validation->set_rules('comfirmala', 'Comfirmar Contraseña', 'required');
		$this->form_validation->set_message('required', 'El camps %s han de coincidir');
		$contra = $this->input->post('Contrasenya');
		$contra1 = $this->input->post('confirmala');
		if($this->form_validation->run() == FALSE)
			{
				$this->load->view('modificarMembre'); 
			}else{
                $this->model_concerts->modificarMembres($id, $contra);
                redirect('welcome/membre');
            }
}
	
	public function updateConcerts($id)
	{
		
		$this->form_validation->set_rules('Concert', 'Concert', 'required|xss_clean');
		$this->form_validation->set_rules('Lloc', 'Lloc', 'required|xss_clean');
		$this->form_validation->set_rules('Roba', 'Roba', 'required|xss_clean');
		$this->form_validation->set_rules('Diahora', 'Diahora', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');

		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getconcert();
				$this->load->view('modificarConcert', $data);
			}else{
		$concerts = $this->input->post('Concert');
		$lloc = $this->input->post('Lloc');
		$roba = $this->input->post('Roba');
		$fecha = $this->input->post('Diahora');
		$passacalles = $this->input->post('optionsRadios');
		$this->model_concerts->modificarConcert($id, $concerts, $lloc, $roba, $fecha,$passacalles);
		redirect('welcome/concert');
            }
}
	public function updateAssaigs($id)
	{
		
		$this->form_validation->set_rules('Assajs', 'Assajs', 'required|xss_clean');
		$this->form_validation->set_rules('Lloc', 'Lloc', 'required|xss_clean');
		$this->form_validation->set_rules('proxact', 'proxact', 'required|xss_clean');
		$this->form_validation->set_rules('Diahora', 'Diahora', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');
		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getassajs();
				$this->load->view('modificarAssaigs', $data);
			}else{
		$asaj = $this->input->post('Assajs');
		$lloc = $this->input->post('Lloc');
		$proxact = $this->input->post('proxact');
		$fecha = $this->input->post('Diahora');		
		$this->model_concerts->modificarAssaigs($id, $asaj, $lloc, $proxact, $fecha);
		redirect('welcome/assajs');
            }
}
	
	public function updateVideos($id)
	{
		
		$this->form_validation->set_rules('Nom', 'Nom', 'required|xss_clean');
		$this->form_validation->set_rules('Link', 'Link', 'required|xss_clean');
		$this->form_validation->set_message('required', 'El camp %s es obligat');
		if($this->form_validation->run() == FALSE)
			{
				$data = $this->model_concerts->getvideos();
				$this->load->view('modificarVideos', $data);
			}else{
		$nom = $this->input->post('Nom');
		$link = $this->input->post('Link');
		$this->model_concerts->insertVideo($id, $nom, $link);
		redirect('welcome/video');	
            }
}
		// Funcions encarregades de pasar el JSON

	public function json_concerts() {
		$data['json'] = $this->model_concerts->getconcert();
		if (!$data['json']) show_404();
		$this->load->view('json_concert',$data);
	}

	public function json_assajos() {
		$data['json'] = $this->model_concerts->getassajs();
		if (!$data['json']) show_404();
		$this->load->view('json_assajs',$data);
	}

	public function json_youtube() {
		$data['json'] = $this->model_concerts->getvideos();
		if (!$data['json']) show_404();
		$this->load->view('json_videos',$data);
	}

	public function json_partitures() {
		$data['json'] = $this->model_concerts->getpartitures();
		if (!$data['json']) show_404();
		$this->load->view('json_partitures',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
