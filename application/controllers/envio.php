<?php

class Envio extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));
                $this->load->library('session');
                
                $this->load->model('categoria');
                $this->load->model('usuario');
                $this->load->model('carrito');
                $this->load->model('compra');
        
                $categorias = $this->categoria->get_all();
                $data['categorias'] = $categorias;

                $user= new Usuario();
                $user->read_porid($this->session->id);

                //echo $user->nombre;
                //echo $user->apellidos;
                
                $this->load->library('form_validation');
                

                $this->form_validation->set_rules('direccion', 'Direccion', 'required'); // htmlspecialchars
                $this->form_validation->set_rules('codigopostal', 'Codigo Postal', 'trim|required|numeric|exact_length[5]');
                $this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required');
                $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required');

                if ($this->form_validation->run() == FALSE)
                {
                        // FALTAN CAMPOS QUE ARREGLAR                     
                        $user= new Usuario();
                        $user->read_porid($this->session->id);
                
                        $data['telefono'] = $user->telefono;
                        $data['ciudad'] = $user->ciudad;
                        $data['direccion'] = $user->direccion;
                        $data['codigopostal'] = $user->codigopostal;

                        $data['titulo'] = 'Dirección de envio';

                        //CARGAR VISTA DE FORMULARIO DE ENVIO
                        $this->load->view('header', $data);
                        $this->load->view('menu', $data);
                        $this->load->view('envioForm', $data); 
                        $this->load->view('footer');
                }
                else
                {
                        // CARGAR INFORMACION DEL PRODUCTO
                        // Esto puede acerse cargando de la base de datos, o recuperando informacion
                        // del formulario en caso de tener campos hidden en el POST


                        // GUARDAR LA INFORMACION DEL PRODUCTO Y OTROS EN EL CAMPO $data
                        $data['firstname'] = $user->nombre;
                        $data['lastname'] = $user->apellidos;
                        $data['numproductos'] = $this->input->post('numproductos');
                        //echo $user->nombre;
                        // echo $user->apellidos;
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

                            $data['direccion'] = $user->direccion;       
                        
                        }
                        
                        $data['productos'] = $productos;
                        $data['total'] = $this->input->post('total');
                        
                        // Las de este formulario no son necesarias ya que son accesibles usando set_value
                        $data["PeticionActual"] = bin2hex(random_bytes(16));

                        // LLAMAR A UN FORMULARIO QUE AUTOENVIA UN POST A LA PAGINA DE UMAPAL                      
                        $this->load->view('callumapal', $data);
                }
        }
}

?>