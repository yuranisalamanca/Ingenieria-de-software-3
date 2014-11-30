<?php

///////////////////////////////////////////////////////////////////////////
//	Esta clase es la responsable de controlar comunicar la vista con el modelo
//  Autor: Yurani Alejandra Salamanca Lotero
//  Autor: Karen Daniela Ramirez Ramirez
//
//////////////////////////////////////////////////////////////////////////

class Admin extends CI_Model{

    function __construct(){
      parent::__construct();
      $this->load->database();
    }
  	
	public function loginAdministrador($username, $password){
   if(strstr($password,"=")){
      return false;
   }else{
      $sql="SELECT e.id, e.nombre, e.password from administrador e where e.nombre='".$username."' AND e.password='".$password."' AND e.password not like '%\'%'";
      $query = $this ->db->query($sql);
     if($query -> num_rows() == 1){
       return $query->result();
     }else{
       return false;
     }
    }
  }

  public function loginEvaluador($username, $password){
    if(strstr($password,"=")){
      return false;
   }else{
      $sql="SELECT e.idEvaluador, e.username, e.contraseña from evaluador e where e.username='".$username."' AND e.contraseña='".$password."'";
      $query = $this ->db->query($sql); 
     if($query -> num_rows() == 1){
       return $query->result();
     }else{
       return false;
     }
   }
  }



	
}
 ?>