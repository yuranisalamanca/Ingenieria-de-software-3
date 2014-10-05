<?php
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos de la tabla propuesta
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////
Class Propuesta_model extends CI_Model
{

      function __construct(){
            parent::__construct();
            $this->load->database();
      }

       /**
       * esta funcion sirve para listar las propuestas de una convocatoria 
       * @return
       * @param 
       * @author
       */
       public function listarPropuesta()
       {
            $sql="SELECT p.titulo, e.nombre as nombreEstado,o.nombre as nombreOrganizacion,i.nombre as nombreInstitucion,          
                  a.nombre as areaNombre, te.nombre as tipoEvaluacionNombre, p.idPropuesta 
                  FROM propuesta p, organizacion o, institucion i,
                        area_conocimiento a, tipo_evaluacion te, estado_propuesta e 
                  WHERE p.Organizacion_idOrganizacion=o.idOrganizacion 
                        AND p.Estado_propuesta_idEstado_propuesta=e.idEstado_propuesta 
                        AND p.tipo_evaluacion_idtipo_evaluacion=te.idTipo_evaluacion 
                        AND p.Institucion_idInstitucion=i.idInstitucion 
                        AND p.Linea_tematica_idLinea_tematica=lt.idLinea_tematica";

            $query = $this->db->query($sql);
            if($query->num_rows()>0){

                $arreglo=array();
                $cont=0;
                foreach ($query->result() as $resultado) {

                  $arreglo[$cont]['idPropuesta']            = $resultado->idPropuesta;
                  $arreglo[$cont]['titulo']                 = $resultado->titulo;
                  $arreglo[$cont]['nombreEstado']           = $resultado->nombreEstado;
                  $arreglo[$cont]['nombreOrganizacion']     = $resultado->nombreOrganizacion;
                  $arreglo[$cont]['nombreInstitucion']      = $resultado->nombreInstitucion;
                  $arreglo[$cont]['areaNombre']             = $resultado->areaNombre;
                  $arreglo[$cont]['tipoEvaluacionNombre']   = $resultado->tipoEvaluacionNombre;
                  $cont++;
                }
                return $arreglo;
               
            }
      }


            public function listarPropuestasYEvaluadores()
            {
                  $sql="SELECT p.idPropuesta, p.titulo, e.nombre as nombreEstado,o.nombre as nombreOrganizacion,i.nombre as nombreInstitucion,          
                        lt.nombre as lineaNombre, te.nombre as tipoEvaluacionNombre 
                        FROM propuesta p, organizacion o, institucion i,
                              linea_tematica lt, tipo_evaluacion te, estado_propuesta e 
                        WHERE p.Organizacion_idOrganizacion=o.idOrganizacion 
                              AND p.Estado_propuesta_idEstado_propuesta=e.idEstado_propuesta 
                              AND p.tipo_evaluacion_idtipo_evaluacion=te.idTipo_evaluacion 
                              AND p.Institucion_idInstitucion=i.idInstitucion 
                              AND p.Linea_tematica_idLinea_tematica=lt.idLinea_tematica";

                  $query = $this->db->query($sql);
                  if($query->num_rows()>0){

                      $arreglo=array();
                      $cont=0;
                      foreach ($query->result() as $resultado) {

                        $arreglo[$cont]['idPropuesta']            = $resultado->idPropuesta;
                        $arreglo[$cont]['titulo']                 = $resultado->titulo;
                        $arreglo[$cont]['nombreEstado']           = $resultado->nombreEstado;
                        $arreglo[$cont]['nombreOrganizacion']     = $resultado->nombreOrganizacion;
                        $arreglo[$cont]['nombreInstitucion']      = $resultado->nombreInstitucion;
                        $arreglo[$cont]['lineaNombre']            = $resultado->lineaNombre;
                        $arreglo[$cont]['tipoEvaluacionNombre']   = $resultado->tipoEvaluacionNombre;
                        $cont++;
                      }
                      return $arreglo;
                     
            }
       }

      public function buscarEvaluadores($idPropuesta, $data) {

        $where = '';

        if (isset($data['area'])) {
          $where .= ' WHERE ';
        }
       
        $this->db->query("SELECT * FROM evaluador");
      }

         

}
?>