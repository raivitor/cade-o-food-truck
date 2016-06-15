<?php
class Favorito_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM favorito");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $favoritos[] = $row;
            }
            return $favoritos;
        }
    }

    function getFavorito($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM favorito WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createFavorito($novo_favorito) {

        $cliente_id    = $novo_favorito['cliente_id'];
        $food_truck_id = $novo_favorito['food_truck_id'];
        
        $query = $this->db->query("INSERT INTO favorito (cliente_id, food_truck_id) VALUES ('$cliente_id', '$food_truck_id') ");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Favorito realizado com sucesso :)";
        }
    }

    function deleteFavorito($id) {
        if( ! $this->db->query("DELETE FROM favorito WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Favorito removido com sucesso :)";
        }
    }

}
