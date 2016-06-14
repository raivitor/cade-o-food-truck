<?php
class Categoria_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM categoria");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $categoriaes[] = $row;
            }
            return $categoriaes;
        }
    }

    function getCategoria($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM categoria WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createCategoria($nome) {
        
        $query = $this->db->query("INSERT INTO categoria (nome) VALUES ('$nome')");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Categoria adicionado com sucesso :)";
        }

    }

    function updateCategoria($categoria) {

        $id   = $categoria['id'];
        $nome = $categoria['nome'];

        $query = $this->db->query("UPDATE categoria SET nome='$nome' WHERE id='$id'");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Categoria adicionado com sucesso :)";
        }

    }


    function deleteCategoria($id) {
        if( ! $this->db->query("DELETE FROM categoria WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Categoria removido com sucesso :)";
        }
    }

}
