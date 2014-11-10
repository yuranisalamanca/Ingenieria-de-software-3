<?php 
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos de la tabla convocatoria
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////

class Convocatoria_model extends CI_Model{
	
	/**
       * esta funcion sirve para construir los objetos de la case Convocatoria
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
     */
	function __construct(){
		parent::__construct();
        $this->load->database();
	}

	/**
       * esta funcion sirve para listar las convocatorias de Colciencias
       * @return arreglo de convocatorias
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listaConvocatorias(){
		$sql = "SELECT c.idConvocatoria,c.nombre as convocatoriaNombre, tc.nombre as tipoConvocatoria, e.nombre as estadoConvocatoria
				FROM Convocatoria c, Tipo_Convocatoria tc, Estado e
				WHERE c.Tipo_Convocatoria_idTipo_Convocatoria = tc.idTipo_Convocatoria 
				AND c.Estado_idEstado = e.idEstado
				AND c.Estado_idEstado = 2";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			$arreglo = array();
			$cont = 0;
			foreach ($query->result() as $resultado) {

				$arreglo[$cont]['idConvocatoria'] 	  = $resultado->idConvocatoria;
				$arreglo[$cont]['convocatoriaNombre'] = $resultado->convocatoriaNombre;
				$arreglo[$cont]['tipoConvocatoria']   = $resultado->tipoConvocatoria;
				$arreglo[$cont]['estadoConvocatoria'] = $resultado->estadoConvocatoria;
				$cont++;
			}
			return $arreglo;
		}
	}


	/**
       * esta funcion sirve para buscar la convocatoria a la que pertenece una propuesta
       * @param $idPropuesta - El id de la propuesta de la que se quiere conocer la convocatoria
       * @return el id de la convocatoria buscada
       * @author Karen Daniela Ramirez Montoya 
 	   * @author Yurani Alejandra Salamanca 
    */
	public function buscarConvocatoriaPorPropuesta($idPropuesta){
		$sql = "SELECT c.idConvocatoria FROM convocatoria c, propuesta p
			  	WHERE p.Convocatoria_idConvocatoria = c.idConvocatoria
			  	AND p.idPropuesta = ".$idPropuesta;
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			$idConvocatoria = '';
			foreach ($query->result() as $resultado) {
				$idConvocatoria = $resultado->idConvocatoria;
			}
			return $idConvocatoria;
		}
	}


	/**
       * esta funcion sirve para obtener el nombre de una convocatoria a partir de su id
       * @param $idConvocatoria - El id de la convocatoria de la que se quiere conocer el nombre
       * @return el nombre de la convocatoria
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
     */
	public function getConvocatoria($idConvocatoria){
		$sql = "SELECT c.nombre FROM convocatoria c, propuesta 
			  	WHERE c.idConvocatoria = ".$idConvocatoria;
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$nombreConvocatoria = '';
			foreach ($query->result() as $resultado) {
				$nombreConvocatoria = $resultado->nombre;
			}
			return $nombreConvocatoria;
		}
	}

	/**
       * esta funcion sirve para listar las convocatorias que tiene propuestas con evaluaciones
       * @param $idAnio. Anio de creacion de las convocatorias
       * @return $arreglo. Lista de convocatorias
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
     */
	public function convocatoriasPorAnio($anio)
	{
		$sql = "SELECT titulo FROM Convocatorias WHERE anioCreacion =".$anio." AND Estado_idEstado= 2"
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$arreglo = array();
			$cont = 0;
			foreach ($query->result() as $resultado) {
				$arreglo[$cont]['tituloConvocatoria'] = $resultado->titulo;
				$cont++;
			}
			return $arreglo;
		}
	}
}
?>