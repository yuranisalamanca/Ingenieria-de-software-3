<?php 

///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de los test de Convocatoria_Model
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////
Class ConvocatoriaTest extends CI_Controller {

	
	public function test(){
		$this->load->library('unit_test');
		$this->load->model('convocatoria_model');

		$this->unit->run($this->convocatoria_model->listaConvocatorias(),'is_array','Listar convocatorias test');
		$this->unit->run($this->convocatoria_model->buscarConvocatoriaPorPropuesta(1),'is_string','Busqueda de convocatoria por propuesta');
		$this->unit->run($this->convocatoria_model->getConvocatoria(1),'is_string','Obtener los datos de una convocatoria');
		
		echo $this->unit->report();	
	}


}