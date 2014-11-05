<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class PropuestaTest extends CI_Controller {
	public function test()
	{
		$this->load->library('unit_test');
		$this->load->model('Propuesta_model');
		$this->unit->run($this->Propuesta_model->listarPropuesta(),'is_array','Lista de propuestas');
	

		$this->unit->run($this->Propuesta_model->listarPropuestaPorConvocatoria(1),'is_array','listarPropuestaPorConvocatoria test','Se probo que la convocatoria con id 0 tiene propuestas');
		$this->unit->run($this->Propuesta_model->listarPropuestaPorConvocatoria(24),'is_null','listarPropuestaPorConvocatoria test','Se probo con un id de una convocatoria no existente');
		$this->unit->run($this->Propuesta_model->listarPropuestaPorConvocatoria(8),'is_null','listarPropuestaPorConvocatoria test','Se probo con un id de una convocatoria que no tiene propuestas');

	echo $this->unit->report();
	}


	



}