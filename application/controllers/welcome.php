<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
      
      parent::__construct();
      $this->load->database();
      $this->load->library('form_validation');
      $this->load->model('model_concerts');
    } 
	/*
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function concert()
	{
		$data = $this->model_concerts->getconcert();
		$this->load->view('Concerts', $data);
		
	}

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
		$data = $this->input->post('Diahora');
		$passacalles = $this->input->post('optionsRadios');
		//$lparti = $this->select->post('ListPartitures');
		$this->model_concerts->insertConcert($concerts, $lloc, $roba, $data,$passacalles);
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
	
	public function assajs()
	{
		$data = $this->model_concerts->getassajs();
		$this->load->view('Assajos', $data);
		
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
		$data = $this->input->post('Diahora');		
		$this->model_concerts->insertAssajs($asaj, $lloc, $proxact, $data);
		// Push The notification with parameters
		$this->load->library('PushBots');
		$pb = new PushBots();
		// Application ID
		$appID = '538380281d0ab1d1048b45a7';
		// Application Secret
		$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
		$pb->App($appID, $appSecret);
		// Notification msg
		$msg="Un nou Assajs :D";
		$pb->Alert($msg);
		$platforms= array(0,1);
		$pb->Platform($platforms);
		// Push it !
		$pb->Push();
		redirect('welcome/assajs');	
	}
	}
	
	public function insertusuaris() {
		$usuari = $this->input->post('Usuari');
		$contrasenya = $this->input->post('Contrasenya');
		$rol = $this->input->post('optionUsers');
		$this->model_concerts->insertUsuari($usuari, $contrasenya,$rol);
		redirect('welcome/membre');	
	}
	
	public function insertvideos() {
		$nom = $this->input->post('Nom');
		$link = $this->input->post('Link');
		$this->model_concerts->insertVideo($nom, $link);
		// Push The notification with parameters
		$this->load->library('PushBots');
		$pb = new PushBots();
		// Application ID
		$appID = '538380281d0ab1d1048b45a7';
		// Application Secret
		$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
		$pb->App($appID, $appSecret);
		// Notification msg
		$msg="Un nou video :D";
		$pb->Alert($msg);
		$platforms= array(0,1);
		$pb->Platform($platforms);
		// Push it !
		$pb->Push();
		redirect('welcome/video');	

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
		$data = $this->model_concerts->getpartitures();
		$this->load->view('Partitures', $data);
	}

	public function upload() {
		$data['content'] = 'Partitures';
		$this->load->vars($data);
		$this->load->view('Partitures');
	}

	public function DoUpload() {

		$config_file = array (
		'upload_path' => './partitures/',
		'allowed_types' => 'pdf|doc|docx',
		'overwrite' => false,
		'max_size' => 0,
		'max_width' => 0,
		'max_height' => 0,
		'encrypt_name' => false,
		'remove_spaces' => true,
		);
		$this->upload->initialize($config_file);
		if (!$this->upload->do_upload('cipote')) {
			$error = $this->upload->display_errors();
			echo $error;
		}
		else {
			$this->session->set_flashdata('success_upload','Pujat Correcament');
			$nom = $this->upload->file_name;
			$file_name = base_url()."partitures/".$this->upload->file_name;
			$this->model_concerts->insertPartitures($nom, $file_name);
			// Push The notification with parameters
			$this->load->library('PushBots');
			$pb = new PushBots();
			// Application ID
			$appID = '538380281d0ab1d1048b45a7';
			// Application Secret
			$appSecret = '347f3b8fffefeea0096dcfa17d4345b7';
			$pb->App($appID, $appSecret);
			// Notification msg
			$msg="Una nova partitura :D";
			$pb->Alert($msg);
			$platforms= array(0,1);
			$pb->Platform($platforms);
			// Push it !
			$pb->Push();
			redirect('welcome/partitura');
			}
	}

	public function welcomemembers()
	{
		$this->load->view('welcome_members');
	}


	public function vistaassaj()
	{
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getassajs();
		$this->load->view('vassaj', $data);
	}
	
	public function vistaconcert()
	{
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getconcert();
		$this->load->view('vconcert',$data);
	}

	public function vistapartitures()
	{
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getpartitures();
		$this->load->view('vpartitures', $data);
	}

	public function vistavideos()
	{
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getvideos();
		$this->load->view('vvideos', $data);
	}

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

	public function eliminarPartitures($id)
	{
		$this->load->model('model_concerts');
		$this->model_concerts->eliminarPartitura($id);
		redirect('welcome/partitura');
	}

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
		$this->load->view('json_videos',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
