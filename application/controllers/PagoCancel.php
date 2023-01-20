<?php

class PagoCancel extends CI_Controller {

        public function index()
        {
            $this->load->helper('url');
            $this->load->library('session');
            
            $this->load->model('usuario');
            $this->load->model('categoria');
            $this->load->model('carrito');
            
            $categorias = $this->categoria->get_all();
            $data['categorias'] = $categorias;

            $data["PeticionActual"] = $this->input->post('cartID');
            
             //CARGAR VISTAS
             $this->load->view('header', $data);
             $this->load->view('menu', $data);
             $this->load->view('pagocancelado', $data);
             $this->load->view('footer');
        }
        
}

?>