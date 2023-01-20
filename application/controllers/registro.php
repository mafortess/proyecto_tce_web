<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function index(){
        //CARGAR
        $this->load->helper(array('form','url'));
        $this->load->library('session');

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('producto');
        $this->load->model('usuario');


        //VALIDAMOS LA INFORMACIÓN QUE LLEGA DESDE EL FORMULARIO
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[8]|is_unique[usuario.email]', array( 'is_unique' => 'El usuario ya existe'));
        $this->form_validation->set_rules('nacimiento', 'Nacimiento', 'required');
        $this->form_validation->set_rules('pais', 'Pais', 'required');
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirmation', 'Confirmación de contraseña', 'required|min_length[8]|matches[password]', 'La contraseña no coincide');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        //Ejecutamos validador que devuelve un booleano
        //Validamos nombre de usuario y contraseña en la base de datos
        $valid = $this->form_validation->run();  

        if (!$valid)
        {
            // Mostrar un mensaje de error y volver a mostrar el formulario
            //Datos que pasamos a la vista
            $usuarios= $this->usuario->get_all();
            $data['usuarios'] = $usuarios;
            $data['titulo'] = 'Registrate en LuxCar';
            $this->load->view('registro', $data);
        }
        else {    
            // Obtener los datos del formulario e insertamos usuario en la base de datos
            $usuario = new Usuario();
            $usuario->nombre= $this->input->post('nombre');
            $usuario->apellidos= $this->input->post('apellidos');
            $usuario->password= password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $usuario->email= $this->input->post('email');
            $usuario->telefono= $this->input->post('telefono');
            $usuario->nacimiento = $this->input->post('nacimiento');
            $usuario->dni = $this->input->post('dni');
            $usuario->ciudad= $this->input->post('provincia');
            $usuario->pais=$this->input->post('pais');
            $usuario->codigopostal= "";
            $usuario->direccion= "";
            $usuario->rol= "cliente";
            $usuario->imagen = "/img/user-avatar.png";
            $usuario->create();
            
            //Página de bienvenida
            $data['usuario']=$usuario;
            $data['titulo'] = 'Bienvenido a LuxCar';

            $this->load->view('bienvenida', $data);
        }       
    }
}