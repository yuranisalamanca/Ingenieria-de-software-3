<?php 
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos relacionados con la
//  evaluacion de la propuesta.
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////

class Evaluacion_model extends CI_Model{
	
	/**
    * esta funcion sirve para construir los objetos de la case Evaluacion
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
	function __construct(){
		parent::__construct();
        $this->load->database();
	}

  /**
    * esta funcion sirve para iniciar el proceso de evaluacion
    * @param idPropuesta - el id de la propuesta a la que se le quiere iniciar el proceso de evaluación
    * @param idEvaluador - el id del evaluador que va a realizar el proceso de evaluación
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function iniciarProcesoDeEvaluacion($idPropuesta,$idEvaluador){
  	$sql = "UPDATE evaluacion_propuesta ep SET ep.iniciarProceso = 1
            WHERE ep.Propuesta_idPropuesta = ".$idPropuesta."
            AND ep.Evaluador_idEvaluador = ".$idEvaluador;
  	$query = $this->db->query($sql); 
  }
	
}
?>