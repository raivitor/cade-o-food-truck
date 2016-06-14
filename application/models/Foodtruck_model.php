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
            foreach($query->result() as $row) {
              $foodtrucks[] = $row;
            }
            return $foodtrucks;
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

       $nome  = $new_emp['name'];
       $cnpj  = $new_emp['cnpj'];
       $idDono = $new_emp['idDono'];

       $query = "INSERT INTO foodtruck (nome, cnpj, idDono) VALUES ('$nome', '$cnpj', '$idDono')";

       if(!$this->db->query($query)){
          return $this->db->error();
        } else {
          return true;
        }
    }

    function updateTruck($emp) {
       $id    = $emp['id'];
       $nome  = $emp['nome'];
       $cnpj  = $emp['cnpj'];

       $query = "UPDATE foodtruck SET nome='$nome', cnpj='$cnpj' WHERE id='$id'"; 

       if( ! $this->db->query($query)) {
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

    function assocGerente($idGerente){

    }

}
