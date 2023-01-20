<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper('url');

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('producto');
        $this->load->model('usuario');
    
        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
        
        $id= $this->uri->segment(3);

        $categoria = new Categoria();
        $categoria->read($id);
        $data['titulo'] = $categoria->nombre;
        
        //$productos = $this->producto->get_all(); //devuelve un array de objetos de los productos

        $productos = $this->producto->get_categoria($id);
        $i = 0;

        //NO BORRAR
        //$query = $this->db->where('id_cat', $id)->get('producto')->result(); --> devuelve array
        //$query = $this->db->get('producto')->result(); --> devuelve objeto
        
        //echo $productos->num_rows(); //PARA PRUEBAS
        /*
        if(!empty($productos)){
            foreach($productos as $prod)
            {
                $prod = new Producto();
                $prod->read($i);
                $nombre[$i] = $prod->nombre;
                $precio[$i] = $prod->precio;
                $potencia[$i] = $prod->potencia;
                $imagen[$i] = $prod->imagen;
                $i++;
            }
            //Características de todos los productos de la categoría
            $data['nombre'] = $nombre;
            $data['precio'] = $precio;
            $data['potencia'] = $potencia;
            $data['imagen'] = $imagen;
        }
        */
        $data['productos'] = $productos;

        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('categoria', $data);
        $this->load->view('footer');
    }
}