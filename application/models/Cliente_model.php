<?php
class Cliente_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM cliente");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $gerentes[] = $row;
            }
            return $gerentes;
        }
    }

    function getCliente($id) {
        if($id) {
            $query = $this->db->query("SELECT * FROM cliente WHERE id='$id'");
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
    }

    function createCliente($novo_cliente) {

        $usuario_email = $novo_cliente['usuario_email'];
        $geoposicao_id = $novo_cliente['geoposicao_id'];
        
        $query = $this->db->query("INSERT INTO cliente (usuario_email, geoposicao_id) SELECT usuario.email,geoposicao.id FROM usuario,geoposicao WHERE email='$usuario_email' AND geoposicao.id='$geoposicao_id'");
        
        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Cliente adicionado com sucesso :)";
        }
    }

    function updateCliente($cliente) {

        $id        = $cliente['id'];
        $latitude  = $cliente['latitude'];
        $longitude = $cliente['longitude'];

        $query = $this->db->query("UPDATE geoposicao g INNER JOIN cliente c
                                   ON g.id=c.geoposicao_id SET 
                                   g.latitude='$latitude',
                                   g.longitude='$longitude' WHERE c.id='$id'");

        if( ! $query || ! empty($query)) {
            return $this->db->error();
        } else {
            return "Cliente atualizado com sucesso :)";
        }
    }

    function deleteCliente($id) {
        if( ! $this->db->query("DELETE FROM cliente WHERE id='$id'")) {
            return $this->db->error();
        } else {
            return "Cliente removido com sucesso :)";
        }
    }

}
