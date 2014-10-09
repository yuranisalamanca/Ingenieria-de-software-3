<?php 
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos de la tabla convocatoria
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////

class Convocatoria_model extends CI_Model
{
	
	/**
       * esta funcion sirve para construir los objetos de la case CI_Model
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
     */
	function __construct()
	{
		parent::__construct();
        $this->load->database();
	}

	/**
       * esta funcion sirve para listar las convocatorias de Colciencias
       * @return arreglo de convocatorias
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
    */
	public function listaConvocatorias()
	{
		$sql = "SELECT c.idConvocatoria,c.nombre as convocatoriaNombre, tc.nombre as tipoConvocatoria, e.nombre as estadoConvocatoria
				FROM Convocatoria c, Tipo_Convocatoria tc, Estado e
				WHERE c.Tipo_Convocatoria_idTipo_Convocatoria = tc.idTipo_Convocatoria 
					AND c.Estado_idEstado = e.idEstado";
		$query = $this->db->query($sql);

		if($query->num_rows()>0)
		{
			$arreglo = array();
			$cont = 0;

			foreach ($query->result() as $resultado) {
				$arreglo[$cont]['idConvocatoria'] = $resultado->idConvocatoria;
				$arreglo[$cont]['convocatoriaNombre'] = $resultado->convocatoriaNombre;
				$arreglo[$cont]['tipoConvocatoria'] = $resultado->tipoConvocatoria;
				$arreglo[$cont]['estadoConvocatoria'] = $resultado->estadoConvocatoria;
				$cont++;
			}
			return $arreglo;
		}
	}
}

 ?>