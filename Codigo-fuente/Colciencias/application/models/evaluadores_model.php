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
            $sql="SELECT e.idEvaluador,e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
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
                  $arreglo[$cont]['idEvaluador']            = $resultado->idEvaluador;
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


       /**
       * esta función sirve para listar 3 de los evaluadores de Colciencias
       * @return arreglo de 3 evaluadores
       * @param  $idPropuesta, que representa el id de la propuesta por la cúal se va a buscar
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca 
       */
      public function listar3EvaluadoresPorPropuesta($idPropuesta){

        $sql="SELECT  p.idPropuesta as idPropuesta, p.titulo as tituloPropuesta,e.idEvaluador as idEvaluador, e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                       o.nombre as organizacionNombre, a.nombre as areaNombre
                      FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a, evaluacion_propuesta ep, propuesta p
                      WHERE  ep.Evaluador_idEvaluador=e.idEvaluador
                      AND e.Nivel_formacion_idNivel_formacion=n.idNivel_formacion 
                      AND   e.organizacion_idOrganizacion=o.idOrganizacion
                      AND   e.area_conocimiento_idArea_conocimiento=a.idArea_conocimiento
                      AND   e.ciudad_idCiudad=c.idCiudad
                      AND   ep.Propuesta_idPropuesta=".$idPropuesta." AND p.idPropuesta=" .$idPropuesta;

          $query=$this->db->query($sql);
         if($query->num_rows()>0){

                $arreglo=array();
                $cont=0;
                foreach ($query->result() as $resultado) {
                  $arreglo[$cont]['idPropuesta']            = $resultado->idPropuesta;
                  $arreglo[$cont]['tituloPropuesta']        = $resultado->tituloPropuesta;
                  $arreglo[$cont]['idEvaluador']            = $resultado->idEvaluador;
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


    

      public function listaDeEvaluadoresYPropuestas($idConvocatoria)
      {
        $sql="SELECT  p.idPropuesta, ep.iniciarProceso, p.titulo as nombrePropuesta, e.nombre as nombreEvaluador, e.idEvaluador
              FROM evaluacion_propuesta ep, convocatoria c, evaluador e, propuesta p
              WHERE p.idPropuesta=ep.Propuesta_idPropuesta
              AND p.Convocatoria_idConvocatoria=c.idConvocatoria
              AND ep.Evaluador_idEvaluador=e.idEvaluador
              AND ep.esAsignado=1
              AND ep.esConfirmado=1
              AND c.idConvocatoria=".$idConvocatoria;

        $query=$this->db->query($sql);
        if($query->num_rows()>0){

            $arreglo=array();
            $cont=0;
            foreach ($query->result() as $resultado) {
              $arreglo[$cont]['idPropuesta']            = $resultado->idPropuesta;
              $arreglo[$cont]['nombrePropuesta']        = $resultado->nombrePropuesta;
              $arreglo[$cont]['nombreEvaluador']        = $resultado->nombreEvaluador;
              $arreglo[$cont]['idEvaluador']            = $resultado->idEvaluador;
              $arreglo[$cont]['iniciarProceso']         = $resultado->iniciarProceso;
              $cont++;
            }
            return $arreglo;           
        }
      }

      public function listaDeEvaluadoresYPropuestasOrdenado($idConvocatoria,$ordenarEvaluador='',$ordenarPropuesta='')
      {
        $orden='';
        if($ordenarPropuesta==1){
          $orden='order by nombrePropuesta asc';
        }else if($ordenarPropuesta==2){
          $orden='order by nombrePropuesta desc';
        }else if($ordenarEvaluador==1){
          $orden='order by nombreEvaluador asc';
        }else if($ordenarEvaluador==2){
          $orden='order by nombreEvaluador desc';
        }
        $sql="SELECT  p.idPropuesta, ep.iniciarProceso, p.titulo as nombrePropuesta, e.nombre as nombreEvaluador, e.idEvaluador
              FROM evaluacion_propuesta ep, convocatoria c, evaluador e, propuesta p
              WHERE p.idPropuesta=ep.Propuesta_idPropuesta
              AND p.Convocatoria_idConvocatoria=c.idConvocatoria
              AND ep.Evaluador_idEvaluador=e.idEvaluador
              AND ep.esAsignado=1
              AND ep.esConfirmado=1
              AND c.idConvocatoria=".$idConvocatoria.' '.$orden;

        $query=$this->db->query($sql);
        if($query->num_rows()>0){

            $arreglo=array();
            $cont=0;
            foreach ($query->result() as $resultado) {
              $arreglo[$cont]['idPropuesta']            = $resultado->idPropuesta;
              $arreglo[$cont]['nombrePropuesta']        = $resultado->nombrePropuesta;
              $arreglo[$cont]['nombreEvaluador']        = $resultado->nombreEvaluador;
              $arreglo[$cont]['idEvaluador']            = $resultado->idEvaluador;
              $arreglo[$cont]['iniciarProceso']         = $resultado->iniciarProceso;
              $cont++;
            }
            return $arreglo;           
        }
      }

      public function eliminarEvaluador($idEvaluador,$idPropuesta){
        $sql="DELETE from evaluacion_propuesta where Evaluador_idEvaluador=".$idEvaluador." AND Propuesta_idPropuesta=".$idPropuesta;
        $query=$this->db->query($sql);

        if($query){
          return true;
        }else{
          return false;
        }
      }
            
       

         

}
?>