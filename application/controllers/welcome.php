<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
      
      parent::__construct();
      $this->load->database();
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
		$concerts = $this->input->post('Concert');
		$lloc = $this->input->post('Lloc');
		$roba = $this->input->post('Roba');
		$data = $this->input->post('Diahora');
		//$lparti = $this->select->post('ListPartitures');
		$this->model_concerts->insertConcert($concerts, $lloc, $roba, $data,$lparti);
		redirect('welcome/concert');
	}
	
	public function assajs()
	{
		$this->load->view('Assajos');
		
	}

	public function insertarassajs() {
		$asaj = $this->input->post('Assajs');
		$lloc = $this->input->post('Lloc');
		$proxact = $this->input->post('proxact');
		$data = $this->input->post('Diahora');		
		$this->model_concerts->insertAssajs($asaj, $lloc, $proxact, $data);
		redirect('welcome/assajs');	
	}

	public function insertvideos() {
		$nom = $this->input->post('Nom');
		$link = $this->input->post('Link');
		$this->model_concerts->insertVideo($nom, $link);
		redirect('welcome/video');	
	}
	
	public function video()
	{
		$this->load->view('Videos');
		
	}
	
	public function partitura()
	{
		$this->load->view('Partitures');
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
