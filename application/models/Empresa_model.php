<?php
class Empresa_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM empresa");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $empresas[] = $row;
            }
            return $empresas;
        }
    }

    function getEmp($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM empresa WHERE id='$id'");
            if($query->num_rows() == 1) {
               return $query->result();
            }
        }
    }

    function getEmpDono($idDono) {
        if($idDono) {
            $query = $this->db->query("SELECT * FROM empresa WHERE dono_id='$idDono'");
            foreach($query->result() as $row) {
              $empresas[] = $row;
            }
            return $empresas;
        }
    }    

    function createEmp($new_emp) {

       $nome  = $new_emp['name'];
       $cnpj  = $new_emp['cnpj'];
       $idDono = $new_emp['idDono'];

       $query = "INSERT INTO empresa (nome, cnpj, idDono) VALUES ('$nome', '$cnpj', '$idDono')";

       if(!$this->db->query($query)){
          return $this->db->error();
        } else {
          return true;
        }
    }

    function updateEmp($emp) {
       $id    = $emp['id'];
       $nome  = $emp['nome'];
       $cnpj  = $emp['cnpj'];

       $query = "UPDATE empresa SET nome='$nome', cnpj='$cnpj' WHERE id='$id'"; 

       if(!$this->db->query($query)) {
            return $this->db->error();
        } else {
            return true;
        }
    }

    function deleteEmp($id) {
        if ( ! $this->db->query("DELETE FROM empresa WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return true;
        }
    }
} 