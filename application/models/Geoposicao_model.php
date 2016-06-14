<?php
class Geoposicao_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM geoposicao");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $geoposicoes[] = $row;
            }
            return $geoposicoes;
        }
    }

    function getGeoposicao($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM geoposicao WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createGeoposicao($geoposicao) {

        $latitude  = $geoposicao['latitude'];
        $longitude = $geoposicao['longitude']; 

        $query = $this->db->query("INSERT INTO geoposicao (latitude, longitude) VALUES ('$latitude', '$longitude')");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Geoposicao adicionado com sucesso :)";
        }
    }

    function updateGeoposicao($geoposicao) {

        $id   = $geoposicao['id'];
        $latitude  = $geoposicao['latitude'];
        $longitude = $geoposicao['longitude']; 

        $query = $this->db->query("UPDATE geoposicao SET latitude='$latitude', longitude='$longitude' WHERE id='$id'");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Geoposicao atualizada com sucesso :)";
        }
    }

    function deleteGeoposicao($id) {
        if( ! $this->db->query("DELETE FROM geoposicao WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Geoposicao removida com sucesso :)";
        }
    }

}
