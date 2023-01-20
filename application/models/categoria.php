<?php
    class Categoria extends CI_Model {
        public $id;
        public $nombre;
       
        public function exists($id) {
            $this->db->where('id',$id);
            $query = $this->db->get('categoria');
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
            $this->db->insert('categoria', $this);
            $this->id = $this->db->insert_id();
        }
            
        public function read($id) {
            $query = $this->db->get_where('categoria', array('id' => $id));
            $row = $query->row();
            if ($query->num_rows() > 0){
                $this->id = $row->id;
                $this->nombre = $row->nombre;
            }
        }
        
        public function update() {
            $this->db->update('categoria', $this, array('id' => $this->id));
        }
    
        public function delete() {
            $this->db->delete('categoria', array('id' => $this->id));
        }

        public function get_all(){
            return $this->db->get('categoria')->result();
        }
    }
?>