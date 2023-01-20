<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper('url');

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('producto');
        
        //Obtenemos todas las categorias
        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
        
        $id= $this->uri->segment(3);

        $producto = new Producto();
        $producto->read($id);
        
        $data['id'] = $id;//$producto->id;
        $data['nombre'] = $producto->nombre;
        $data['id_cat'] = $producto->id_cat;
        $data['precio'] = $producto->precio;
        $data['descripcion'] = $producto->descripcion;
        $data['imagen'] = $producto->imagen;
        $data['motor'] = $producto->motor;
        $data['potencia'] = $producto->potencia;
        $data['consumo'] = $producto->consumo;
        $data['lanzamiento'] = $producto->lanzamiento;
        $data['equipamiento'] = $producto->equipamiento;

        $categoria = new Categoria();
        $categoria->read($producto->id_cat);
        $data['nombre_categoria'] = $categoria->nombre; 

        $data['titulo'] = $producto->nombre;

        //CARGAR VISTAS
        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('producto', $data);
        $this->load->view('footer');
    }

    public function barraBusqueda(){
        $this->load->library('session');
        $this->load->helper('url');

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('producto');
        
        //Obtenemos todas las categorias
        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;

        $search = $this->input->post('search');
 
        $productos = $this->producto->buscar_text($search);

        //$numproductos= sizeof($productos); //PARA DEPURACIÓN
        //echo $numproductos; 

        $i=0;

        $data['search'] = $search;
        $data['productos'] = $productos;
        $data['titulo'] = "LUXCAR: $search"; //con comillas simples no se escapan las variables

        //CARGAR VISTAS
        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('busqueda', $data);
        $this->load->view('footer');
    }
}