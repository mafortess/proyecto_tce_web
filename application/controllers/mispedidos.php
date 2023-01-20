<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mispedidos extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper(array('form','url'));

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('producto');
        $this->load->model('usuario');
        $this->load->model('carrito');
        $this->load->model('compra');

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
        
        $id_user= $this->session->id;
        //echo $id_user;
        
        //CARGAMOS TODAS LAS COMPRAS REALIZADAS POR ESTE USUARIO
        $compras = $this->compra->get_prods();
        $i = 0;
        //echo sizeof($compras);
        if(!empty($compras)){
            foreach($compras as $comp)
            {
                $id_prod = $compras[$i]->id_prod;

                $compra = new Compra();
                $compra->read($id_user, $id_prod);
                
                $id[$i] = $id_prod;
                $id_compra[$i] = $comp->id_compra;
                $fecha_compra[$i] = $comp->fecha_compra;

                $nombre[$i] = $comp->nombre;
                $precio[$i] = $comp->precio;
                $imagen[$i] = $comp->imagen;
                $cantidad[$i] = $comp->cantidad;
            
                $i++;
            }

            //Características de todos los productos en el carrito del usuario
            $data['id'] = $id;
            $data['id_compra'] = $id_compra;
            $data['fecha_compra'] = $fecha_compra;            
            $data['nombre'] = $nombre;
            $data['precio'] = $precio;
            $data['cantidad'] = $cantidad;
            $data['imagen'] = $imagen;   

        }
        
        $data['compras'] = $compras;

        $data['titulo'] = 'Mis pedidos';
        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('mispedidos', $data);
        $this->load->view('footer');
    }
}