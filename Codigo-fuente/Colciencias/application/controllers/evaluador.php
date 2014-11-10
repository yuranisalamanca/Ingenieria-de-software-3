<?php 


///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de controlar y comunicar la vista con el modelo
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////
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
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
		public function listaDeEvaluadores(){

			$this->load->model('evaluadores_model');
		    
			$data['listarEvaluadores'] = $this->evaluadores_model->listarEvaluadores();
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
		$data['idPropuesta']                 = $idPropuesta;
		$data['listar3EvaluadoresPropuesta'] = $this->evaluadores_model->listar3EvaluadoresPorPropuesta($idPropuesta);

		for($i=0; $i<count($data['listar3EvaluadoresPropuesta']);$i++) {
			$data['idEv'.$i] = $data['listar3EvaluadoresPropuesta'][$i]['idEvaluador'];
		}
		if(!isset($data['idEv0'])){
			$data['idEv0']=0;
		}
		if(!isset($data['idEv1'])){
			$data['idEv1']=0;
		}
		if(!isset($data['idEv2'])){
			$data['idEv2']=0;
		}

		$data['evaluadorEliminado'] = $eliminado;
		$data['idConfirmado']       = $this->propuesta_model->verficarEvaluadorConfirmado($idPropuesta);
		$data['idSuplente']         = $this->propuesta_model->verficarEvaluadorSuplente($idPropuesta);
		$this->load->view('barra');
	    $this->load->view('lista3EvaluadoresPropuesta',$data);
	}
	/**
       * esta funcion sirve para llamar al modelo la funcion asignarEvaluador
       * @param $idPropuesta El cual representa la propuesta que va a ser asignada a cierto evaluador
       * @param $idEvaluador. El cual representa el evaluador que va a ser asignado a cierta propuesta
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
  	public function asignarEvaluador($idPropuesta,$idEvaluador){
		$this->load->model('propuesta_model');
		$this->propuesta_model->asignarEvaluador($idPropuesta,$idEvaluador);
		$this->listar3EvaluadoresPorPropuesta($idPropuesta);

	}

	/**
       * esta funcion sirve para llamar al modelo la funcion listarPropuestasPorEvaluador
       * @param $idEvaluador. El cual representa el evaluador del cual se quieren obtener las propuestas
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listarPropuestaPorEvaluador($idEvaluador){
		$this->load->model('propuesta_model');
		$data['listarPropuestasEvaluador'] = $this->propuesta_model->listarPropuestaPorEvaluador($idEvaluador);
		$this->load->view('barra');
		$this->load->view('listaPropuestasPorEvaluador', $data);
	}

	/**
       * esta funcion sirve para llamar al modelo la funcion listarPropuestasTodosEvaluadores
       * @param $idEvaluador. El cual representa el evaluador del cual se quieren obtener las propuestas
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listarPropuestasTodosEvaluadores($idEvaluador){
		$this->load->model('propuesta_model');
		$data['listarPropuestasTodosEvaluadores'] = $this->propuesta_model->listarPropuestaPorEvaluador($idEvaluador);
		$this->load->view('barra');
		$this->load->view('listaPropuestasTodosEvaluadores',$data);
	}

	/**
       * esta funcion sirve para mostrar las propuestas y evaluadores de una convocatoria
       * @param $idConvocatoria. Representa el id de la convocatoria del cual se quieren obtener las propuestas y los evaluadores
       * @param $ordenarEvaluador. Variable para ordenar los evaluadores
       * @param $ordenarPropuesta. Variable para ordenar las propuestas
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listaDePropuestasYEvaluadoresOrdenado($idConvocatoria,$ordenarEvaluador='',$ordenarPropuesta=''){
		$this->load->model('evaluadores_model');
		$this->load->model('convocatoria_model');
		$data['nombreConvocatoria']=$this->convocatoria_model->getConvocatoria($idConvocatoria);
		$data['evaluadoresYPropuestasEncontrados']=$this->evaluadores_model->buscarEvaluadoresYPropuestasPorConvocatoria($idConvocatoria);
		$data['listaPropuestasYEvaluadores'] = $this->evaluadores_model->listaDeEvaluadoresYPropuestasOrdenado($idConvocatoria,$ordenarEvaluador,$ordenarPropuesta);
		$data['ordenarEvaluador'] = $ordenarEvaluador;
		$data['ordenarPropuesta'] = $ordenarPropuesta;
		$data['idConvocatoria']	  = $idConvocatoria;
		$this->load->view('barra');
		$this->load->view('listaDePropuestasYEvaluadores',$data);
	}

	/**
       * esta funcion sirve para llamar la funcion iniciarProcesoDeEvaluacion 
       * @param $idPropuesta. Representa la propuesta de la cual se quiere iniciar el proceso de evaluacion
       * @param $idEvaluador. Representa el evaluador que tiene asignado la propuesta que va iniciar proceso de evaluacion 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function iniciarProcesoDeEvaluacion($idPropuesta, $idEvaluador){
		$this->load->model('convocatoria_model');
		$this->load->model('evaluacion_model');
		$this->load->model('evaluadores_model');
		$this->evaluacion_model->iniciarProcesoDeEvaluacion($idPropuesta,$idEvaluador);
		$idConvocatoria = $this->convocatoria_model->buscarConvocatoriaPorPropuesta($idPropuesta);
		$this->listaDePropuestasYEvaluadoresOrdenado($idConvocatoria);		
	}

	/**
       * esta funcion sirve para llamar la funcion eliminar evaluador de Evaluadores_model
       * @param $idEvaluador. Representa el evaluador que se va a eliminar de la asignacion a una propuesta 
       * @param $idPropuesta. Representa la propuesta que tenia el evaluador asignada
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function eliminarEvaluador($idEvaluador,$idPropuesta){
		$this->load->model('evaluadores_model');
		$eliminado=$this->evaluadores_model->eliminarEvaluador($idEvaluador,$idPropuesta);
		$this->listar3EvaluadoresPorPropuesta($idPropuesta,$eliminado);
	}

	/**
       * esta funcion sirve para ver la informacion de un evaluador, para esto se debe llama la funcion getEvaluador
       * del modelo evaluadores_model
       * @param $idEvaluador. Representa el evaluador del cual se quiere obtener la informacion
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function verEvaluador($idEvaluador){
		$this->load->model('evaluadores_model');
		$data['infoEvaluador']=$this->evaluadores_model->getEvaluador($idEvaluador);
		$this->load->view('barra');
		$this->load->view('infoEvaluador',$data);
	}

	/**
       * esta funcion sirve para listar los evaluadores de una convocatoria, para esto se debe llamar la funcion 
       * buscarEvaluadoresPorConvocatoria del modelo evaluadores_model
       * @param $idConvocatoria. Representa la convocatoria de la cual se quiere obtener los evaluadores
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listaDeEvaluadoresPorConvocatoria($idConvocatoria){

		$this->load->model('evaluadores_model');
		$this->load->model('convocatoria_model');
		$data['evaluadoresEncontrados']=$this->evaluadores_model->buscarEvaluadoresPorConvocatoria($idConvocatoria);
		$data['nombreConvocatoria']=$this->convocatoria_model->getConvocatoria($idConvocatoria);	    
		$data['listarEvaluadores'] = $this->evaluadores_model->listarEvaluadoresPorConvocatoria($idConvocatoria);
		$this->load->view('barra');
	    $this->load->view('listaEvaluadoresPorConvocatoria', $data);
	}

	/**
       * esta funcion sirve para marcar un evaluador como suplente, para esto se debe llamar a la funcion marcarEvaluadorSuplente
       * del modelo evaluadores_model
       * @param $idEvaluador. Representa el evaluador que se quiere marcar como suplente
       * @param $idPropuesta. Representa la propuesta a la cual se le va a asignar un evaluador suplente
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function marcarComoSuplente($idEvaluador, $idPropuesta){
		$this->load->model('evaluadores_model');
		$this->evaluadores_model-> marcarEvaluadorSuplente($idEvaluador, $idPropuesta);
		$this->listar3EvaluadoresPorPropuesta($idPropuesta);
	}

	public function listaPropuestasEvaluador(){

		$this->load->model('evaluadores_model');
		$this->load->model('Propuesta_model');
		$this->load->model('convocatoria_model');

		$session_data = $this->session->userdata('logged_in');
		$idEvaluador=$session_data['id'];
		$data['listadoPropuestas'] = $this->evaluadores_model->listarPropuestaEvaluador($idEvaluador);
		$data['listadoConvocatoriasBusqueda'] = $this->convocatoria_model->listaConvocatorias();
		$data['listadoEstadoPropuesta'] = $this->Propuesta_model->listarEstadoPropuesta();
		$this->load->view('barraEvaluador');
		$this->load->view('listaPropuestasEvaluador',$data);
	}

	public function actualizarListaDePropuestasEvaluador(){

		$this->load->model('evaluadores_model');
		if($this->input->post('select_convocatoria') !== null){
			$select_convocatoria=$this->input->post('select_convocatoria');
		}else{
			$select_convocatoria='';
		}
		if($this->input->post('titulo') !== null){
			$titulo=$this->input->post('titulo');
		}else{
			$titulo='';
		}
		if($this->input->post('select_estado') !== null){
			$select_estado=$this->input->post('select_estado');
		}else{
			$select_estado='';
		}
		$session_data = $this->session->userdata('logged_in');
		$idEvaluador=$session_data['id'];
		$listaDePropuesta= $this->evaluadores_model->listarPropuestaEvaluador($idEvaluador,$titulo, $select_convocatoria, $select_estado);

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
         		$html.="<td colspan='9' style='text-align: center'>";
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

}
