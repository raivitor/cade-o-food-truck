<?php
class Rota_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM rota");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $users[] = $row;
            }
            return $users;
        }
    }

    function getRota($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM rota WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createRota($nova_rota) {

       $rua             = $nova_rota['rua'];
       $cep             = $nova_rota['cep'];
       $cidade          = $nova_rota['cidade'];
       $estado          = $nova_rota['estado'];
       $dia_da_semana   = $nova_rota['dia_da_semana'];
       $hora_de_inicio  = $nova_rota['hora_de_inicio'];
       $hora_de_termino = $nova_rota['hora_de_termino'];
       $food_truck_id   = $nova_rota['food_truck_id'];
       $geoposicao_id   = $nova_rota['geoposicao_id'];


       $query = "INSERT INTO rota (rua, cep, cidade, estado, dia_da_semana,
                 hora_de_inicio, hora_de_termino, food_truck_id, geoposicao_id)
                 VALUES ('$rua', '$cep', '$cidade', '$estado', '$dia_da_semana',
                 '$hora_de_inicio', '$hora_de_termino', '$food_truck_id', 
                 '$geoposicao_id')";

        if ( ! $this->db->query($query))
        {
            return $this->db->error();
        } else {
            return "Rota adicionada com sucesso :)";
        }
    }

    function updateRota($nova_rota) {
       $id              = $nova_rota['id'];
       $rua             = $nova_rota['rua'];
       $cep             = $nova_rota['cep'];
       $cidade          = $nova_rota['cidade'];
       $estado          = $nova_rota['estado'];
       $dia_da_semana   = $nova_rota['dia_da_semana'];
       $hora_de_inicio  = $nova_rota['hora_de_inicio'];
       $hora_de_termino = $nova_rota['hora_de_termino'];
       $food_truck_id   = $nova_rota['food_truck_id'];
       $geoposicao_id   = $nova_rota['geoposicao_id'];

       $query = "UPDATE rota SET rua='$rua', cep='$cep', cidade='$cidade', estado='$estado', dia_da_semana='$dia_da_semana', hora_de_inicio='$hora_de_inicio', hora_de_termino='$hora_de_termino', food_truck_id='$food_truck_id', geoposicao_id='$geoposicao_id' WHERE id='$id'"; 

       if( ! $this->db->query($query)) {
            return $this->db->error();
        } else {
            return "Rota atualizada com sucesso :)";
        }
    }

    function deleteUser($id) {
        if ( ! $this->db->query("DELETE FROM rota WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Rota removido com sucesso :)";
        }
    }

}
