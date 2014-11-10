<?php
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos de la tabla evaluador
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////
Class Evaluadores_model extends CI_Model{


  /**
   * esta funcion sirve para construir los objetos de la case Evaluadores
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
  * @author Karen Daniela Ramirez Montoya 
  * @author Yurani Alejandra Salamanca 
  */
  public function listarEvaluadores(){
    $sql = "SELECT e.idEvaluador,e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                   o.nombre as organizacionNombre, a.nombre as areaNombre
            FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a
            WHERE e.Nivel_formacion_idNivel_formacion = n.idNivel_formacion 
            AND   e.organizacion_idOrganizacion = o.idOrganizacion
            AND   e.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND   e.ciudad_idCiudad = c.idCiudad";

    $query = $this->db->query($sql);

    if($query->num_rows() > 0){
      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {
        $arreglo[$cont]['idEvaluador']        = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']             = $resultado->nombre;
        $arreglo[$cont]['cedula']             = $resultado->cedula;
        $arreglo[$cont]['ciudadNombre']       = $resultado->ciudadNombre;
        $arreglo[$cont]['calificacion']       = $resultado->calificacion;
        $arreglo[$cont]['nvNombre']           = $resultado->nvNombre;
        $arreglo[$cont]['organizacionNombre'] = $resultado->organizacionNombre;
        $arreglo[$cont]['areaNombre']         = $resultado->areaNombre;
        $cont++;
      }
      return $arreglo;
    }
  }


  /**
  * esta función sirve para listar 3 de los evaluadores de Colciencias
  * @return arreglo de 3 evaluadores
  * @param  $idPropuesta, que representa el id de la propuesta por la cuál se va a buscar
  * @author Karen Daniela Ramirez Montoya 
  * @author Yurani Alejandra Salamanca 
  */
  public function listar3EvaluadoresPorPropuesta($idPropuesta){

    $sql = "SELECT  p.idPropuesta as idPropuesta, p.titulo as tituloPropuesta,e.idEvaluador as idEvaluador, e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                    o.nombre as organizacionNombre, a.nombre as areaNombre
            FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a, evaluacion_propuesta ep, propuesta p
            WHERE  ep.Evaluador_idEvaluador = e.idEvaluador
            AND e.Nivel_formacion_idNivel_formacion = n.idNivel_formacion 
            AND   e.organizacion_idOrganizacion = o.idOrganizacion
            AND   e.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND   e.ciudad_idCiudad = c.idCiudad
            AND   ep.Propuesta_idPropuesta = ".$idPropuesta." AND p.idPropuesta = " .$idPropuesta;

    $query = $this->db->query($sql);
    if($query->num_rows() > 0){
      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {
        $arreglo[$cont]['idPropuesta']        = $resultado->idPropuesta;
        $arreglo[$cont]['tituloPropuesta']    = $resultado->tituloPropuesta;
        $arreglo[$cont]['idEvaluador']        = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']             = $resultado->nombre;
        $arreglo[$cont]['cedula']             = $resultado->cedula;
        $arreglo[$cont]['ciudadNombre']       = $resultado->ciudadNombre;
        $arreglo[$cont]['calificacion']       = $resultado->calificacion;
        $arreglo[$cont]['nvNombre']           = $resultado->nvNombre;
        $arreglo[$cont]['organizacionNombre'] = $resultado->organizacionNombre;
        $arreglo[$cont]['areaNombre']         = $resultado->areaNombre;
        $cont++;
      }
      return $arreglo;           
    }
  }


    
  /**
   * esta funcion sirve para listar las propuestas y respectivos evaluadores que pertenecen a una convocatoria
   * @param $idConvocatoria - El id de la convocatoria de la que se quiere listar las propuestas y los evaluadores
   * @return arreglo con propuestas y evaluadores de una convocatoria
   * @author Karen Daniela Ramirez Montoya 
   * @author Yurani Alejandra Salamanca 
 */
  public function listaDeEvaluadoresYPropuestas($idConvocatoria){

    $sql = "SELECT  p.idPropuesta, ep.iniciarProceso, p.titulo as nombrePropuesta, e.nombre as nombreEvaluador, e.idEvaluador
            FROM evaluacion_propuesta ep, convocatoria c, evaluador e, propuesta p
            WHERE p.idPropuesta = ep.Propuesta_idPropuesta
            AND p.Convocatoria_idConvocatoria = c.idConvocatoria
            AND ep.Evaluador_idEvaluador = e.idEvaluador
            AND ep.esAsignado = 1
            AND ep.esConfirmado = 1
            AND c.idConvocatoria = ".$idConvocatoria;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {
        $arreglo[$cont]['idPropuesta']     = $resultado->idPropuesta;
        $arreglo[$cont]['nombrePropuesta'] = $resultado->nombrePropuesta;
        $arreglo[$cont]['nombreEvaluador'] = $resultado->nombreEvaluador;
        $arreglo[$cont]['idEvaluador']     = $resultado->idEvaluador;
        $arreglo[$cont]['iniciarProceso']  = $resultado->iniciarProceso;
        $cont++;
      }
      return $arreglo;           
    }
  }


  /**
    * esta funcion sirve para listar las propuestas y los evaluadores de una convocatoria de manera ordenada
    * @param $idConvocatoria - El id de la convocatoria de la que se quieren listar las propuestas y los evaluadores
    * @param $ordenarEvaluador - Si se quiere ordenar por evaluador: 1 - de forma ascendente, 2 - de forma descendente
    * @param $ordenarPropuesta - Si se quiere ordenar por propuesta: 1 - de forma ascendente, 2 - de forma descendente
    * @return true si se eliminpo con éxito, false en caso contrario
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function listaDeEvaluadoresYPropuestasOrdenado($idConvocatoria,$ordenarEvaluador = '',$ordenarPropuesta = ''){
    $orden = '';
    if($ordenarPropuesta == 1) {
      $orden = 'ORDER BY nombrePropuesta ASC';
    } else if($ordenarPropuesta == 2) {
      $orden = 'ORDER BY nombrePropuesta DESC';
    } else if($ordenarEvaluador == 1) {
      $orden = 'ORDER BY nombreEvaluador ASC';
    } else if($ordenarEvaluador == 2) {
      $orden = 'ORDER BY nombreEvaluador DESC';
    }
    $sql = "SELECT  p.idPropuesta, ep.iniciarProceso, p.titulo as nombrePropuesta,e.idEvaluador, e.nombre as nombreEvaluador, e.idEvaluador
            FROM evaluacion_propuesta ep, convocatoria c, evaluador e, propuesta p
            WHERE p.idPropuesta = ep.Propuesta_idPropuesta
            AND p.Convocatoria_idConvocatoria = c.idConvocatoria
            AND ep.Evaluador_idEvaluador = e.idEvaluador
            AND ep.esAsignado = 1
            AND ep.esConfirmado = 1
            AND c.idConvocatoria = ".$idConvocatoria.' '.$orden;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0){
      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {
        $arreglo[$cont]['idPropuesta']     = $resultado->idPropuesta;
        $arreglo[$cont]['nombrePropuesta'] = $resultado->nombrePropuesta;
        $arreglo[$cont]['idEvaluador']     = $resultado->idEvaluador;
        $arreglo[$cont]['nombreEvaluador'] = $resultado->nombreEvaluador;
        $arreglo[$cont]['idEvaluador']     = $resultado->idEvaluador;
        $arreglo[$cont]['iniciarProceso']  = $resultado->iniciarProceso;
        $cont++;
      }
      return $arreglo;
    }
  }


  /**
    * esta funcion sirve para eliminar un evaluador de una propuesta
    * @param $idEvaluador - El id del evaluador que se quiere eliminar de la propuesta
    * @param $idPropuesta - El id de la propuesta de la que se quiere eliminar el evaluador
    * @return true si se eliminpo con éxito, false en caso contrario
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function eliminarEvaluador($idEvaluador,$idPropuesta){
    $sql = "DELETE FROM evaluacion_propuesta WHERE Evaluador_idEvaluador = ".$idEvaluador." 
            AND Propuesta_idPropuesta = ".$idPropuesta;
    $query = $this->db->query($sql);
    if($query){
      return true;
    }else{
      return false;
    }
  }
  /**
    * esta funcion sirve para obtener los datos de un evaluador a partir de su id
    * @param $idEvaluador - El id del evaluador del que se quieren obtener los datos
    * @return arreglo con los datos del evaluador
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function getEvaluador($idEvaluador){
    $sql = "SELECT e.idEvaluador,e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                   o.nombre as organizacionNombre, a.nombre as areaNombre
            FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a
            WHERE e.Nivel_formacion_idNivel_formacion = n.idNivel_formacion 
            AND   e.organizacion_idOrganizacion = o.idOrganizacion
            AND   e.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND   e.ciudad_idCiudad = c.idCiudad
            AND   e.idEvaluador = ".$idEvaluador;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0){
      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado){
        $arreglo[$cont]['idEvaluador']        = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']             = $resultado->nombre;
        $arreglo[$cont]['cedula']             = $resultado->cedula;
        $arreglo[$cont]['ciudadNombre']       = $resultado->ciudadNombre;
        $arreglo[$cont]['calificacion']       = $resultado->calificacion;
        $arreglo[$cont]['nvNombre']           = $resultado->nvNombre;
        $arreglo[$cont]['organizacionNombre'] = $resultado->organizacionNombre;
        $arreglo[$cont]['areaNombre']         = $resultado->areaNombre;
        $cont++;
      }
      return $arreglo;
    }
  }


  /**
    * esta funcion sirve para listar los evaluadores de una convocatoria
    * @param $idConvocatoria - El id de la convocatoria de la que se quiere listar los evaluadores
    * @return arreglo con los evaluadores de la convocatoria
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function listarEvaluadoresPorConvocatoria($idConvocatoria)  {
    $sql = "SELECT e.idEvaluador,e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                   o.nombre as organizacionNombre, a.nombre as areaNombre
            FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a, evaluacion_propuesta ep
            WHERE e.Nivel_formacion_idNivel_formacion = n.idNivel_formacion 
            AND   e.organizacion_idOrganizacion = o.idOrganizacion
            AND   e.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND   e.ciudad_idCiudad = c.idCiudad
            AND   e.idEvaluador = ep.Evaluador_idEvaluador
            AND   ep.esConfirmado=1
            AND   ep.esAsignado<>1
            AND   e.Convocatoria_idConvocatoria =".$idConvocatoria;
    $query = $this->db->query($sql);
    if($query->num_rows()>0) {
      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {
        $arreglo[$cont]['idEvaluador']        = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']             = $resultado->nombre;
        $arreglo[$cont]['cedula']             = $resultado->cedula;
        $arreglo[$cont]['ciudadNombre']       = $resultado->ciudadNombre;
        $arreglo[$cont]['calificacion']       = $resultado->calificacion;
        $arreglo[$cont]['nvNombre']           = $resultado->nvNombre;
        $arreglo[$cont]['organizacionNombre'] = $resultado->organizacionNombre;
        $arreglo[$cont]['areaNombre']         = $resultado->areaNombre;
        $cont++;
      }
      return $arreglo;
    }
  }

  /**
    * esta funcion sirve para comprobar si una convocatoria tiene evaluadores relacionados
    * @param $idConvocatoria - El id de la convocatoria de la que se quiere comprobar si tiene evaluadores
    * @return true en caso de que la convocatoria tenga evaluadores, false en caso contrario
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function buscarEvaluadoresPorConvocatoria($idConvocatoria){
    $sql = "SELECT e.idEvaluador,e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                 o.nombre as organizacionNombre, a.nombre as areaNombre
            FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a, evaluacion_propuesta ep
            WHERE e.Nivel_formacion_idNivel_formacion=n.idNivel_formacion 
            AND   e.organizacion_idOrganizacion=o.idOrganizacion
            AND   e.area_conocimiento_idArea_conocimiento=a.idArea_conocimiento
            AND   e.ciudad_idCiudad=c.idCiudad
            AND   e.idEvaluador=ep.Evaluador_idEvaluador
            AND   ep.esConfirmado=1
            AND   e.Convocatoria_idConvocatoria=".$idConvocatoria;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }


  /**
    * esta funcion sirve para marcar como evaluador suplente en una propuesta a un evaluador
    * @param $idEvaluador - El id del evaluador que se quiere marcar como suplente
    * @param $idPropuesta - El id de la propuesta a la que se le quiere asignar el suplente
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function marcarEvaluadorSuplente($idEvaluador, $idPropuesta){
    $sql = "UPDATE evaluacion_propuesta ep SET ep.esSuplente = 1 
            WHERE ep.Evaluador_idEvaluador = ".$idEvaluador." 
            AND ep.Propuesta_idPropuesta = ".$idPropuesta;
    $this->db->query($sql);
  }


  /**
    * esta funcion sirve para comprobar si una convocatoria tiene propuestas y evaluadores relacionados
    * @param $idConvocatoria - El id de la convocatoria de la que se quiere comprobar si tiene propuestas y evaluadores
    * @return true en caso de que la convocatoria tenga propuestas y evaluadores, false en caso contrario
    * @author Karen Daniela Ramirez Montoya 
    * @author Yurani Alejandra Salamanca 
  */
  public function buscarEvaluadoresYPropuestasPorConvocatoria($idConvocatoria) {
    $sql = "SELECT e.idEvaluador,e.nombre, e.cedula, c.nombre as ciudadNombre, e.calificacion, n.nombre as nvNombre, 
                   o.nombre as organizacionNombre, a.nombre as areaNombre
            FROM evaluador e, nivel_formacion n, organizacion o, ciudad c, area_conocimiento a, evaluacion_propuesta ep
            WHERE e.Nivel_formacion_idNivel_formacion=n.idNivel_formacion 
            AND   e.organizacion_idOrganizacion=o.idOrganizacion
            AND   e.area_conocimiento_idArea_conocimiento=a.idArea_conocimiento
            AND   e.ciudad_idCiudad=c.idCiudad
            AND   e.idEvaluador=ep.Evaluador_idEvaluador
            AND   ep.esConfirmado=1
            AND   ep.esAsignado=1
            AND   e.Convocatoria_idConvocatoria=".$idConvocatoria;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

    public function listarPropuestaEvaluador($idEvaluador,$titulo='', $idConvocatoria='', $idEstado=''){
    $where='';
    if ($titulo != '') {
      $where .= ' AND p.titulo LIKE "%' . $titulo.'%"';
    }
    if ($idConvocatoria != '' && $idConvocatoria != 'null' && $idConvocatoria != 0) {
      $where .= ' AND p.Convocatoria_idConvocatoria= ' . $idConvocatoria;
    }
    if ($idEstado != '' && $idEstado != 'null' && $idEstado != 0) {
      $where .= ' AND p.Estado_propuesta_idEstado_propuesta = ' . $idEstado;
    }

    $sql = "SELECT cv.nombre as nombreConvocatoria, ep.Evaluador_idEvaluador as idEvaluador, p.titulo, e.nombre as nombreEstado,o.nombre as nombreOrganizacion,i.nombre as nombreInstitucion,          
                   a.nombre as areaNombre, te.nombre as tipoEvaluacionNombre, p.idPropuesta,ep.Evaluador_idEvaluador as idEvaluador 
            FROM propuesta p, organizacion o, institucion i, area_conocimiento a, tipo_evaluacion te, 
                 estado_propuesta e, evaluacion_propuesta ep, convocatoria cv
            WHERE p.Organizacion_idOrganizacion = o.idOrganizacion 
            AND p.Estado_propuesta_idEstado_propuesta = e.idEstado_propuesta 
            AND p.tipo_evaluacion_idtipo_evaluacion = te.idTipo_evaluacion 
            AND p.Institucion_idInstitucion = i.idInstitucion 
            AND p.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND p.idPropuesta = ep.Propuesta_idPropuesta
            AND ep.esConfirmado = 1
            AND ep.esAsignado = 1
            AND cv.idConvocatoria=p.Convocatoria_idConvocatoria
            AND ep.Evaluador_idEvaluador =".$idEvaluador.$where." order by cv.idConvocatoria";
  
      $query = $this->db->query($sql);
      if($query->num_rows() > 0){
        $arreglo = array();
        $cont = 0;
        foreach ($query->result() as $resultado) {
          $arreglo[$cont]['idPropuesta']          = $resultado->idPropuesta;
          $arreglo[$cont]['titulo']               = $resultado->titulo;
          $arreglo[$cont]['nombreEstado']         = $resultado->nombreEstado;
          $arreglo[$cont]['nombreOrganizacion']   = $resultado->nombreOrganizacion;
          $arreglo[$cont]['nombreInstitucion']    = $resultado->nombreInstitucion;
          $arreglo[$cont]['areaNombre']           = $resultado->areaNombre;
          $arreglo[$cont]['tipoEvaluacionNombre'] = $resultado->tipoEvaluacionNombre;
          $arreglo[$cont]['nombreConvocatoria']   = $resultado->nombreConvocatoria;
          $arreglo[$cont]['idEvaluador']          = $resultado->idEvaluador;
          $cont++;         
        }
        return $arreglo;     
      } else {
        return 'No hay';
      }      
  }
}
?>