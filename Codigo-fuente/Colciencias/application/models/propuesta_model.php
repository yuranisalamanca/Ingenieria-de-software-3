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
  * esta funcion sirve para listar las propuestas
  * @return arreglo de propuestas
  * @author Karen Daniela Ramirez Montoya 
  * @author Yurani Alejandra Salamanca
  */
  public function listarPropuesta()
  {
    $sql = "SELECT p.titulo, e.nombre as nombreEstado,o.nombre as nombreOrganizacion,i.nombre as nombreInstitucion,          
                   a.nombre as areaNombre, te.nombre as tipoEvaluacionNombre, p.idPropuesta 
            FROM propuesta p, organizacion o, institucion i,
                 area_conocimiento a, tipo_evaluacion te, estado_propuesta e 
            WHERE p.Organizacion_idOrganizacion=o.idOrganizacion 
            AND p.Estado_propuesta_idEstado_propuesta=e.idEstado_propuesta 
            AND p.tipo_evaluacion_idtipo_evaluacion=te.idTipo_evaluacion 
            AND p.Institucion_idInstitucion=i.idInstitucion 
            AND p.area_conocimiento_idArea_conocimiento=a.idArea_conocimiento";

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
        $cont++;
      }
      return $arreglo;
    }
  }

  /**
  * esta funcion sirve para listar las propuestas de una convocatoria 
  * @param $idConvocatoria - el id de la convocatoria de la cual se quiere listar las propuestas
  * @return arreglo de propuestas
  * @author Karen Daniela Ramirez Montoya 
  * @author Yurani Alejandra Salamanca
  */
  public function listarPropuestaPorConvocatoria($idConvocatoria)
  {
    $sql = "SELECT c.idConvocatoria as idConvocatoria,p.titulo,e.nombre as nombreEstado,o.nombre as nombreOrganizacion,i.nombre as nombreInstitucion,          
                   a.nombre as areaNombre, te.nombre as tipoEvaluacionNombre, p.idPropuesta 
            FROM propuesta p, organizacion o, institucion i, area_conocimiento a, tipo_evaluacion te, 
                 estado_propuesta e, convocatoria c 
            WHERE p.Organizacion_idOrganizacion = o.idOrganizacion 
            AND p.Estado_propuesta_idEstado_propuesta = e.idEstado_propuesta 
            AND p.tipo_evaluacion_idtipo_evaluacion = te.idTipo_evaluacion 
            AND p.Institucion_idInstitucion = i.idInstitucion 
            AND p.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND p.Convocatoria_idConvocatoria = c.idConvocatoria
            AND p.Estado_propuesta_idEstado_propuesta = 1
            AND p.tipo_evaluacion_idtipo_evaluacion = 4
            AND c.idConvocatoria = ".$idConvocatoria;

    $query = $this->db->query($sql);
    if($query->num_rows() > 0){

      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {
       
        $arreglo[$cont]['idConvocatoria']       = $resultado->idConvocatoria;
        $arreglo[$cont]['idPropuesta']          = $resultado->idPropuesta;
        $arreglo[$cont]['titulo']               = $resultado->titulo;
        $arreglo[$cont]['nombreEstado']         = $resultado->nombreEstado;
        $arreglo[$cont]['nombreOrganizacion']   = $resultado->nombreOrganizacion;
        $arreglo[$cont]['nombreInstitucion']    = $resultado->nombreInstitucion;
        $arreglo[$cont]['areaNombre']           = $resultado->areaNombre;
        $arreglo[$cont]['tipoEvaluacionNombre'] = $resultado->tipoEvaluacionNombre;
        $cont++;
      }
      return $arreglo;

    }
  }

  /**
  * esta funcion sirve para listar las propuestas de un evaluador
  * @param $idEvaluador - el id del evaluador del que se quieren listar las propuestas
  * @return arreglo de propuestas
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function listarPropuestaPorEvaluador($idEvaluador)
  {
    $sql = "SELECT p.titulo, e.nombre as nombreEstado,o.nombre as nombreOrganizacion,i.nombre as nombreInstitucion,          
                   a.nombre as areaNombre, te.nombre as tipoEvaluacionNombre, p.idPropuesta,ep.Evaluador_idEvaluador as idEvaluador 
            FROM propuesta p, organizacion o, institucion i, area_conocimiento a, tipo_evaluacion te, 
                 estado_propuesta e, evaluacion_propuesta ep 
            WHERE p.Organizacion_idOrganizacion = o.idOrganizacion 
            AND p.Estado_propuesta_idEstado_propuesta = e.idEstado_propuesta 
            AND p.tipo_evaluacion_idtipo_evaluacion = te.idTipo_evaluacion 
            AND p.Institucion_idInstitucion = i.idInstitucion 
            AND p.area_conocimiento_idArea_conocimiento = a.idArea_conocimiento
            AND p.idPropuesta = ep.Propuesta_idPropuesta
            AND ep.esConfirmado = 1
            AND ep.Evaluador_idEvaluador = ".$idEvaluador;

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
        $arreglo[$cont]['idEvaluador']          = $resultado->idEvaluador;
        $cont++;
      }
      return $arreglo;
    }
  }

  /**
  * Esta función sirve para listar los idiomas
  * @return arreglo con los idiomas
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getIdiomas()
  {
    $query = $this->db->query("SELECT * FROM idioma");

    if($query->num_rows() > 0){

      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['ididioma'] = $resultado->ididioma;
        $arreglo[$cont]['nombre']   = $resultado->nombre;
        $cont++;
      }
      return $arreglo;
    }
  }



  /**
  * Esta función sirve para listar los niveles de formacion
  * @return arreglo con los niveles de formacion
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getNiveles()
  {
    $query = $this->db->query("SELECT * FROM nivel_formacion");

    if($query->num_rows() > 0){

      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['idNivel_Formacion'] = $resultado->idNivel_Formacion;
        $arreglo[$cont]['Nombre']            = $resultado->Nombre;
        $cont++;
      }
      return $arreglo;
    }
  }


  /**
  * Esta función sirve para obtener la ciudad de una propuesta
  * @param $idPropuesta - el id de la propuesta de la que se quiere obtener la ciudad
  * @return arreglo con los datos de la ciudad
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getCiudadPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT ci.idCiudad, ci.nombre FROM ciudad ci, propuesta p 
                      WHERE ci.idCiudad = p.Ciudad_idCiudad AND p.idPropuesta = " . $idPropuesta);
    if($query->num_rows() > 0) {
      $data = '';
      foreach ($query->result() as $resultado) {
        $data['nombre'] = $resultado->nombre;
        $data['id']     = $resultado->idCiudad;
      }
      return $data;
    }
  }


  /**
  * Esta función sirve para obtener el area de conocimiento de una propuesta
  * @param $idPropuesta - el id de la propuesta de la que se quiere obtener el area de conocimiento
  * @return arreglo con los datos del area de conocimiento
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getAreaPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT a.idarea_conocimiento, a.nombre FROM area_conocimiento a, propuesta p 
                      WHERE a.idarea_conocimiento = p.area_conocimiento_idarea_conocimiento AND p.idPropuesta = " . $idPropuesta);
    if($query->num_rows() > 0) {
      $data = '';
      foreach ($query->result() as $resultado) {
        $data['id']     = $resultado->idarea_conocimiento;
        $data['nombre'] = $resultado->nombre;
        }
      return $data;
    }
  }


  /**
  * Esta función sirve para obtener la organizacion de una propuesta
  * @param $idPropuesta - el id de la propuesta de la que se quiere obtener la organizacion
  * @return id de la organizacion
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getOrganizacionPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT Organizacion_idOrganizacion FROM propuesta WHERE idPropuesta = " . $idPropuesta);
    if($query->num_rows() > 0) {
      $id = '';
      foreach ($query->result() as $resultado) {
        $id = $resultado->Organizacion_idOrganizacion;
        }
      return $id;
    }
  }



  /**
  * Esta función sirve para obtener el grupo de investigacion de una propuesta
  * @param $idPropuesta - el id de la propuesta de la que se quiere obtener el grupo de investigacion
  * @return id del grupo de investigacion
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getGrupoInvestigacionPropuesta($idPropuesta)
  {
    $query = $this->db->query("SELECT grupoinvestigacion_idgrupoInvestigacion FROM propuesta WHERE idPropuesta = " . $idPropuesta);
    if($query->num_rows() > 0) {
      $id = '';
      foreach ($query->result() as $resultado) {
        $id = $resultado->grupoinvestigacion_idgrupoInvestigacion;
        }
      return $id;
    }
  }



  /**
  * Esta función sirve para obtener las organizaciones que son diferentes a la de una propuesta
  * @param $idOrganizacion - el id de la organiacion de una propuesta
  * @return arreglo con las organizaciones diferentes a la recibida por parametro
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getOrganizacionesDiferenteAPropuesta($idOrganizacion)
  {
    $query = $this->db->query("SELECT o.idOrganizacion, o.nombre FROM organizacion o 
                      WHERE o.idOrganizacion <> " . $idOrganizacion);
    if($query->num_rows() > 0) {
      $arreglo = array();
      $i = 0;
      foreach ($query->result() as $resultado) {
        $arreglo[$i]['idOrganizacion'] = $resultado->idOrganizacion;
        $arreglo[$i]['nombre']         = $resultado->nombre;
        $i++;
        }
      return $arreglo;
    }
  }



  /**
  * Esta función sirve para asignar un evaluador a una propuesta
  * @param $idPropuesta - el id de la propuesta a la que se le va a asignar el evaluador
  * @param $idEvaluador - el id del evaluador que se va a asignar a la propuesta
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function asignarEvaluador($idPropuesta,$idEvaluador){

        $sql = "UPDATE evaluacion_propuesta e SET e.esConfirmado = 1  
                WHERE e.Propuesta_idPropuesta = ".$idPropuesta." AND e.Evaluador_idEvaluador = ".$idEvaluador;
        $query = $this->db->query($sql);
  }


  /**
  * Esta función sirve para verificar si una propuesta tiene un evaluador confirmado
  * @param $idPropuesta - el id de la propuesta a la que se le va a verificar el evaluador confirmado
  * @return si hay un evaluador confirmado, retorna el id del evaluador, de lo contrario no hay retorno
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function verficarEvaluadorConfirmado($idPropuesta)
  {
     $sql = "SELECT ep.Evaluador_idEvaluador as idEvaluador 
             FROM evaluacion_propuesta ep 
             WHERE ep.Propuesta_idPropuesta = ".$idPropuesta." AND ep.esConfirmado = 1";
     $query = $this->db->query($sql);
     if($query->num_rows() > 0) {
      $idEvaluador = 0;
      foreach ($query->result() as $resultado) {
        $idEvaluador = $resultado->idEvaluador;
      }
      return $idEvaluador;
    }
  }



  /**
  * Esta función sirve para verificar si una propuesta tiene un evaluador suplente
  * @param $idPropuesta - el id de la propuesta a la que se le va a verificar el evaluador suplente
  * @return si hay un evaluador suplente, retorna el id del evaluador, de lo contrario no hay retorno
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function verficarEvaluadorSuplente($idPropuesta)
  {
     $sql = "SELECT ep.Evaluador_idEvaluador as idEvaluador 
             FROM evaluacion_propuesta ep 
             WHERE ep.Propuesta_idPropuesta = ".$idPropuesta." AND ep.esSuplente = 1";
     $query = $this->db->query($sql);
     if($query->num_rows() > 0) {
      $idEvaluador = 0;
      foreach ($query->result() as $resultado) {
        $idEvaluador = $resultado->idEvaluador;
      }
      return $idEvaluador;
    }
  }

  /**
  * esta funcion sirve para buscar si la propuesta seleccionada se encuentra en la tabla evaluacion_propuesta
  * @param $idPropuesta - el id de la propuesta que se busca
  * @return true si la propuesta es encontrada, false en caso contrario
  * @author Karen Daniela Ramirez Montoya 
  * @author Yurani Alejandra Salamanca
  */
  public function buscarPropuestaExistente($idPropuesta){

    $sql = "SELECT ep.Propuesta_idPropuesta as idPropuesta 
            FROM evaluacion_propuesta ep 
            WHERE ep.Propuesta_idPropuesta = ".$idPropuesta;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0){
      return true;
    } else {
     return false;
    }  
  }



  /**
  * Esta función sirve para buscar y asignar evaluadores que cumplan los criterios de busqueda para una propuesta
  * @param $idPropuesta - el id de la propuesta a la que se le va a asignar los evaluadores
  * @param $data - los criterios de busqueda
  * @return si no hay evaluadores que cumplan con los criterios de busqueda retorna una cadena 'No hay', de lo contrario no hay retorno
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function buscarEvaluadores($idPropuesta, $data) {

    $where = '';
    if($data['select_calificacion'] == 0 && $data['select_nivel']==0
      &&$data['select_idioma']==0 &&$data['select_organizacion']==0 &&$data['select_experiencia']==0)
    {
      return 'errorSeleccion';
    }
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
    if($data['organizacion'] != 0 && $data['select_organizacion'] != 0)
    {
      $where .= ' AND e.Organizacion_idOrganizacion = ' . $data['select_organizacion'];
    }
    if($data['experiencia'] != 0 && $data['select_experiencia'] != 0)
    {
      $where .= ' AND e.experiencia = ' . $data['select_experiencia'];
    }
 
      $sql = "SELECT e.idEvaluador, e.Ciudad_idCiudad 
              FROM evaluador e 
              WHERE e.grupoinvestigacion_idgrupoInvestigacion <> ".$data['select_grupoinvestigacion'].$where." LIMIT 0, 3";
      

      $query = $this->db->query($sql);
      if($query->num_rows() > 0){

        $arreglo = array();
        $cont = 0;
        foreach ($query->result() as $resultado) {

          $arreglo[$cont]['idEvaluador'] = $resultado->idEvaluador;
          $arreglo[$cont]['ciudad']      = $resultado->Ciudad_idCiudad;
          $cont++;
        }
        for ($i=0; $i < count($arreglo); $i++) { 
          $this->db->query("INSERT INTO evaluacion_propuesta (Ciudad_idCiudad, Evaluador_idEvaluador, Propuesta_idPropuesta)
                            VALUES (".$arreglo[$i]['ciudad'].", ".$arreglo[$i]['idEvaluador'].", ".$idPropuesta.")");
        } 
      } else {

        return 'No hay';
      }
    
  }

  /**
  * Esta función sirve para listar los evaluadores que aun no han sido asignados a una propuesta
  * @param $idEv0 - el id del primer evaluador asignado a la propuesta
  * @param $idEv1 - el id del segundo evaluador asignado a la propuesta
  * @param $idEv2 - el id del tercer evaluador asignado a la propuesta
  * @return si no hay evaluadores que no estén asignados a la propuesta no hay retorno, de lo contrario un arreglo con los datos de los evaluadores
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function listarEvaluadoresTodos($idEv0, $idEv1,$idEv2){

    $sql = "SELECT e.idEvaluador,e.nombre FROM evaluador e 
            WHERE e.idEvaluador <> ".$idEv0." AND e.idEvaluador <> ".$idEv1." AND e.idEvaluador <> ".$idEv2;
    $query = $this->db->query($sql);
    $arreglo = array();
    $cont = 0;
    if($query->num_rows() > 0){

      foreach ($query->result() as $resultado) {
       
        $arreglo[$cont]['idEvaluador'] = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']      = $resultado->nombre;
        $cont++;
      }
      return $arreglo;
    }
  }



  /**
  * Esta función sirve para cambiar un evaluador en una propuesta
  * @param $idCambiado - el id del evaluador que se va a cambiar
  * @param $idEvalNuevo - el id del evaluador que se va a asignar
  * @param $idPropuesta - el id de la propuesta a la que se le quiere cambiar el evaluador
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function cambiarEvaluador($idCambiado,$idEvalNuevo,$idPropuesta)
  {
    $sql = "UPDATE evaluacion_propuesta e SET e.Evaluador_idEvaluador = ".$idEvalNuevo." 
            WHERE e.Evaluador_idEvaluador = ".$idCambiado." AND e.Propuesta_idPropuesta = ".$idPropuesta;
    $query = $this->db->query($sql);
  }


  /**
  * Esta función sirve para obtener la convocatoria de una propuesta
  * @param $idPropuesta - el id de la propuesta de la que se quiere obtener la convocatoria
  * @return el id de la convocatoria
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function buscarIdConvocatoria($idPropuesta){
    $sql = "SELECT p.Convocatoria_idConvocatoria as idConvocatoria FROM propuesta p WHERE p.idPropuesta = ".$idPropuesta;
    $query = $this->db->query($sql);

    if($query->num_rows() > 0){

      foreach ($query->result() as $resultado) {       
        $idConvocatoria = $resultado->idConvocatoria;
      }
      return $idConvocatoria;
    }
  }


  /**
  * Esta función sirve para validar la selección de los criterios de busqueda para asignar evaluadores a una propuesta
  * @param $data - los criterios de búsqueda
  * @return si los criterios estan bien seleccionados se retorna una cadena vacía, de lo contrario una cadena 'errorSeleccion'
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function validarSeleccionCriterios($data)
  {
    if( $data['select_nivel'] == 0 && $data['select_idioma'] == 0 && $data['select_organizacion'] == 0 && $data['select_experiencia'] == 0)
    {
      return 'errorSeleccion';
    }
    else
    {
      return '';
    }
  }


  /**
  * Esta función sirve para listar los evaluadores que aun no han sido asignados a una propuesta y cumplan los criterios seleccionados
  * @param $idPropuesta - el id de la propuesta
  * @param $data - los criterios de selección
  * @param $idEv0 - el id del primer evaluador asignado a la propuesta
  * @param $idEv1 - el id del segundo evaluador asignado a la propuesta
  * @param $idEv2 - el id del tercer evaluador asignado a la propuesta
  * @return si no hay evaluadores que no estén asignados a la propuesta y cumplan los criterios retorna una cadena 'No hay', de lo contrario un arreglo con los datos de los evaluadores
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
   public function buscarEvaluadoresCambiado($idPropuesta,$data,$idEv0,$idEv1,$idEv2) {

    $where = '';

    if ($data['nombre'] != 0 && $data['select_nombre'] != '') {
      $where .= ' AND e.nombre LIKE "%' . $data['select_nombre'].'%"';
    }
    if ($data['area'] != 0 && $data['select_area'] != 0) {
      $where .= ' AND e.area_conocimiento_idarea_conocimiento = ' . $data['select_area'];
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
    if($data['organizacion'] != 0 && $data['select_organizacion'] != 0)
    {
      $where .= ' AND e.Organizacion_idOrganizacion = ' . $data['select_organizacion'];
    }

    $sql = "SELECT e.idEvaluador,e.nombre 
            FROM evaluador e 
            WHERE e.grupoinvestigacion_idgrupoInvestigacion <> ".$data['select_grupoinvestigacion']." AND e.idEvaluador <> ".$idEv0." AND e.idEvaluador <> ".$idEv1." AND e.idEvaluador <> ".$idEv2.$where;
    
    $query = $this->db->query($sql);
    if($query->num_rows() > 0){

      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['idEvaluador'] = $resultado->idEvaluador;
        $arreglo[$cont]['nombre']      = $resultado->nombre;
        $cont++;
      }
      return $arreglo;     
    } else {

      return 'No hay';
    }
  }


  /**
  * Esta función sirve para buscar una convocatoria a partir de su id
  * @param $idConvocatoria - el id de la convocatoria
  * @return el nombre de la convocatoria
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function buscarConvocatoria($idConvocatoria)
  {
    $sql = $this->db->query("SELECT c.nombre as nombreConv
            FROM Convocatoria c 
            WHERE c.idConvocatoria =".$idConvocatoria);
    if($sql->num_rows() > 0) {
      $nombreConv = '';
      foreach ($sql->result() as $resultado) {
        $nombreConv = $resultado->nombreConv;
      }

      return $nombreConv;
    }
  
  }



  /**
  * Esta función sirve para saber si una convocatoria tiene propuestas
  * @param $idConvocatoria - el id de la convocatoria de la que se quiere saber si tiene propuestas
  * @return si no hay propuestas retorna false, de lo contrario true
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function buscarPropuestasDeUnaConvocatoria($idConvocatoria)
  {
    $sql = $this->db->query("SELECT p.idPropuesta as idPropuesta FROM Propuesta p WHERE p.Convocatoria_idConvocatoria = ".$idConvocatoria);

    if($sql->num_rows()>0)
    {
      return true;
    }else {
      return false;
    }
    
  }



  /**
  * Esta función sirve para obtener la informacion de una propuesta a partir de su id
  * @param $idPropuesta - el id de la propuesta
  * @return un arreglo con los datos de la propuesta
  * @author Karen Daniela Ramirez Montoya
  * @author Yurani Alejandra Salamanca
  */
  public function getPropuesta($idPropuesta){

    $sql = "SELECT p.idPropuesta, p.titulo, o.nombre as nombreOrganizacion, i.nombre as nombreInstitucion,
                   te.nombre as tipoEvaluacionNombre, a.nombre as nombreArea, g.nombre as nombreGrupo
            FROM propuesta p, organizacion o, institucion i, tipo_evaluacion te, area_conocimiento a, grupoinvestigacion g
            WHERE p.Organizacion_idOrganizacion = o.idOrganizacion
            AND p.Institucion_idInstitucion = i.idInstitucion
            AND p.tipo_evaluacion_idtipo_evaluacion = te.idTipo_evaluacion
            AND p.area_conocimiento_idarea_conocimiento = a.idarea_conocimiento
            AND p.grupoinvestigacion_idgrupoInvestigacion = g.idgrupoInvestigacion
            AND p.idPropuesta = ".$idPropuesta;

    $query = $this->db->query($sql);

    if($query->num_rows() > 0){

      $arreglo = array();
      $cont = 0;
      foreach ($query->result() as $resultado) {

        $arreglo[$cont]['idPropuesta']          = $resultado->idPropuesta;
        $arreglo[$cont]['titulo']               = $resultado->titulo;
        $arreglo[$cont]['nombreOrganizacion']   = $resultado->nombreOrganizacion;
        $arreglo[$cont]['nombreInstitucion']    = $resultado->nombreInstitucion;
        $arreglo[$cont]['tipoEvaluacionNombre'] = $resultado->tipoEvaluacionNombre;
        $arreglo[$cont]['nombreArea']           = $resultado->nombreArea;
        $arreglo[$cont]['nombreGrupo']          = $resultado->nombreGrupo;
        $cont++;
      }
      return $arreglo;
    }

  }
}
?>