<?php
class Cardapio_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM item_de_cardapio");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $users[] = $row;
            }
            return $users;
        }
    }

    function getItemDeCardapio($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM item_de_cardapio WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createItemDeCardapio() {

       $nome         = $item['nome'];
       $preco        = $item['preco'];
       $ingredientes = $item['ingredientes'];
       $descricao    = $item['descricao'];

       $query = "INSERT INTO item_de_cardapio (nome, preco, ingredientes, descricao) VALUES 
                 ('$nome', '$preco', '$ingredientes', '$descricao')";

        if ( ! $this->db->query($query))
        {
            return $this->db->error();
        } else {
            return "Cardapio adicionado com sucesso :)";
        }
    }

    function updateItemDeCardapio($item) {
       $id            = $item['id'];
       $nome          = $item['nome'];
       $preco         = $item['preco'];
       $descicao      = $item['descricao'];
       $ingredientes  = $item['ingredientes'];

       $query = "UPDATE item_de_cardapio SET nome='$nome', preco='$preco', descricao='$descricao', ingredientes='$ingredientes'  WHERE id='$id'"; 

       if( ! $this->db->query($query)) {
            return $this->db->error();
        } else {
            return "Cardapio atualizado com sucesso :)";
        }
    }

    function deleteItemDeCardapio($id) {
        if ( ! $this->db->query("DELETE FROM item_de_cardapio WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Cardapio removido com sucesso :)";
        }
    }
}
