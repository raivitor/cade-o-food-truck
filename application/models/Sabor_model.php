<?php
class Sabor_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM sabor");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $sabores[] = $row;
            }
            return $sabores;
        }
    }

    function getSabor($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM sabor WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createSabor($tipo) {
        
        $query = $this->db->query("INSERT INTO sabor (tipo) VALUES ('$tipo')");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Sabor adicionado com sucesso :)";
        }

    }

    function updateSabor($sabor) {

        $id   = $sabor['id'];
        $tipo = $sabor['tipo'];

        $query = $this->db->query("UPDATE sabor SET tipo='$tipo' WHERE id='$id'");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Sabor adicionado com sucesso :)";
        }

    }


    function deleteSabor($id) {
        if( ! $this->db->query("DELETE FROM sabor WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Sabor removido com sucesso :)";
        }
    }

}
