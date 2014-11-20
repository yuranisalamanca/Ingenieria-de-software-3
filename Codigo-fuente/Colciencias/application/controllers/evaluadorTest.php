<?php 

Class EvaluadorTest extends CI_Controller {

	
	public function test(){
		$this->load->library('unit_test');
		$this->load->model('evaluadores_model');

		$this->unit->run($this->evaluadores_model->listarEvaluadores(),'is_array','Listar evaluadores test');
		$this->unit->run($this->evaluadores_model->listar3EvaluadoresPorPropuesta(1),'is_array','listar3EvaluadoresPorPropuesta test','Se probo que la propuesta retorna un array de 3 evaluadores');
		$this->unit->run($this->evaluadores_model->listaDeEvaluadoresYPropuestas(1),'is_array','Lista de evaluadores y propuestas por convocatoria', 'Se probo que la funcion listaDeEvaluadoresYPropuestas retorne un array');
		$this->unit->run($this->evaluadores_model->listaDeEvaluadoresYPropuestasOrdenado(1,1,2),'is_array','Lista de evaluadores y propuestas por convocatoria ordenadas', 'Se probo que la funcion listaDeEvaluadoresYPropuestasOrdenado retorne un array');
		$this->unit->run($this->evaluadores_model->getEvaluador(1),'is_array','Obtener un evaluador','Se probo que la funcion getEvaluador retorna un string');
		echo $this->unit->report();	
	}


}