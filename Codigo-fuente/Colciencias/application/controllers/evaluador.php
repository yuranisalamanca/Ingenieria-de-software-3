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
       * esta funcion sirve para llamar las funciones que vienen del modelo evaluadores_model
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
	public function listar3EvaluadoresPorPropuesta($idPropuesta,$eliminado=''){

		$this->load->model('evaluadores_model');   
		$this->load->model('propuesta_model');   
		$data['idPropuesta']=$idPropuesta;
		$data['listar3EvaluadoresPropuesta'] = $this->evaluadores_model->listar3EvaluadoresPorPropuesta($idPropuesta);
		for($i=0; $i<count($data['listar3EvaluadoresPropuesta']);$i++) {
			$data['idEv'.$i] = $data['listar3EvaluadoresPropuesta'][$i]['idEvaluador'];
		}
		if(!isset($data['idEv0']))
		{
			$data['idEv0']=0;
		}
		if(!isset($data['idEv1'])){
			$data['idEv1']=0;
		}
		if(!isset($data['idEv2'])){
			$data['idEv2']=0;
		}
		$data['evaluadorEliminado']=$eliminado;
		$data['idConfirmado'] = $this->propuesta_model->verficarEvaluadorConfirmado($idPropuesta);
		$this->load->view('barra');
	    $this->load->view('lista3EvaluadoresPropuesta',$data);
	}

  	public function asignarEvaluador($idPropuesta,$idEvaluador)
	{
		$this->load->model('propuesta_model');

		$this->propuesta_model->asignarEvaluador($idPropuesta,$idEvaluador);
		$this->listar3EvaluadoresPorPropuesta($idPropuesta);

	}
	public function listarPropuestaPorEvaluador($idEvaluador)
	{
		$this->load->model('propuesta_model');
		$data['listarPropuestasEvaluador'] = $this->propuesta_model->listarPropuestaPorEvaluador($idEvaluador);
		$this->load->view('barra');
		$this->load->view('listaPropuestasPorEvaluador', $data);
	}


	public function listarPropuestasTodosEvaluadores($idEvaluador)
	{
		$this->load->model('propuesta_model');
		$data['listarPropuestasTodosEvaluadores'] = $this->propuesta_model->listarPropuestaPorEvaluador($idEvaluador);
		$this->load->view('barra');
		$this->load->view('listaPropuestasTodosEvaluadores',$data);
	}

	public function listaDePropuestasYEvaluadoresOrdenado($idConvocatoria,$ordenarEvaluador='',$ordenarPropuesta='')
	{
		$this->load->model('evaluadores_model');
		$data['listaPropuestasYEvaluadores'] = $this->evaluadores_model->listaDeEvaluadoresYPropuestasOrdenado($idConvocatoria,$ordenarEvaluador,$ordenarPropuesta);
		$data['ordenarEvaluador'] = $ordenarEvaluador;
		$data['ordenarPropuesta'] = $ordenarPropuesta;
		$data['idConvocatoria']	  = $idConvocatoria;
		$this->load->view('barra');
		$this->load->view('listaDePropuestasYEvaluadores',$data);
	}

	public function iniciarProcesoDeEvaluacion($idPropuesta, $idEvaluador)
	{
		$this->load->model('convocatoria_model');
		$this->load->model('evaluacion_model');
		$this->load->model('evaluadores_model');
		$this->evaluacion_model->iniciarProcesoDeEvaluacion($idPropuesta,$idEvaluador);
		$idConvocatoria = $this->convocatoria_model->buscarConvocatoriaPorPropuesta($idPropuesta);
		$this->listaDePropuestasYEvaluadoresOrdenado($idConvocatoria);
		
	}

	public function eliminarEvaluador($idEvaluador,$idPropuesta){
		$this->load->model('evaluadores_model');
		$eliminado=$this->evaluadores_model->eliminarEvaluador($idEvaluador,$idPropuesta);
		$this->listar3EvaluadoresPorPropuesta($idPropuesta,$eliminado);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */