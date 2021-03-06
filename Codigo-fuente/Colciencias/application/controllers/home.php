<?php
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
 
   function __construct() {
     parent::__construct();
   }
 
   function index(){
     if($this->session->userdata('logged_in')){
       $sessionData = $this->session->userdata('logged_in');
       $sessionData['username']; 
        $this->load->view('barra');
        $this->load->view('homeUsuarioColciencias');  
     }else{
       redirect('login', 'refresh');
     }
   }
   
   function logout(){
     $this->session->unset_userdata('logged_in');
     session_destroy();
     redirect('home', 'refresh');
   }
 
}
 
?>