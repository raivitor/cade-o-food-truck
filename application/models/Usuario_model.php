<?php
class Usuario_model extends CI_Model {
	public function Cadastrar($usuario) {
        $this->db->insert("usuarios", $usuario);
    }

    public function getAllUsers(){
    	return $this->db->get("usuarios")->result_array();
    }

    public function Autenticar($email, $senha) {
	    $this->db->where("email", $email);
	    $this->db->where("senha", $senha);
	    $usuario = $this->db->get("usuarios")->row_array();
	    return $usuario;
	}
}