<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
      
      parent::__construct();
      $this->load->helper('url');
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
		$this->load->view('Concerts');
		
	}

	public function insertarconcert() {
		$concerts = $this->input->post('Concert');
		$lloc = $this->input->post('Lloc');
		$roba = $this->input->post('Roba');
		$data = $this->input->post('Diahora');
		$lparti = $this->select->post('ListPartitures');
		$this->model_concerts->insertConcert($concerts, $lloc, $roba, $data,$lparti);
		$this->load->view('Concerts');
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
		$this->load->view('Assajos');
	}

	public function insertvideos() {
		$nom = $this->input->post('Nom');
		$link = $this->input->post('Link');
		$this->model_concerts->insertVideo($nom, $link);
		$this->load->view('Videos');	
	}
	
	public function video()
	{
		$this->load->view('Videos');
		
	}
	
	public function partitura()
	{
		$this->load->view('Partitures');
	}

	public function insertpartitura()
	{
		$nom = $this->input->post('Nom');
		$partitura = $this->input->post('Partitura');
		$this->model_concerts->insertPartitures($nom, $partitura);
		$this->load->view('Partitures');
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
		$this->load->view('vpartitures');
	}

	public function vistavideos()
	{
		$this->load->model('model_concerts');
		$data = $this->model_concerts->getvideos();
		$this->load->view('vvideos', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
