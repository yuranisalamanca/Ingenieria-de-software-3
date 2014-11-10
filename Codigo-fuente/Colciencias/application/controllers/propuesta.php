<?php

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

	 /**
       * listar las propuestas que han sido evaluadas y mostrarlo en su respectiva vista
       * @param idConvocatoria. Convocatoria de la cual se quiere listar las propuestas
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
     */
	public function listarPropuestasConEvaluaciones($idConvocatoria){
		$this->load->model('Propuesta_model');
		$data['listaPropuestas']= $this->Propuesta_model->listarPropuestasConEvaluaciones($idConvocatoria);
		$this->load->view('barra');
	    $this->load->view('listaPropuestasConEvaluaciones',$data);
	}

	/**
       * listar las convocatorias que tienen propuestas que han sido evaluadas y mostrarlo en su respectiva vista
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
     */
	public function listarConvocatoriasConEvaluaciones(){
		$this->load->model('Propuesta_model');
		$this->load->model('convocatoria_model');
		$data['listaAnios']= $this->Propuesta_model->listaAniosPropuestasEvaluacion();
		$data['listarConvocatorias']= $this->Propuesta_model->listarConvocatoriasConEvaluaciones();
		$this->load->view('barra');
		$this->load->view('listarConvocatoriasEvaluaciones', $data);
	}

	/**
	* esta funcion sirve para actualizar las convocatorias que tienen propuestas que han sido evaluadas del modelo propuestas_model
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
	*/
	public function actualizarConvocatoriasConEvaluaciones(){
		$this->load->model('Propuesta_model');
		$this->load->model('convocatoria_model');
		
		if($this->input->post('select_anio')!==null && $this->input->post('select_anio')!=0){
			$selectAnio=$this->input->post('select_anio');
		}else{
			$selectAnio='';
		}
		$listarPropuestas= $this->Propuesta_model->listarConvocatoriasConEvaluaciones($selectAnio);

		$html = '<table style="margin:0 auto">
             		<thead>
             			<tr> 
                            <th width="210" style="text-align: center"> Nombre </th>
             				<th width="210" style="text-align: center"> Estado </th> 
             				<th width="210" style="text-align: center"> Ver Propuestas </th>
              			</tr>
             		</thead>
             		<tbody>';
        foreach ($listarPropuestas as $resultado) {
        	$html.='<tr>';
        		$html.='<td style="text-align: center">';
        			$html.=$resultado['nombre'];
        		$html.='</td>';
        		$html.='<td style="text-align: center">';
        			$html.=$resultado['estado'];
        		$html.='</td>';
        		$html.='<td style="text-align: center">';
        			$html.='<a class="" href="">';
        				$html.='<img src="'.base_url().'img/iconos/listarPropuesta.png" title="Ver propuestas">';
        			$html.='</a>';
        		$html.='</td>';
        	$html.='</tr>';
        }
        $html.='</body>
        		</table>';
        echo $html;
	}

  /**
       * esta funcion sirve para listar las propuestas del modelo propuesta_model
       * @return arreglo de propuestas
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */

	public function listaDePropuestas(){

		$this->load->model('Propuesta_model');
		$this->load->model('convocatoria_model');
		$data['listadoConvocatoriasBusqueda'] = $this->convocatoria_model->listaConvocatorias();	    
		$data['listadoPropuestas'] = $this->Propuesta_model->listarPropuesta();
		$data['listadoEstadoPropuesta'] = $this->Propuesta_model->listarEstadoPropuesta();
		$this->load->view('barra');
	    $this->load->view('listaPropuestas', $data);

	}

	/**
	* esta funcion sirve para actualizar las propuestas del modelo propuestas_model
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
	*/
	public function actualizarListaDePropuestas(){

		$this->load->model('propuesta_model');
		if($this->input->post('select_convocatoria') !== null){
			$selectConvocatoria=$this->input->post('select_convocatoria');
		}else{
			$selectConvocatoria='';
		}
		if($this->input->post('titulo') !== null){
			$titulo=$this->input->post('titulo');
		}else{
			$titulo='';
		}
		if($this->input->post('select_estado') !== null){
			$selectEstado=$this->input->post('select_estado');
		}else{
			$selectEstado='';
		}

		$listaDePropuesta= $this->propuesta_model->listarPropuesta($titulo, $selectConvocatoria, $selectEstado);

		$html='<table>
             		<thead>
             			<tr> 
                            <th width="210" style="text-align: center"> Convocatoria </th>
             				<th width="210" style="text-align: center"> T&iacute;tulo </th>
             				<th width="210" style="text-align: center"> Estado </th>
             				<th width="210" style="text-align: center"> Organizaci&oacute;n </th> 
             				<th width="210" style="text-align: center"> Instituci&oacute;n </th>
             				<th width="210" style="text-align: center"> &Aacute;rea de conocimiento</th>
                            <th width="210" style="text-align: center"> Tipo de evaluaci&oacute;n </th>
              			</tr>
             		</thead>
             		<tbody>';
         if($listaDePropuesta=='No hay'){
         	$html.="<tr>";
         		$html.="<td colspan='7' style='text-align: center'>";
					$html.="No se encontraron propuestas con los criterios seleccionados";
				$html.="</td>";
         	$html.="</tr>";
         }else{
	   		foreach ($listaDePropuesta as $resultado) {
				$html.="<tr>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['nombreConvocatoria'];
					$html.="</td>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['titulo'];
					$html.="</td>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['nombreEstado'];
					$html.="</td>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['nombreOrganizacion'];
					$html.="</td>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['nombreInstitucion'];
					$html.="</td>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['areaNombre'];
					$html.="</td>";
					$html.="<td style='text-align: center'>";
						$html.=$resultado['tipoEvaluacionNombre'];
					$html.="</td>";
				$html.="</tr>";
			}
		}
		$html.='</tbody>
		</table>';

		echo $html;
	}
/**
       * Esta funcion sirve para buscar los evaluadores de una propuesta
       * @return evaluadores
       * @param $idPropuesta que representa el id de una de las propuestas
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */

	public function buscarEvaluadores($idPropuesta) {
		//die($idPropuesta); 
		$this->load->model('Propuesta_model');

		if (null !== $this->input->post('select') && $this->input->post('select') == 1) {
				$post1=$this->input->post();
			if(count($post1) > 4) {			
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
				echo "pre";
				print_r($evaluadores);
				echo "/pre";
				if($evaluadores['evaluadores']=='errorSeleccion'){
					$varSeleccion='Por favor indique el valor del criterio de b&uacute;squeda seleccionado';
					$this->session->set_userdata('varSeleccion', $varSeleccion);
				}
				if($evaluadores['evaluadores']=='No hay'){
					$varError='No existen evaluadores que cumplan con todos los criterios seleccionados';
					$this->session->set_userdata('varError', $varError);
				}
				$this->Propuesta_model->buscarIdConvocatoria($idPropuesta);
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

	  /** 
	   * Esta funcion sirve para realizar la busqueda de un evaluador por que el se desea cambiar
       * @return evaluadores
       * @param  $idEv0, $idEv1,$idEv2 que representan los id de los evaluadores que fueron buscados anteriormente, 
       * @param  $idCambiado que es el evaluador que se desea cambiar.
       * @param  $idPropuesta que representa el id de la propuesta a la cual se le desea cambiar el evaluador. 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
    public function cambiarEvaluador($idEv0, $idEv1,$idEv2,$idCambiado,$idPropuesta){

    	$this->load->model('propuesta_model');
    	$this->load->model('evaluadores_model');
    	if (null !== $this->input->post('select') && $this->input->post('select') == 1) {
    			$postAux=$this->input->post();
			if(count($postAux) > 4) {		
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
				$data['evaluadoresNuevos'] = $this->propuesta_model->buscarEvaluadoresCambiado($dataSearch,$idEv0, $idEv1,$idEv2);
				$this->propuesta_model->buscarIdConvocatoria($idPropuesta);
				

				if($data['evaluadoresNuevos'] =='No hay'){
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


	/** 
	   * Esta funcion sirve para listar 3 evaluadores por convocatoria de acuerdo a ciertos criterios, con el evaluador que fue cambiado.
       * @return evaluadores 
       * @param  $idViejo que representa el evaluador que se desea cambiar. 
       * @param  $idPropuesta que representa el id de la propuesta a la cual se le desea listar los evaluadores. 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
	
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

	/** 
	   * Esta funcion sirve para mostrar los datos de una propuesta existente
       * @param  $idPropuesta que representa el id de la propuesta a la cual se le desea listar la informacion. 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */

	public function verPropuesta($idPropuesta){
		$this->load->model('propuesta_model');
		$data['infoPropuesta']=$this->propuesta_model->getPropuesta($idPropuesta);
		$this->load->view('barra');
		$this->load->view('infoPropuesta',$data);

	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */