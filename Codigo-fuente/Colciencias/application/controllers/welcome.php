<?php 

class Welcome extends CI_Controller {
	public function index(){
		$this->load->view('barra');
		$data['hola'] = array('m' => 'ghjk');
		$this->load->view('listaPropuestas', $data);
	}
}
