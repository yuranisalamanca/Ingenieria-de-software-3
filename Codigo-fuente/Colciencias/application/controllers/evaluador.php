<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Evaluador extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */



       /**
       * esta funcion sirve para llamar el va vista las funciones que vienen del modelo evaluadores_model
       * @return arreglo de evaluadores
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */

	public function listaDeEvaluadores(){

		$this->load->model('evaluadores_model');
	    
		$data['listarEvaluadores'] = $this->evaluadores_model->listarEvaluadores();
		/*echo "<pre>";
		print_r($data['listaPropuesta']);
		echo "</pre>";die();*/
		$this->load->view('barra');
	    $this->load->view('listaEvaluadores', $data);

	}


	 /**
       * esta funcion sirve para llamar el va vista las funciones que vienen del modelo evaluadores_model
       * @return arreglo de  3 evaluadores
       * @param $idPropuesta, que representa el id de la propuesta por la cual se va a buscar.
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
	public function listar3EvaluadoresPorPropuesta($idPropuesta){

		$this->load->model('evaluadores_model');   
		$data['listar3EvaluadoresPropuesta'] = $this->evaluadores_model->listar3EvaluadoresPorPropuesta($idPropuesta);
		/*echo "<pre>";
		print_r($data['listar3EvaluadoresPropuesta']);
		echo "</pre>";die();*/
		$this->load->view('barra');
	    $this->load->view('lista3EvaluadoresPropuesta', $data);
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */