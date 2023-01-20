<?php
    class Carrito extends CI_Model {
        public $id;
        public $id_user;
        public $id_prod;
        public $nombre;
        public $imagen;
        public $precio;
        public $cantidad;
        
        
        //Comprueba si ya existe en el carrito, cierto producto para cierto usuario
        public function exists($id_user, $id_prod) {
            $this->db->where(array('id_user'=> $id_user, 'id_prod'=> $id_prod));
            $query = $this->db->get('carrito');
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function insertar() {
            if ($this->exists($this->id_user, $this->id_prod)) {
                $this->update();
                return;
            }
            $this->db->insert('carrito', $this);
            $this->id = $this->db->insert_id();
        }
      
         //Lee cierto producto de cierto usuario
        public function read($id_user, $id_prod) {
            $query = $this->db->get_where('carrito', array('id_user' => $id_user, 'id_prod' => $id_prod));
            $row = $query->row();
            if ($query->num_rows() > 0){
                $this->nombre = $row->nombre;
                $this->cantidad = $row->cantidad;
                $this->precio = $row->precio;
                $this->imagen = $row->imagen; 
                $this->id_user = $row->id_user;
                $this->id_prod = $row->id_prod;      
            }
        }

        public function update() {
            $this->db->update('carrito', $this, array('id_user' => $this->id_user, 'id_prod' => $this->id_prod));
        }
    
        public function delete($id_user, $id_prod) {
            $this->db->delete('carrito', array('id_user' => $id_user, 'id_prod' => $id_prod));
        }

        //Consigue todos los productos para un usario existentes en el carrito
        public function get_products_user($id_user){
            return $this->db->get_where('carrito', array('id_user' => $id_user))->result();
        }

        public function get_total($id_user){

        }
    }
?>