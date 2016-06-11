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

    function createUser($new_user) {

       $nome  = $new_user['name'];
       $senha = $new_user['password'];
       $email = $new_user['email'];
       $data  = $new_user['birthday'];
       $cpf   = $new_user['cpf'];

       $query = "INSERT INTO usuario (nome, senha, email,
                 data_de_nascimento, cpf) VALUES 
                 ('$nome', '$senha', '$email',
                 '$data', '$cpf')";

        if ( ! $this->db->query($query))
        {
            return $this->db->error();
        } else {
            return "Usuario adicionado com sucesso :)";
        }
    }

    function updateUser($user) {
       $id    = $user['id'];
       $nome  = $user['name'];
       $senha = $user['password'];
       $email = $user['email'];
       $data  = $user['birthday'];
       $cpf   = $user['cpf'];

       $query = "UPDATE usuario SET email=$email, nome='$name',
                 senha='$password',data_de_nascimento='$data', 
                 cpf='$cpf' WHERE id=$id"; 

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
