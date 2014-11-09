<?php

///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de controlar comunicar la vista con el modelo
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////

class Convocatoria extends CI_Controller{
	
	/**
       * esta funcion sirve para llamar las funciones que vienen del modelo convocatoria_model y 
       * mostrarlas en su respectiva vista.
       * @return arreglo de convocatorias
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listarConvocatorias(){
		$this->load->model('convocatoria_model');
		$data['listadoConvocatorias'] = $this->convocatoria_model->listaConvocatorias();
		$this->load->view('barra');
		$this->load->view('listaConvocatorias',$data);
	}

	

	
}
 ?>