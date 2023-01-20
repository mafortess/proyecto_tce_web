<?php
    class Compra extends CI_Model {
        
        public $id;
        public $id_compra;
        public $importe;
        public $fecha_compra;
        public $id_user;
        public $id_prod;
        public $nombre;
        public $imagen;
        public $precio;
        public $cantidad;
        
        //Comprueba si ya existe en el compra, cierto producto para cierto usuario
        public function exists($id_user, $id_compra, $id_prod) {
            $this->db->where(array('id_user'=> $id_user, 'id_compra'=>$id_compra,'id_prod'=> $id_prod));
            $query = $this->db->get('compra');
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }  
        }

        public function insertar() {
            if ($this->exists($this->id_user, $this->id_compra, $this->id_prod)) {
                //$this->update();
                return;
            }
            $this->db->insert('compra', $this);
            $this->id = $this->db->insert_id();
        }
      
         //Lee cierto producto de cierto usuario
        public function read($id_user, $id_prod) {
            $query = $this->db->get_where('compra', array('id_user' => $id_user, 'id_prod' => $id_prod));
            $row = $query->row();
            if ($query->num_rows() > 0){
                $this->nombre = $row->nombre;
                $this->cantidad = $row->cantidad;
                $this->precio = $row->precio;
                $this->imagen = $row->imagen; 
                $this->id_user = $row->id_user;
                $this->id_prod = $row->id_prod;
                $this->id_compra = $row->id_compra;
                $this->fecha_compra = $row->fecha_compra;      
            }
        }

        //Consigue todos los productos para un usuario existente
        public function get_prods(){
            return $this->db->get_where('compra', array('id_user' => $this->session->id))->result();
        }
    }
?>