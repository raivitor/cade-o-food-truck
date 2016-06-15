<?php
class Promocao_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM promocao");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $promocoes[] = $row;
            }
            return $promocoes;
        }
    }

    function getPromocao($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM promocao WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createPromocao($nova_promocao) {
                
        $desconto            = $nova_promocao['desconto'];
        $valor               = $nova_promocao['valor'];
        $data_de_inicio      = $nova_promocao['data_de_inicio'];
        $data_de_termino     = $nova_promocao['data_de_termino']; 
        $food_truck_id       = $nova_promocao['food_truck_id'];
        $item_de_cardapio_id = $nova_promocao['item_de_cardapio_id'];

        $query = "INSERT INTO promocao (desconto, valor, data_de_inicio, data_de_termino, food_truck_id, item_de_cardapio_id)
                 VALUES ('$desconto', '$valor', '$data_de_inicio', '$data_de_termino', '$food_truck_id', '$item_de_cardapio_id')";

        if ( ! $this->db->query($query))
        {
            return $this->db->error();
        } else {
            return "Promocao adicionada com sucesso :)";
        }
    }

    function updatePromocao($promocao) {
        
        $id                  = $promocao['id'];
        $desconto            = $promocao['desconto'];
        $valor               = $promocao['valor'];
        $data_de_inicio      = $promocao['data_de_inicio'];
        $data_de_termino     = $promocao['data_de_termino']; 
        $item_de_cardapio_id = $promocao['item_de_cardapio_id'];
  
       $query = "UPDATE promocao SET desconto='$desconto', valor='$valor', data_de_inicio='$data_de_inicio', data_de_termino='$data_de_termino', item_de_cardapio_id='$item_de_cardapio_id' WHERE id='$id'"; 

       if( ! $this->db->query($query)) {
            return $this->db->error();
        } else {
            return "Promocao atualizada com sucesso :)";
        }
    }

    function deletePromocao($id) {
        if ( ! $this->db->query("DELETE FROM promocao WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Promocao removida com sucesso :)";
        }
    }

}
