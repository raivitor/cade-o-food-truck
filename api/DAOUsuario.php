<?php
public class MdlUsuario extends AbstractModel{

	public function create($obj){
		
		$conn = Conectar();

		$query = "INSERT INTO usuario (nome, email, senha, data_de_nascimento, cpf) VALUES (:nome, :email, :senha, :nascimento, :cpf)";
		
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':nome', $obj->$nome);
		$stmt->bindValue(':email', $obj->$email);
		$stmt->bindValue(':senha', $obj->senha);
		$stmt->bindValue(':cpf', $cpf);
		$stmt->bindValue(':nascimento', $nascimento);
		$stmt->execute();

		$conn = NULL;

		return $stmt->errorCode();
	}

	public function read($id){
		
		$conn = Conectar();

		$query = "SELECT * FROM usuario WHERE id = :id";

		$stmt = $conn->prepare($query);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$conn = NULL;
		return $result;

	}

	public function update($obj){
		$conn = Conectar();
		$query = "UPDATE usuario SET email = :email, email = :email, senha = :senha, data_de_nascimento = :nascimento WHERE id = :id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':idCliente', $idcliente);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':senha', $senha);
		$stmt->bindValue(':data_de_nascimento', $nascimento);
		$stmt->bindValue(':codigoPromo', $codigoPromo);
		$stmt->execute();

		$conn = NULL;
		return $stmt->errorCode();

	}

	public function delete($id){
		$conn = Conectar();

		$query = "DELETE FROM usuario WHERE id = :id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$conn = NULL;
		return $stmt->errorCode();
	}
}
?>