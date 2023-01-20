<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper('url');

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('usuario');

        $categoria = new Categoria();
        $categoria->read(1);
        $data['categoria'] = $categoria;

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
            
        $this->load->model('producto');
        
        //$producto = new Producto();
        //$producto->read(1);

        $productos = new Producto();
        $productos = $this->producto->get_all();
        $data['productos'] = $productos;

        //$data['nombre'] = $this->session->nombre;      
        
        $data['titulo'] = 'LUXCAR: Tienda online de compra y alquiler de vehículos';
        
        //$data['producto']=  //$this->producto->get_all();
        
        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('index', $data);
        $this->load->view('footer');
    }
}