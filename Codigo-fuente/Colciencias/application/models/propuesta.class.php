<?php
///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de manejar los datos de la tabla propuesta
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////
Class Propuesta
{

       /**
       * esta funcion sirve para listar las propuestas de una convocatoria 
       * @return
       * @param 
       * @author
       */
       public function listarPropuesta()
       {
            $this->db->select('p.titulo, p.estado, p.Organizacion_idOrganizacion, 
                               p.Institucion_idInstitucion, p.Linea_tematica_idLinea_tematica,
                               p.tipo_evaluacion_idtipo_evaluacion');
            $this->db->from('propuesta');
            $query=$this->db->$get();
            if($query->num_row()>0){
                $query->result();
            }
       }

         

}
?>