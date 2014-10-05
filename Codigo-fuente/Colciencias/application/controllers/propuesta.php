<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Propuesta extends CI_Controller {

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
       * esta funcion sirve para llamar el home principal
       * @return 
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
	public function index(){

		$this->load->view('barra');
	    $this->load->view('homeUsuarioColciencias');

	}

	  /**
       * esta funcion sirve para llamar el va vista las funciones que vienen del modelo propuesta_model
       * @return arreglo de propuestas
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */

	public function listaDePropuestas(){

		$this->load->model('Propuesta_model');
	    
		$data['listaPropuesta'] = $this->Propuesta_model->listarPropuesta();
		/*echo "<pre>";
		print_r($data['listaPropuesta']);
		echo "</pre>";die();*/
		$this->load->view('barra');
	    $this->load->view('listaPropuestas', $data);

	}

/**
       * esta funcion sirve para llamar el va vista las funciones que vienen del modelo propuesta_model
       * @return evaluadores
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */

	public function buscarEvaluadores($idPropuesta) {
		$this->load->model('Propuesta_model');

		if (null !== $this->input->post('select') && $this->input->post('select') == 1) {
			if(count($this->input->post()) > 3) {
				if (null !== $this->input->post('area')) {
					$dataSearch['area'] = 1;
				} else {
					$dataSearch['area'] = 0;
				}
				if (null !== $this->input->post('select_area')) {
					$dataSearch['select_area'] = $this->input->post('select_area');
				} else {
					$dataSearch['select_area'] = 0;
				}
				if (null !== $this->input->post('calificacion')) {
					$dataSearch['calificacion'] = 1;
				} else {
					$dataSearch['calificacion'] = 0;
				}
				if (null !== $this->input->post('select_calificacion')) {
					$dataSearch['select_calificacion'] = $this->input->post('select_calificacion');
				} else {
					$dataSearch['select_calificacion'] = 0;
				}
				if (null !== $this->input->post('ciudad')) {
					$dataSearch['ciudad'] = 1;
				} else {
					$dataSearch['ciudad'] = 0;
				}
				if (null !== $this->input->post('select_ciudad')) {
					$dataSearch['select_ciudad'] = $this->input->post('select_ciudad');
				} else {
					$dataSearch['select_ciudad'] = 0;
				}
				if (null !== $this->input->post('nivel')) {
					$dataSearch['nivel'] = 1;
				} else {
					$dataSearch['nivel'] = 0;
				}
				if (null !== $this->input->post('select_nivel')) {
					$dataSearch['select_nivel'] = $this->input->post('select_nivel');
				} else {
					$dataSearch['select_nivel'] = 0;
				}
				if (null !== $this->input->post('idioma')) {
					$dataSearch['idioma'] = 1;
				} else {
					$dataSearch['idioma'] = 0;
				}
				if (null !== $this->input->post('select_idioma')) {
					$dataSearch['select_idioma'] = $this->input->post('select_idioma');
				} else {
					$dataSearch['select_idioma'] = 0;
				}

				$this->Propuesta_model->buscarEvaluadores($idPropuesta, $dataSearch);
			}
		}

		$data['idPropuesta'] = $idPropuesta;
		$data['idiomas']	 = $this->Propuesta_model->getIdiomas();
		$data['niveles']	 = $this->Propuesta_model->getNiveles();
		$data['ciudad']		 = $this->Propuesta_model->getCiudadPropuesta($idPropuesta);
		$data['area']		 = $this->Propuesta_model->getAreaPropuesta($idPropuesta);
		
		$this->load->view('seleccionarCriteriosEvaluador', $data);
	}

	public function asignarEvaluador($idPropuesta,$idEvaluador){

		$sql="UPDATE evaluacion_ propuesta e SET e.esConfirmado=1  
			  WHERE e.Propuesta_idPropuesta=".$idPropuesta." AND e.Evaluador_idEvaluador=".$idEvaluador";
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */