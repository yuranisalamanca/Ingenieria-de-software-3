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
                        AND p.area_conocimiento_idArea_conocimiento=a.idArea_conocimiento";

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

       /**
       * esta funcion sirve para buscar si la propuesta seleccionada se encuentra en la tabla evaluacion_propuesta
       * @return $idPropuesta
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca
       */
      public buscarPropuestaEvistenteEvaPro($idPropuesta){

        $sql="SELECT ep.Propuesta_idPropuesta as idPropuesta from evaluacion_propuesta ep WHERE ep.Propuesta_idPropuesta= ".$idPropuesta;
        $this->db->query($sql);

         if($query->num_rows()>0){

                $arreglo=array();
                $cont=0;
                foreach ($query->result() as $resultado) {

                  $arreglo[$cont]['idPropuesta']= $resultado->idPropuesta;
                  $cont++;
          }
                return $arreglo;


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