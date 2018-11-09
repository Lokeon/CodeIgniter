<?php

class Usuarios_model extends CI_Model {
    public function _construct() {
        parent::_construct();
    }
    
    //Comprueba si el usuario existe o no
    public function verify_user($user) {
        $ssql = "Select * from usuarios where usuario='".$user."'";
        $consulta =  $this->db->query($ssql);
        if($consulta->num_rows() == 0) { //el usuario no existe
            return false;
        } else { //el usuario existe
            return true;
        }
    }

    //añade un usuario
    public function add_usuario() {
        //el true es para que limpie este campo de inyecciones xss
        $this->db->insert('usuarios', array('nombre'=>$this->input->post('nombre',TRUE),
                        'correo'=>$this->input->post('correo',TRUE),
                        'usuario'=>$this->input->post('usuario',TRUE),
                        'pass'=>$this->input->post('pass',TRUE),'codigo'=>'123456','estado'=>'0'));
    }

    public function verify_sesion() {
        //el true es para que limpie este campo de inyecciones xss
        $consulta = $this->db->get_where('usuarios',array('usuario'=>$this->input->post('user',TRUE),
        'pass'=>$this->input->post('pass',TRUE)));
        if($consulta->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}?>