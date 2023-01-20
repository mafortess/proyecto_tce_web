<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

    public function index(){        
        //CARGAR
        $this->load->helper(array('form','url'));
        $this->load->library('session');

        //CARGAR MODELOS
        $this->load->model('usuario');

        //Datos que pasamos a la vista
        $usuarios= $this->usuario->get_all();
        $data['usuarios'] = $usuarios;
        $data['titulo'] = 'Inicia sesión en LuxCar';
        
        //VALIDAMOS LA INFORMACIÓN QUE LLEGA DESDE EL FORMULARIO
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required', array('required'=>'Introduzca una contraseña'));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        //Ejecutamos validador que devuelve un booleano
        //Validamos nombre de usuario y contraseña en la base de datos
        if (!$this->form_validation->run())
        {
            // Mostrar un mensaje de error y volver a mostrar el formulario
            //Datos que pasamos a la vista
            $usuarios= $this->usuario->get_all();
            $data['usuarios'] = $usuarios;
            $data['titulo'] = 'Inicia sesión en LuxCar';
            $this->load->view('login', $data);
        }
        else {    
            // Obtener los datos del formulario
            $email_form = $this->input->post('email');
            $password_form = $this->input->post('password');

            //Comprobamos si el usuario existe
            if($this->usuario->exists($email_form)){       //USUARIO CORRECTO                        
                $user= new Usuario();
                $user->read($email_form);
                //COMPROBAR CONTRASEÑA
                // Cifrada
                if(password_verify($password_form,$user->password)){
                    // Iniciar sesión del usuario y redirigir a página de inicio
                    $nombre = $user->nombre;
                    $email = $user->email;
                    $id = $user->id;
                    $imagen = $user->imagen;
                    $userdata = array(
                        'username' => $nombre,
                        'email' => $email,
                        'id' => $id,
                        'imagen' => $imagen,
                        'logged_in' => TRUE );
                    $this->session->set_userdata($userdata);                  
                    //$this->session->set_userdata('logged_in', true);
                    redirect(base_url(), $userdata);
                }
                else{
                    //Datos que pasamos a la vista
                    $data['error']="Contraseña incorrecta";
                    $data['titulo'] = 'Inicia sesión en LuxCar';
                    $this->load->view('login', $data);
                    //echo "contrañse incrreocta";
                }
                /*
                //Sin cifrar
                if($password_form!=$user->password ){
                    echo "El usuario o la contraseña es incorrecto";
                    //Datos que pasamos a la vista
                    $data['titulo'] = 'Inicia sesión en LuxCar';
                    $this->load->view('login', $data);
                }
                else{   //CONTRASEÑA CORRECTA
                    $usuario = $this->usuario->get_id($email_form);
                
                    $user= new Usuario();
                    $user->read_porid($usuario[0]->id);
                    $user->read($usuario[0]->email);
                    // Iniciar sesión del usuario y redirigir a página de inicio
                    $nombre = $user->nombre;
                    $email = $user->email;
                
                    $userdata = array(
                        'username' => $nombre,
                        'email' => $email,
                        'logged_in' => TRUE );
                    $this->session->set_userdata($userdata);                  
                    //$this->session->set_userdata('logged_in', true);
                    redirect(base_url(), $userdata);
                }
                */
            }else{
                //Datos que pasamos a la vista
                $data['error']="Usuario no existe";
                $data['titulo'] = 'Inicia sesión en LuxCar';
                $this->load->view('login', $data);
            }
        }
    }
}