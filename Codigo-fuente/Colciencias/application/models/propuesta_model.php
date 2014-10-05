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
      }

  public function buscarEvaluadores($idPropuesta, $data) {

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

    $query = $this->db->query("SELECT idEvaluador FROM evaluador e WHERE 1 = 1".$where." LIMIT 0, 3");
    echo "<pre>";
      print_r($query);
      echo "</pre>";die();
    if($query->num_rows()>0){

      $arreglo=array();
      $cont=0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['idEvaluador'] = $resultado->idEvaluador;
        $cont++;
      }
      echo "<pre>";
      print_r($arreglo);
      echo "</pre>";die();
      for ($i=0; $i < count($arreglo); $i++) { 
//        $this->db->query("INSERT INTO evaluacion_propuesta ep");
      } 
    }
  }
}
?>