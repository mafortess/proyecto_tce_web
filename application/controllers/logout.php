<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Logout extends CI_Controller {
    public function index(){    
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('usuario');

      
        //$this->session->unset_userdata ($newdata);  
        $this->session->unset_userdata (array('username','email','logged_in')); 
        $this->session->sess_destroy (); 
        redirect(base_url()); 
    }
}