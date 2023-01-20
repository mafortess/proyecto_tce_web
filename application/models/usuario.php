<?php
    class Usuario extends CI_Model {
        public $id;
        public $nombre;
        public $apellidos;
        public $telefono;
        public $email;
        public $dni;
        public $nacimiento;
        public $pais;
        public $ciudad;
        public $direccion;
        public $codigopostal;
        public $password;
        public $fechaRegistro;
        public $rol;
        public $imagen;
        
        public function exists($email) {
            $this->db->where('email',$email);
            $query = $this->db->get('usuario');
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function get_id($email){
            return $this->db->get_where('usuario', array('email' => $email))->result();
        }

        public function create() {
            if (($this->id != '') && ($this->exists($this->id))) {
                $this->update();
                return;
            }
            $this->db->insert('usuario', $this);
            $this->id = $this->db->insert_id();
        }
            
        public function read_porid($id) {
            $query = $this->db->get_where('usuario', array('id' => $id));
            $row = $query->row();
            if ($query->num_rows() > 0){
                $this->id = $row->id;
                $this->nombre = $row->nombre;
                $this->apellidos = $row->apellidos;
                $this->telefono = $row->telefono;
                $this->email = $row->email;
                $this->nacimiento = $row->nacimiento;
                $this->dni = $row->dni;
                $this->pais = $row->pais;
                $this->ciudad = $row->ciudad;
                $this->direccion = $row->direccion;
                $this->codigopostal = $row->codigopostal;
                $this->password = $row->password;
                $this->rol = $row->rol;  
                $this->imagen = $row->imagen; 
            }
        }
        public function read($email) {
            $query = $this->db->get_where('usuario', array('email' => $email));
            $row = $query->row();
            if ($query->num_rows() > 0){
                $this->id = $row->id;
                $this->nombre = $row->nombre;
                $this->apellidos = $row->apellidos;
                $this->telefono = $row->telefono;
                $this->email = $row->email;
                $this->pais = $row->pais;
                $this->ciudad = $row->ciudad;
                $this->dni = $row->dni;
                $this->direccion = $row->direccion;
                $this->codigopostal = $row->codigopostal;
                $this->password = $row->password;
                $this->rol = $row->rol;   
                $this->imagen = $row->imagen;
            }
        }

        public function update() {
            $this->db->update('usuario', $this, array('id' => $this->id));
        }
    
        public function delete() {
            $this->db->delete('usuario', array('id' => $this->id));
        }

        public function get_all(){
            return $this->db-> get('usuario')->result();
        }
    }
?>