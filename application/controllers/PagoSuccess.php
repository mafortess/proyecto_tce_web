<?php

class PagoSuccess extends CI_Controller {

        public function index()
        {
            $this->load->helper('url');
            $this->load->library('session');
            
            $this->load->model('usuario');
            $this->load->model('categoria');
            $this->load->model('carrito');
            $this->load->model('compra');
           
            $categorias = $this->categoria->get_all();
            $data['categorias'] = $categorias;

            $data["PeticionActual"] = $this->input->post('cartID');

            //Extramos todos los productos del carrito del usuario
            $id_user= $this->session->id; 
            $productos = $this->carrito->get_products_user($this->session->id);
            $id_compra = $this->input->post('cartID');
            $total = 0;

            $id_prod=array();
            $nombre=array();
            $precio=array();
            $imagen=array();
            $cantidad=array();

            $i = 0;
           

            if(!empty($productos)){
                foreach($productos as $pr)
                {
                    $id_prod[$i] = $productos[$i]->id_prod;

                    $prod = new Carrito();
                    $prod->read($id_user, $id_prod[$i]);
                    
                    $nombre[$i] = $prod->nombre;
                    $imagen[$i] = $prod->imagen;
                    
                    $precio[$i] = $prod->precio;
                    $cantidad[$i] = $prod->cantidad;
                
                   // $id_prod = $productos[$i]->id_prod;
                    $total += $precio[$i] * $cantidad[$i];
                    $i++;
                }
            }
            //Los añadimos al historial de compras para ese usuario
            
            $i = 0;
            
            foreach($productos as $pr)
            {
                $compra = new Compra();
                $compra->id_compra = $this->input->post('cartID');
                $compra->id_user = $this->session->id;
                $compra->importe = $total;

                $compra->id_prod =  $id_prod[$i];
                $compra->nombre =  $nombre[$i];
                $compra->precio =  $precio[$i];
                $compra->imagen =  $imagen[$i];
                $compra->cantidad =  $cantidad[$i];
                $compra->insertar();

                echo $compra->id_user . "   ". $compra->id_prod . "    " .$compra->id_compra;

                $i++;
            }


            //Eliminar todos los productos del carrito para ese usuario

            $i = 0;
    
            if(!empty($productos)){
                foreach($productos as $pr)
                {
                    $id_prod = $productos[$i]->id_prod;

                    $prod = new Carrito();
                    $prod->delete($id_user, $id_prod);

                    $i++;
                }
            }
            

            
            //CARGAR VISTAS
            $this->load->view('header', $data);
            $this->load->view('menu', $data);
            $this->load->view('pagocompletado', $data);
            $this->load->view('footer');
        }
        
}

?>