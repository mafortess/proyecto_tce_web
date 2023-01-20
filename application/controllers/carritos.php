<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carritos extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper(array('form','url'));

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('producto');
        $this->load->model('usuario');
        $this->load->model('carrito');

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
        
        $id_user= $this->session->id;
        //echo $id_user;
        $productos = $this->carrito->get_products_user($id_user);
        
        $i = 0;

        if(!empty($productos)){
            foreach($productos as $pr)
            {
                $id_prod = $productos[$i]->id_prod;

                $prod = new Carrito();
                $prod->read($id_user, $id_prod);
                
                $id[$i] = $id_prod;
                $nombre[$i] = $pr->nombre;
                $precio[$i] = $pr->precio;
                $imagen[$i] = $pr->imagen;
                $cantidad[$i] = $pr->cantidad;

                $i++;
            }

            //Características de todos los productos en el carrito del usuario
            $data['id'] = $id;
            $data['nombre'] = $nombre;
            $data['precio'] = $precio;
            $data['cantidad'] = $cantidad;
            $data['imagen'] = $imagen;          
        }
        
        $data['productos'] = $productos;

        $data['titulo'] = 'Carrito de la compra de LuxCar';
        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('carrito', $data);
        $this->load->view('footer');
    }

    public function insertarproducto(){
        $this->load->helper(array('form','url'));
        $this->load->library('session');

        //CARGAR MODELOS
        $this->load->model('usuario');
        $this->load->model('carrito');
        
        //VALIDAMOS LA INFORMACIÓN QUE LLEGA DESDE EL FORMULARIO
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_prod', 'Id_prod', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('imagen', 'Imagen', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        $valid = $this->form_validation->run();
        if($valid){  
            // Obtener los datos del formulario
            $producto = new Carrito();
            $producto->id_user = $this->session->id;
            $producto->id_prod = $this->input->post('id_prod');
            $producto->nombre = $this->input->post('nombre');
            $producto->imagen = $this->input->post('imagen');
            $producto->precio = $this->input->post('precio');
            $producto->cantidad = $this->input->post('cantidad');

            if($this->carrito->exists($this->session->id, $this->input->post('id_prod')))
            {        
                $prod_existente = new Carrito();
                $prod_existente->read($this->session->id, $this->input->post('id_prod'));
                $producto->cantidad += $prod_existente->cantidad;
            }   
            $producto->insertar();
        
            //Redirigir a la página del carrito
            redirect('carritos/index', 'refresh');
        }

        else{    
            //CARGAR MODELOS
            $this->load->model('categoria');
            $this->load->model('producto');
            
            //Obtenemos todas las categorias
            $categorias = $this->categoria->get_all();
            $data['categorias'] = $categorias;
    
            $producto = new Producto();
            $producto->read($this->input->post('id_prod'));
            
            $data['id'] = $this->input->post('id_prod');
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
    }

    public function eliminarproducto(){
        $this->load->helper(array('form','url'));
        $this->load->library('session');
    
        $this->load->model('usuario');
        $this->load->model('carrito');

        //Recibimos formulario desde el boton eliminar del carrito en vista de carrito con id_prod
        $id_user= $this->session->id;
        $id_prod=$this->input->post('id_prod');

        $prod = new Carrito();

        $prod->carrito->delete($id_user, $id_prod);

        //Redirigir a la página del carrito
        redirect('carritos/index', 'refresh');
    }

    public function aumentarproducto(){
        $this->load->helper(array('form','url'));
        $this->load->library('session');

        $this->load->model('usuario');
        $this->load->model('carrito');

        $id_prod=$this->input->post('id_prod');
        $id_user= $this->session->id;

        
        $prod = new Carrito();
        $prod->read($id_user, $id_prod);

        $prod->cantidad += 1;

        $prod->update();

        //Redirigir a la página del carrito
        redirect('carritos/index', 'refresh');
    }

    public function disminuirproducto(){
        $this->load->helper(array('form','url'));
        $this->load->library('session');

        $this->load->model('usuario');
        $this->load->model('carrito');

        $id_prod=$this->input->post('id_prod');
        $id_user= $this->session->id;

        $prod = new Carrito();
        $prod->read($id_user, $id_prod);

        $prod->cantidad -= 1;

        if(!$prod->cantidad)
            $prod->delete($id_user, $id_prod);
        else
            $prod->update();

        
        //Redirigir a la página del carrito
        redirect('carritos/index', 'refresh');
    }

    public function completarcompra(){
        $this->load->helper(array('form','url'));
        $this->load->library('session');

        $this->load->model('categoria');
        $this->load->model('usuario');
        $this->load->model('carrito');

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;
        
        $user= new Usuario();
        $user->read_porid($this->session->id);

        $data['numproductos'] = $this->input->post('numproductos');

        //echo $this->input->post('numproductos');

        $data['nombre'] = $user->nombre;
        $data['apellidos'] = $user->apellidos;
        $data['telefono'] = $user->telefono;
        $data['ciudad'] = $user->ciudad;
        $data['direccion'] = $user->direccion;
        $data['codigopostal'] = $user->codigopostal;

        $data['total'] = $this->input->post('total');

        $data['titulo'] = 'Dirección de envio';

        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('envioForm',$data); 
        $this->load->view('footer');
        
        /*
        ESTO AHORA SE HACE TRAS COMPLETAR EL PAGO
        //Eliminar todos los productos del carrito para ese usuario
        $id_user= $this->session->id; 
        $productos = $this->carrito->get_products_user($this->session->id);

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
        
        //Redirigir a la página principal
        redirect('index', 'refresh');
        */
    }
}