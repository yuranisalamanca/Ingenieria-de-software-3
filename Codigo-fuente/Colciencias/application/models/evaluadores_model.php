<?php
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos de la tabla evaluador
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////
Class Evaluadores_model extends CI_Model
{


       /**
       * esta funcion sirve para construir los objetos de la case CI_Model
       * @return
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
      function __construct(){
            parent::__construct();
            $this->load->database();
      }

       /**
       * esta funcion sirve para listar los evaluadores de Colciencias
       * @return arreglo de evaluadores
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
       public function listarEvaluadores()
       {
            $sql="SELECT e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                          o.nombre as organizacionNombre, a.nombre as areaNombre
                  FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a
                  WHERE e.Nivel_formacion_idNivel_formacion=n.idNivel_formacion 
                  AND   e.organizacion_idOrganizacion=o.idOrganizacion
                  AND   e.area_conocimiento_idArea_conocimiento=a.idArea_conocimiento
                  AND   e.ciudad_idCiudad=c.idCiudad";


            $query = $this->db->query($sql);
            if($query->num_rows()>0){

                $arreglo=array();
                $cont=0;
                foreach ($query->result() as $resultado) {

                  $arreglo[$cont]['nombre']                 = $resultado->nombre;
                  $arreglo[$cont]['cedula']                 = $resultado->cedula;
                  $arreglo[$cont]['ciudadNombre']           = $resultado->ciudadNombre;
                  $arreglo[$cont]['calificacion']           = $resultado->calificacion;
                  $arreglo[$cont]['nvNombre']               = $resultado->nvNombre;
                  $arreglo[$cont]['organizacionNombre']     = $resultado->organizacionNombre;
                  $arreglo[$cont]['areaNombre']             = $resultado->areaNombre;
                  $cont++;
                }
                return $arreglo;
               
            }
      }

      public function listar3EvaluadoresPorPropuesta(){

        $sql="SELECT  ep.Evaluador_idEvaluador FROM evaluacion_propuesta ep";
      }


            
       

         

}
?>