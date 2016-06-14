<?php
class Foodtruck_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM foodtruck");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $foodtrucks[] = $row;
            }
            return $foodtrucks;
        }
    }

    function getTruck($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM foodtruck WHERE id='id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function getTruckGerente($idGerente) {
        if($idGerente) {
            $query = $this->db->query("SELECT * FROM foodtruck WHERE gerente_id='idGerente'");
            foreach($query->result() as $row) {
              $foodtrucks[] = $row;
            }
            return $foodtrucks;
        }
    }

    function getTruckEmpresa($idEmpresa) {
      if($idEmpresa) {
          $query = $this->db->query("SELECT * FROM foodtruck WHERE empresa_id='idEmpresa'");
          foreach($query->result() as $row) {
            $foodtrucks[] = $row;
          }
          return $foodtrucks;
      }
    }    

    function createTruck($new_emp) {
       $nome        = $new_truck['nome'];
       $descricao   = $new_truck['descricao'];
       $telefone    = $new_truck['telefone'];
       $logo        = $new_truck['logo'];
       $fotos       = $new_truck['fotos'];

       $query = "INSERT INTO foodtruck (nome, descricao, telefone, logo, fotos) VALUES ('$nome', '$descricao', '$telefone', '$logo', '$fotos')";

       if(!$this->db->query($query)){
          return $this->db->error();
        } else {
          return true;
        }
    }

    function updateTruck($truck) {
       $id          = $truck['id'];
       $nome        = $truck['nome'];
       $descricao   = $truck['descricao'];
       $telefone    = $truck['telefone'];
       $logo        = $truck['logo'];
       $fotos       = $truck['fotos'];

       $query = "UPDATE foodtruck SET nome = '$nome', descricao = '$descricao', telefone = '$telefone', logo = '$logo', fotos = '$fotos' WHERE id='$id'"; 

       if(!$this->db->query($query)) {
            return $this->db->error();
        } else {
            return true;
        }
    }

    function deleteTruck($id) {
        if (!$this->db->query("DELETE FROM foodtruck WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return true;
        }
    }

    function assocGerente($idGerente, $idTruck){
      $query = "UPDATE foodtruck SET gerente_id = '$idGerente' where id = '$idTruck'";
      
        if(!$this->db->query($query)) {
            return $this->db->error();
        } else {
            return true;
        }
    }

}
