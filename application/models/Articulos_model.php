<?php

class Articulos_model extends CI_Model {
    public function _construct() {
        parent::_construct();
    }
//Metodo que mostrará todos los articulos
    public function get_articulos() {
        $consulta = $this->db->query('Select * from articulos;');
        return $consulta->result();
    }

    public function add_articulo(){
        $this->db->query('Insert into articulos values(null,"'.$this->input->post('titulo').'","'
        .$this->input->post('descripcion').'","'.$this->input->post('cuerpo').'")');
    }
}
?>