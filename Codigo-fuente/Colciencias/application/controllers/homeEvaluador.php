<?php
session_start(); //we need to call PHP's session object to access it through CI
class HomeEvaluador extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   if($this->session->userdata('logged_in'))
   {

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username']; 

      $this->load->view('barraEvaluador');
      $this->load->view('homeEvaluador');  
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }
 
}
 
?>