<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RecuperarPassword extends CI_Controller {

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
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirmation', 'Confirmación de contraseña', 'required|min_length[8]|matches[password]', 'La contraseña no coincide');
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        // Obtener los datos del formulario
        $email_form = $this->input->post('email');
        $password_form = $this->input->post('password');

        //Ejecutamos validador que devuelve un booleano
        //Validamos nombre de usuario y contraseña en la base de datos
        if (!$this->form_validation->run())
        {
            // Mostrar un mensaje de error y volver a mostrar el formulario
            //Datos que pasamos a la vista
            $usuarios= $this->usuario->get_all();
            $data['usuarios'] = $usuarios;
            $data['titulo'] = 'Recuperar contraseña';
            $this->load->view('recuperarpassword', $data);
        }
        else {    
            //Comprobamos si el usuario existe
            if($this->usuario->exists($email_form)){       //USUARIO CORRECTO                    
                $usuario= new Usuario();
                $usuario->read($email_form);
                $usuario->password= password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            
                //Actualizamos perfil de usuario en la BBDD
                $usuario->update();

               // echo "CONTRAÑSE CAMBIADA";
                redirect('login');
            }else{
                //Datos que pasamos a la vista
                $data['error']="Usuario no existe";
                $data['titulo'] = 'Recuperar contraseña';
                $this->load->view('recuperarpassword', $data);
            }
        }
    }   
}