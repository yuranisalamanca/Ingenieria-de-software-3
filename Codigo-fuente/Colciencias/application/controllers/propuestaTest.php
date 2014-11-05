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

		$this->unit->run($this->Propuesta_model->listarPropuestaPorEvaluador(4),'is_array','listarPropuestaPorEvaluador test','Se probo con el id de un evaluador que tiene propuestas asignadas');
		$this->unit->run($this->Propuesta_model->listarPropuestaPorEvaluador(2),'is_null','listarPropuestaPorEvaluador test','Se probo con el id de un evaluador que no tiene propuestas asginadas');
		$this->unit->run($this->Propuesta_model->listarPropuestaPorEvaluador(78),'is_null','listarPropuestaPorEvaluador test','Se probo con el id de un evaluador que no existe');

		$this->unit->run($this->Propuesta_model->getIdiomas(),'is_array','getIdiomas test','Lista de idiomas');

		$this->unit->run($this->Propuesta_model->getNiveles(),'is_array','getNiveles test','Lista de los niveles de formacion que puede tener un evaluaor');

		$this->unit->run($this->Propuesta_model->getCiudadPropuesta(1),'is_array','getCiudadPropuesta test','Se probo buscando la ciudad de la propuesta con id 1');
		$this->unit->run($this->Propuesta_model->getCiudadPropuesta(78),'is_null','getCiudadPropuesta test','Se probo buscando la ciudad de una propuesta que no existe');

		$this->unit->run($this->Propuesta_model->getAreaPropuesta(1),'is_array','getAreaPropuesta test','Se probo buscando el area de conocimiento de la propuesta con id 1');
		$this->unit->run($this->Propuesta_model->getAreaPropuesta(78),'is_null','getAreaPropuesta test','Se probo buscando el area de conocimiento de una propuesta que no existe');

		$this->unit->run($this->Propuesta_model->getOrganizacionPropuesta(1),'is_string','getOrganizacionPropuesta test','Se probo buscando la organizacion de la propuesta con id 1');
		$this->unit->run($this->Propuesta_model->getOrganizacionPropuesta(78),'is_null','getOrganizacionPropuesta test','Se probo buscando la organizacion de una propuesta que no existe');

		$this->unit->run($this->Propuesta_model->getGrupoInvestigacionPropuesta(1),'is_string','getGrupoInvestigacionPropuesta test','Se probo buscando el grupo de investigacion de la propuesta con id 1');
		$this->unit->run($this->Propuesta_model->getGrupoInvestigacionPropuesta(78),'is_null','getGrupoInvestigacionPropuesta test','Se probo buscando el grupo de investigacion de una propuesta que no existe');

		$this->unit->run($this->Propuesta_model->getOrganizacionesDiferenteAPropuesta(1),'is_array','getOrganizacionesDiferenteAPropuesta test','Se probo buscando las organizaciones diferentes a la organizacion de id 1');
		//$this->unit->run($this->Propuesta_model->getOrganizacionesDiferenteAPropuesta(78),'is_null','getOrganizacionesDiferenteAPropuesta test','Se probo buscando las organizaciones diferentes a una organzacion que no existe');

		//$this->unit->run($this->Propuesta_model->asignarEvaluador(),'','asignarEvaluador test','');

//verficarEvaluadorConfirmado




	echo $this->unit->report();
	}


	



}