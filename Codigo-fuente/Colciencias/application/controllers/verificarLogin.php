<?php 
 
class VerificarLogin extends CI_Controller {
 
 function __construct() {
   parent::__construct();
   $this->load->model('admin','',TRUE);

 }
 
 function index(){
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE){
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
   }else{
     $session_data = $this->session->userdata('logged_in');
     if($session_data['username']=='admin')     {
     //Go to private area
       redirect('home', 'refresh');
     }else{
      redirect('homeEvaluador','refresh');
     }
   }
 
 }
 
 function check_database($password) {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->admin->loginAdministrador($username, $password);
 
   if($result){
     $sess_array = array();
     foreach($result as $row){
       $sess_array = array('id' => $row->id,'username' => $row->nombre);
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }else if($result=$this->admin->loginEvaluador($username, $password)){
        $sess_array = array();
         foreach($result as $row){
           $sess_array = array('id' => $row->idEvaluador,'username' => $row->username);
           $this->session->set_userdata('logged_in', $sess_array);
         }
     return TRUE;
   }else{
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>