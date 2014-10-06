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

  public function getIdiomas()
  {
    $query = $this->db->query("SELECT * FROM idioma");

    if($query->num_rows()>0){

      $arreglo=array();
      $cont=0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['ididioma'] = $resultado->ididioma;
        $arreglo[$cont]['nombre']   = $resultado->nombre;
        $cont++;
      }
      return $arreglo;
    }
  }

  public function getNiveles()
  {
    $query = $this->db->query("SELECT * FROM nivel_formacion");

    if($query->num_rows()>0){

      $arreglo=array();
      $cont=0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['idNivel_Formacion'] = $resultado->idNivel_Formacion;
        $arreglo[$cont]['Nombre']   = $resultado->Nombre;
        $cont++;
      }
      return $arreglo;
    }
  }


  public function getCiudadPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT ci.idCiudad, ci.nombre FROM ciudad ci, propuesta p 
                      WHERE ci.idCiudad = p.Ciudad_idCiudad AND p.idPropuesta = " . $idPropuesta);
    if($query->num_rows()>0) {
      $data = '';
      foreach ($query->result() as $resultado) {
        $data['nombre'] = $resultado->nombre;
        $data['id'] = $resultado->idCiudad;
      }
      return $data;
    }
  }

  public function getAreaPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT a.idarea_conocimiento, a.nombre FROM area_conocimiento a, propuesta p 
                      WHERE a.idarea_conocimiento = p.area_conocimiento_idarea_conocimiento AND p.idPropuesta = " . $idPropuesta);
    if($query->num_rows()>0) {
      $data = '';
      foreach ($query->result() as $resultado) {
        $data['id'] = $resultado->idarea_conocimiento;
        $data['nombre'] = $resultado->nombre;
        }
      return $data;
    }
  }

  public function getOrganizacionPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT o.idOrganizacion FROM organizacion o, propuesta p 
                      WHERE o.idOrganizacion = p.Organizacion_idOrganizacion AND p.idPropuesta = " . $idPropuesta);
    if($query->num_rows()>0) {
      $id = '';
      foreach ($query->result() as $resultado) {
        $id = $resultado->idOrganizacion;
        }
      return $id;
    }
  }

  public function asignarEvaluador($idPropuesta,$idEvaluador){

        $sql="UPDATE evaluacion_ propuesta e SET e.esConfirmado=1  
            WHERE e.Propuesta_idPropuesta=".$idPropuesta." AND e.Evaluador_idEvaluador=".$idEvaluador;
        $query=$this->query($sql);
  }

  public function verficarEvaluadorConfirmado($idPropuesta)
  {
     $sql="SELECT ep.Evaluador_idEvaluador as idEvaluador FROM evaluacion_propuesta ep WHERE ep.Propuesta_idPropuesta AND ep.esConfirmado=1";
     $query=$this->query($sql);
     if($query->num_rows()>0) {
      $data = '';
      foreach ($query->result() as $resultado) {
        $data['idEvaluador'] = $resultado->idEvaluador;
        }
      return $data;
    }
     return $query;
  }

       /**
       * esta funcion sirve para buscar si la propuesta seleccionada se encuentra en la tabla evaluacion_propuesta
       * @return $idPropuesta
       * @param 
       * @author Karen Daniela Ramirez Montoya 
       * @author Yurani Alejandra Salamanca
       */
      public function buscarPropuestaExistente($idPropuesta){

        $sql="SELECT ep.Propuesta_idPropuesta as idPropuesta from evaluacion_propuesta ep WHERE ep.Propuesta_idPropuesta= ".$idPropuesta;
        $query=$this->db->query($sql);

         if($query->num_rows()>0){
                return true;
          }else{
              return false;
          }  
      }


        

         

  public function buscarEvaluadores($idPropuesta, $data) {

    /*echo "<pre>";
    print_r($data);
    echo "</pre>";die();*/
    $where = '';

    if ($data['area'] != 0 && $data['select_area'] != 0) {
      $where .= ' AND e.area_conocimiento_idarea_conocimiento = ' . $data['select_area'];
    }
    if ($data['calificacion'] != 0 && $data['select_calificacion'] != 0) {
      $where .= ' AND e.calificacion = ' . $data['select_calificacion'];
    }
    if ($data['ciudad'] != 0 && $data['select_ciudad'] != 0) {
      $where .= ' AND e.Ciudad_idCiudad = ' . $data['select_ciudad'];
    }
    if ($data['nivel'] != 0 && $data['select_nivel'] != 0) {
      $where .= ' AND e.Nivel_Formacion_idNivel_Formacion = ' . $data['select_nivel'];
    }
    if ($data['idioma'] != 0 && $data['select_idioma'] != 0) {
      $where .= ' AND e.idioma_ididioma = ' . $data['select_idioma'];
    }

    $query = $this->db->query("SELECT e.idEvaluador, e.Ciudad_idCiudad FROM evaluador e WHERE e.Organizacion_idOrganizacion <> ".$data['select_organizacion'].$where." LIMIT 0, 3");
    
    if($query->num_rows()>0){

      $arreglo=array();
      $cont=0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['idEvaluador'] = $resultado->idEvaluador;
        $arreglo[$cont]['ciudad'] = $resultado->Ciudad_idCiudad;
        $cont++;
      }
      for ($i=0; $i < count($arreglo); $i++) { 
        $this->db->query("INSERT INTO evaluacion_propuesta (Ciudad_idCiudad, Evaluador_idEvaluador, Propuesta_idPropuesta)
                          VALUES (".$arreglo[$i]['ciudad'].", ".$arreglo[$i]['idEvaluador'].", ".$idPropuesta.")");
      } 
    }
  }


  public function listarEvaluadoresTodos($idEv0, $idEv1,$idEv2){

    $sql="SELECT e.idEvaluador,e.nombre from evaluador e 
          where e.idEvaluador<>".$idEv0." AND e.idEvaluador<>".$idEv1." AND e.idEvaluador<>".$idEv2;
    $query=$this->db->query($sql);
    $arreglo=array();
    $cont=0;
    if($query->num_rows()>0){

      foreach ($query->result() as $resultado) {
       
        $arreglo[$cont]['idEvaluador'] = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']      = $resultado->nombre;
        $cont++;
      }
      return $arreglo;
    }
  }

  public function cambiarEvaluador($idCambiado,$idEvalNuevo,$idPropuesta)
  {
    $sql="UPDATE evaluacion_propuesta e SET e.Evaluador_idEvaluador=".$idEvalNuevo." WHERE e.Evaluador_idEvaluador=".$idCambiado." AND e.Propuesta_idPropuesta=".$idPropuesta;
    $query=$this->db->query($sql);
  }
}
?>