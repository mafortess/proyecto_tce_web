<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper(array('form','url'));

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('usuario');

        $categoria = new Categoria();

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;

        $usuario = new Usuario();
        $usuario->read_porid($this->session->id);

        //Página de bienvenida
        $data['usuario']=$usuario;
        $data['titulo'] = 'Mi cuenta';

        //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('perfil', $data);
        $this->load->view('footer');
    }

    public function modificarimagen(){
        $this->load->library('session');
        $this->load->helper(array('form','url'));

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('usuario');

        $usuario = new Usuario();
        $usuario->read_porid($this->session->id);
        $imagen= $usuario->imagen;
        //Recibimos datos del perfil de usuario
        //VALIDAMOS LA INFORMACIÓN QUE LLEGA DESDE EL FORMULARIO
        $this->load->library('form_validation');
        $this->form_validation->set_rules('imagen', 'Imagen', 'required');

        $valid = $this->form_validation->run();


        if ($valid)
        {
            $url_imagen = "/img/" . $this->input->post('imagen');
            $usuario->imagen= $url_imagen;
  

            // //Actualizamos perfil de usuario en la BBDD
             $usuario->update();
        }

        //Volvemos a mostrar vista de perfil con datos actualizados
        //Página de bienvenida
        $data['usuario']=$usuario;
        $data['titulo'] = 'Mi cuenta';

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;

        // //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('perfil', $data);
        $this->load->view('footer');

    }

    public function modificarperfil(){
        $this->load->library('session');
        $this->load->helper(array('form','url'));

        //CARGAR MODELOS
        $this->load->model('categoria');
        $this->load->model('usuario');

        //Recibimos datos del perfil de usuario
        //VALIDAMOS LA INFORMACIÓN QUE LLEGA DESDE EL FORMULARIO
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('dni', 'Dni', 'required');
        $this->form_validation->set_rules('nacimiento', 'Nacimiento', 'required');
        $this->form_validation->set_rules('pais', 'Pais', 'required');
        $this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
        $this->form_validation->set_rules('codigopostal', 'Codigo postal', 'required');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required');

        $valid = $this->form_validation->run();


        if ($valid)
        {
            $usuario = new Usuario();
            $usuario->read_porid($this->session->id);
    
            $usuario->email= $this->input->post('email');
            $usuario->telefono= $this->input->post('telefono');
            $usuario->dni = $this->input->post('dni');
            $usuario->nacimiento = $this->input->post('nacimiento');
            $usuario->pais = $this->input->post('pais');
            $usuario->ciudad= $this->input->post('ciudad');
            $usuario->codigopostal= $this->input->post('codigopostal');
            $usuario->direccion= $this->input->post('direccion');
            
            //Actualizamos perfil de usuario en la BBDD
            $usuario->update();

        //Volvemos a mostrar vista de perfil con datos actualizados
        //Página de bienvenida
        $data['usuario']=$usuario;
        $data['titulo'] = 'Mi cuenta';

        $categorias = $this->categoria->get_all();
        $data['categorias'] = $categorias;

        // //CARGAR VISTAS
        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('perfil', $data);
        $this->load->view('footer');
        }
        else{
            redirect('index');
        }
    }
}