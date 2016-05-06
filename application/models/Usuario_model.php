<?php
class Usuario_model extends CI_Model {
    /**
	 * Grava os dados na tabela.
	 * @param $dados. Array que contém os campos a serem inseridos
	 * @param Se for passado o $id via parâmetro, então atualiza o registro em vez de inseri-lo.
	 * @return boolean
	 */
	public function store($dados = null, $id = null) {
		if ($dados) {
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("usuarios", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("usuarios", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
	}

    /**
	 * Recupera o registro do banco de dados
	 * @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
	 * @return objeto da banco de dados da tabela cadastros
	 */
	public function get($id = null){
		if ($id) {
			$this->db->where('id', $id);
		}
		return $this->db->get('usuarios')->result_array();;
	}

    /**
	 * Deleta um registro.
	 * @param $id do registro a ser deletado
	 * @return boolean;
	 */
    public function deleteUser($id = null){
    	if ($id) {
			return $this->db->where('id', $id)->delete('usuarios');
		}
    }

    /**
    * Realiza o login do usuário
    * @param $email - Email do usuário
    * @param $senha - Senha do usuário
    * @return Usuário se tiver, se não null
    */
    public function Autenticar($email, $senha) {
	    $this->db->where("email", $email);
	    $this->db->where("senha", $senha);
	    $usuario = $this->db->get("usuarios")->row_array();
	    return $usuario;
	}
}