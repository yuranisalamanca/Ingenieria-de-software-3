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

	public function listaDePropuestasPorConvocatoria($idConvocatoria){

		$this->load->model('Propuesta_model');
	    
		$listaPropuesta = $this->Propuesta_model->listarPropuestaPorConvocatoria($idConvocatoria);
		$data['listaPropuesta'] = array();
		for($i=0; $i<count($listaPropuesta);$i++) {
			
			$idPropuesta = $listaPropuesta[$i]['idPropuesta'];
			$boolean = $this->Propuesta_model->buscarPropuestaExistente($idPropuesta);
			$data['listaPropuesta'][$i]['idConvocatoria'] 		  = $listaPropuesta[$i]['idConvocatoria'];
			$data['listaPropuesta'][$i]['idPropuesta'] 			  = $listaPropuesta[$i]['idPropuesta'];
			$data['listaPropuesta'][$i]['titulo'] 				  = $listaPropuesta[$i]['titulo'];
			$data['listaPropuesta'][$i]['nombreEstado']		      = $listaPropuesta[$i]['nombreEstado'];
			$data['listaPropuesta'][$i]['nombreOrganizacion'] 	  = $listaPropuesta[$i]['nombreOrganizacion'];
			$data['listaPropuesta'][$i]['nombreInstitucion']      = $listaPropuesta[$i]['nombreInstitucion'];
			$data['listaPropuesta'][$i]['areaNombre']		      = $listaPropuesta[$i]['areaNombre'];
			$data['listaPropuesta'][$i]['tipoEvaluacionNombre']   = $listaPropuesta[$i]['tipoEvaluacionNombre'];
			$data['listaPropuesta'][$i]['evaluadoresEncontrados'] = $boolean;		
		}
		$data['propuestasEncontradas'] = $this->Propuesta_model->buscarPropuestasDeUnaConvocatoria($idConvocatoria);
		$data['nombreConv'] 		   = $this->Propuesta_model->buscarConvocatoria($idConvocatoria);
		$data['idConvocatoria']		   = $idConvocatoria;

		$this->load->view('barra');
	    $this->load->view('listaPropuestasPorConvocatoria',$data);

	}



	public function listaDePropuestas(){

		$this->load->model('Propuesta_model');
	    
		$data['listadoPropuestas'] = $this->Propuesta_model->listarPropuesta();
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
		//die($idPropuesta); 
		$this->load->model('Propuesta_model');

		if (null !== $this->input->post('select') && $this->input->post('select') == 1) {

			if(count($this->input->post()) > 4) {			
				if (null != $this->input->post('area')) {
					$dataSearch['area'] = 1;
				} else {
					$dataSearch['area'] = 0;
				}
				if (null != $this->input->post('select_area')) {
					$dataSearch['select_area'] = $this->input->post('select_area');
				} else {
					$dataSearch['select_area'] = 0;
				}
				if (null != $this->input->post('calificacion')) {
					$dataSearch['calificacion'] = 1;
				} else {
					$dataSearch['calificacion'] = 0;
				}
				if (null != $this->input->post('select_calificacion')) {
					$dataSearch['select_calificacion'] = $this->input->post('select_calificacion');
				} else {
					$dataSearch['select_calificacion'] = 0;
				}
				if (null != $this->input->post('ciudad')) {
					$dataSearch['ciudad'] = 1;
				} else {
					$dataSearch['ciudad'] = 0;
				}
				if (null != $this->input->post('select_ciudad')) {
					$dataSearch['select_ciudad'] = $this->input->post('select_ciudad');
				} else {
					$dataSearch['select_ciudad'] = 0;
				}
				if (null != $this->input->post('nivel')) {
					$dataSearch['nivel'] = 1;
				} else {
					$dataSearch['nivel'] = 0;
				}
				if (null != $this->input->post('select_nivel')) {
					$dataSearch['select_nivel'] = $this->input->post('select_nivel');
				} else {
					$dataSearch['select_nivel'] = 0;
				}
				if (null != $this->input->post('idioma')) {
					$dataSearch['idioma'] = 1;
				} else {
					$dataSearch['idioma'] = 0;
				}
				if (null != $this->input->post('select_idioma')) {
					$dataSearch['select_idioma'] = $this->input->post('select_idioma');
				} else {
					$dataSearch['select_idioma'] = 0;
				}
				if (null != $this->input->post('organizacion')) {
					$dataSearch['organizacion'] = 1;
				} else {
					$dataSearch['organizacion'] = 0;
				}
				if (null != $this->input->post('select_organizacion')) {
					$dataSearch['select_organizacion'] = $this->input->post('select_organizacion');
				} else {
					$dataSearch['select_organizacion'] = 0;
				}
				if (null != $this->input->post('select_grupoinvestigacion')) {
					$dataSearch['select_grupoinvestigacion'] = $this->input->post('select_grupoinvestigacion');
				} else {
					$dataSearch['select_grupoinvestigacion'] = 0;
				}
				if (null != $this->input->post('experiencia')) {
					$dataSearch['experiencia'] = 1;
				} else {
					$dataSearch['experiencia'] = 0;
				}
				if (null != $this->input->post('select_experiencia')){
					$dataSearch['select_experiencia'] = $this->input->post('select_experiencia');
				} else {
					$dataSearch['select_experiencia'] = 0;
				}
				
				$evaluadores['evaluadores'] =$this->Propuesta_model->buscarEvaluadores($idPropuesta, $dataSearch);
				if($evaluadores['evaluadores']=='errorSeleccion')
				{
					$varSeleccion='Por favor indique el valor del criterio de b&uacute;squeda seleccionado';
					$this->session->set_userdata('varSeleccion', $varSeleccion);
				}

				if($evaluadores['evaluadores']=='No hay')
				{
					$varError='No existen evaluadores que cumplan con todos los criterios seleccionados';
					$this->session->set_userdata('varError', $varError);
				}
				$idConvocatoria=$this->Propuesta_model->buscarIdConvocatoria($idPropuesta);
			}
		}

		$data['idPropuesta']   				 = $idPropuesta;
		$data['idiomas']	   				 = $this->Propuesta_model->getIdiomas();
		$data['niveles']	   				 = $this->Propuesta_model->getNiveles();
		$data['ciudad']		  				 = $this->Propuesta_model->getCiudadPropuesta($idPropuesta);
		$data['area']		  				 = $this->Propuesta_model->getAreaPropuesta($idPropuesta);
		$data['grupoinvestigacion']  		 = $this->Propuesta_model->getGrupoInvestigacionPropuesta($idPropuesta);
		$organizacion 						 = $this->Propuesta_model->getOrganizacionPropuesta($idPropuesta);
		$data['organizaciones'] 			 = $this->Propuesta_model->getOrganizacionesDiferenteAPropuesta($organizacion);
		$this->load->view('seleccionarCriteriosEvaluador', $data);
	}


    public function cambiarEvaluador($idEv0, $idEv1,$idEv2,$idCambiado,$idPropuesta){

    	$this->load->model('propuesta_model');
    	$this->load->model('evaluadores_model');
    	if (null !== $this->input->post('select') && $this->input->post('select') == 1) {

			if(count($this->input->post()) > 4) {		
				if (null != $this->input->post('nombre')) {
					$dataSearch['nombre'] = 1;
				} else {
					$dataSearch['nombre'] = 0;
				}
				if (null != $this->input->post('select_nombre')) {
					$dataSearch['select_nombre'] = $this->input->post('select_nombre');
				} else {
					$dataSearch['select_nombre'] = '';
				}	
				if (null != $this->input->post('area')) {
					$dataSearch['area'] = 1;
				} else {
					$dataSearch['area'] = 0;
				}
				if (null != $this->input->post('select_area')) {
					$dataSearch['select_area'] = $this->input->post('select_area');
				} else {
					$dataSearch['select_area'] = 0;
				}
				if (null != $this->input->post('ciudad')) {
					$dataSearch['ciudad'] = 1;
				} else {
					$dataSearch['ciudad'] = 0;
				}
				if (null != $this->input->post('select_ciudad')) {
					$dataSearch['select_ciudad'] = $this->input->post('select_ciudad');
				} else {
					$dataSearch['select_ciudad'] = 0;
				}
				if (null != $this->input->post('nivel')) {
					$dataSearch['nivel'] = 1;
				} else {
					$dataSearch['nivel'] = 0;
				}
				if (null != $this->input->post('select_nivel')) {
					$dataSearch['select_nivel'] = $this->input->post('select_nivel');
				} else {
					$dataSearch['select_nivel'] = 0;
				}
				if (null != $this->input->post('organizacion')) {
					$dataSearch['organizacion'] = 1;
				} else {
					$dataSearch['organizacion'] = 0;
				}
				if (null != $this->input->post('select_organizacion')) {
					$dataSearch['select_organizacion'] = $this->input->post('select_organizacion');
				} else {
					$dataSearch['select_organizacion'] = 0;
				}
				if (null != $this->input->post('experiencia')) {
					$dataSearch['experiencia'] = 1;
				} else {
					$dataSearch['experiencia'] = 0;
				}
				if (null != $this->input->post('select_experiencia')){
					$dataSearch['select_experiencia'] = $this->input->post('select_experiencia');
				} else {
					$dataSearch['select_experiencia'] = 0;
				}
				if (null != $this->input->post('idioma')) {
					$dataSearch['idioma'] = 1;
				} else {
					$dataSearch['idioma'] = 0;
				}
				if (null != $this->input->post('select_idioma')) {
					$dataSearch['select_idioma'] = $this->input->post('select_idioma');
				} else {
					$dataSearch['select_idioma'] = 0;
				}
				if (null != $this->input->post('select_grupoinvestigacion')) {
					$dataSearch['select_grupoinvestigacion'] = $this->input->post('select_grupoinvestigacion');
				} else {
					$dataSearch['select_grupoinvestigacion'] = 0;
				}
				

				$data['idPropuesta'] = $idPropuesta;
				$data['idCambiado'] = $idCambiado;
				$data['evaluadoresNuevos'] = $this->propuesta_model->buscarEvaluadoresCambiado($idPropuesta, $dataSearch,$idEv0, $idEv1,$idEv2);
				$idConvocatoria = $this->propuesta_model->buscarIdConvocatoria($idPropuesta);
				

				if($data['evaluadoresNuevos'] =='No hay')
				{
					$varError='No existen evaluadores que cumplan con los criterios seleccionados';
					$this->session->set_userdata('varErrorCambiar', $varError);
					unset($_POST);
					$this->cambiarEvaluador($idEv0, $idEv1,$idEv2,$idCambiado,$idPropuesta);
				}else{
					$this->load->view('fancyboxCambiarEvaluador',$data);
				}
				return ;
			}
		}
    
	    $data['idEv0'] = $idEv0;	    
	    $data['idEv1'] = $idEv1;	    
	    $data['idEv2'] = $idEv2;	    
	    $data['idCambiado']   = $idCambiado;
	    $data['idPropuesta']  = $idPropuesta;
		$data['idiomas']	  = $this->propuesta_model->getIdiomas();
		$data['niveles']	  = $this->propuesta_model->getNiveles();
		$data['ciudad']		  = $this->propuesta_model->getCiudadPropuesta($idPropuesta);
		$data['area']		  = $this->propuesta_model->getAreaPropuesta($idPropuesta);
		$data['grupoinvestigacion']  		 = $this->propuesta_model->getGrupoInvestigacionPropuesta($idPropuesta);
		$data['organizacion'] = $this->propuesta_model->getOrganizacionPropuesta($idPropuesta);
	    $this->load->view('seleccionarCriteriosEvaluadorCambiado', $data);
	}

	
	public function listar3EvaluadoresPorPropuestaCambiado($idPropuesta,$idViejo){

		$this->load->model('evaluadores_model');   
		$this->load->model('propuesta_model');   
		$data['idPropuesta'] = $idPropuesta;
		$data['listar3EvaluadoresPropuesta'] = $this->evaluadores_model->listar3EvaluadoresPorPropuesta($idPropuesta);

		if (null != $this->input->post('select') && $this->input->post('select') == 1) {
			if ($this->input->post('select_evaluador') == 0) {
				$varErrorCambiar = 'No existen evaluadores que cumplan con todos los criterios seleccionados';
				$this->session->set_userdata('varErrorCambiar', $varErrorCambiar);
			} else {
				$idNuevo = $this->input->post('select_evaluador');
				$this->propuesta_model->cambiarEvaluador($idViejo,$idNuevo,$idPropuesta);
			}
		}
		
		$data['idConfirmado'] = $this->propuesta_model->verficarEvaluadorConfirmado($idPropuesta);
		$this->load->view('barra');
	    $this->load->view('lista3EvaluadoresPropuesta',$data);
	}

	public function verPropuesta($idPropuesta){
		$this->load->model('propuesta_model');
		$data['infoPropuesta']=$this->propuesta_model->getPropuesta($idPropuesta);
		$this->load->view('barra');
		$this->load->view('infoPropuesta',$data);

	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */