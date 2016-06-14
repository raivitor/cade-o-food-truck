<?php
class Gerente_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM gerente");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $gerentes[] = $row;
            }
            return $gerentes;
        }
    }

    function getGerente($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM gerente WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createGerente($usuario_email) {
        
        $query = $this->db->query("INSERT INTO gerente (usuario_email) 
                  SELECT email FROM usuario WHERE email='$usuario_email'");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Gerente adicionado com sucesso :)";
        }

    }

    function deleteGerenteByEmail($usuario_email) {

        if( ! $this->db->query("DELETE FROM gerente WHERE email='$usuario_email'")) {
            return $this->db->error();
        } else {
            return "Gerente removido com sucesso :)";
        }
    }

    function deleteGerenteById($id) {
        if( ! $this->db->query("DELETE FROM gerente WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Gerente removido com sucesso :)";
        }
    }

}
