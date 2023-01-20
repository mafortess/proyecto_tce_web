<?php
    class Producto extends CI_Model {
        public $id;
        public $nombre;
        public $id_cat;
        public $precio;
        public $descripcion;
        public $motor;
        public $potencia;
        public $imagen;
        public $consumo;
        public $lanzamiento;
        public $equipamiento;

        public function exists($id) {
            $this->db->where('id',$id);
            $query = $this->db->get('producto');
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }
    
        public function create() {
            if (($this->id != '') && ($this->exists($this->id))) {
                $this->update();
                return;
            }
            $this->db->insert('producto', $this);
            $this->id = $this->db->insert_id();
        }
            
        public function read($id) {
            $query = $this->db->get_where('producto', array('id' => $id));
            $row = $query->row();
            if ($query->num_rows() > 0){
                $this->id = $row->id;
                $this->nombre = $row->nombre;
                $this->id_cat = $row->id_cat;
                $this->precio = $row->precio;
                $this->descripcion = $row->descripcion;
                $this->imagen = $row->imagen;
                $this->motor = $row->motor;
                $this->potencia = $row->potencia;      
                $this->consumo = $row->consumo; 
                $this->lanzamiento = $row->lanzamiento; 
                $this->equipamiento = $row->equipamiento;    
            }
        }
        
        public function update() {
            $this->db->update('producto', $this, array('id' => $this->id));
        }
    
        public function delete() {
            $this->db->delete('producto', array('id' => $this->id));
        }

        public function get_all(){
            return $this->db-> get('producto')->result();
        }

        public function get_categoria($id_cat){         
            //$this->db->where('id',$id);
            //return $this->db->get('producto');
            return $this->db->get_where('producto', array('id_cat' => $id_cat))->result();
        }

        public function buscar_text($text){
            $query = $this->db->like('nombre', $text);
            //$this->db->or_like('descripcion', $text);
            $result = $this->db->get('producto')->result();
            return $result;
        }
    }
?>