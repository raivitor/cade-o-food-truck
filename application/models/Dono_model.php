<?php
class Dono_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM dono");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $donos[] = $row;
            }
            return $donos;
        }
    }

    function getDono($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM dono WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createDono($usuario_email) {
        
        $query = $this->db->query("INSERT INTO dono (usuario_email) 
                  SELECT email FROM usuario WHERE email='$usuario_email'");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Dono adicionado com sucesso :)";
        }

    }

    function deleteDonoByEmail($usuario_email) {

        if( ! $this->db->query("DELETE FROM dono WHERE email='$usuario_email'")) {
            return $this->db->error();
        } else {
            return "Dono removido com sucesso :)";
        }
    }

    function deleteDonoById($id) {
        if( ! $this->db->query("DELETE FROM dono WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Dono removido com sucesso :)";
        }
    }

}
