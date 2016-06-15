<?php
class Usuario_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM usuario");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $users[] = $row;
            }
            return $users;
        }
    }

    function getUser($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM usuario WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function getPapel($email) {
        $query = $this->db->query("SELECT papel FROM usuario WHERE email='$email'");
        if($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function createUser($new_user) {

       $nome  = $new_user['nome'];
       $senha = $new_user['senha'];
       $email = $new_user['email'];
       $data  = $new_user['nascimento'];
       $cpf   = $new_user['cpf'];
       $papel = $new_user['papel'];
       $sexo  = $new_user['sexo'];

       $query = "INSERT INTO usuario (nome, senha, email,
                 data_de_nascimento, cpf, papel, sexo) VALUES 
                 ('$nome', '$senha', '$email',
                 '$data', '$cpf', '$papel', '$sexo')";

        if ( ! $this->db->query($query))
        {
          return $this->db->error();
        } else {
            return false;
        }
    }

    function updateUser($user) {
       $id    = $user['id'];
       $nome  = $user['name'];
       $senha = $user['password'];
       $email = $user['email'];
       $data  = $user['birthday'];
       $cpf   = $user['cpf'];
       $papel = $user['papel'];
       $sexo  = $user['sexo'];

       $query = "UPDATE usuario SET email='$email', nome='$nome', senha='$senha', data_de_nascimento='$data', cpf='$cpf', papel='$papel', sexo='$sexo' WHERE id='$id'"; 

       if( ! $this->db->query($query)) {
            return $this->db->error();
        } else {
            return "Usuario atualizado com sucesso :)";
        }
    }

    function deleteUser($id) {
        if ( ! $this->db->query("DELETE FROM usuario WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Usuario removido com sucesso :)";
        }
    }

}
