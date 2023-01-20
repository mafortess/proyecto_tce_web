<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper('url');

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('usuario');

        $categoria = new Categoria();

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
            

                   
        $data['titulo'] = 'Acerca de LuxCar';

        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('aboutus', $data);
        $this->load->view('footer');
    }
}