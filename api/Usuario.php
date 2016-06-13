<?php
	public class Usuario{
		private $id;
		private $email;
		private $nome;
		private $senha;
		private $nascimento;
		private $cpf;

		function  __construct($id = 0, $email = 0, $nome = 0, $senha = 0, $nascimento = 0, $cpf = 0){
			self::$id = $id;
			self::$email = $email;
			self::$nome = $nome;
			self::$senha = $senha;
			self::$nascimento = $nascimento;
			self::$cpf = $cpf;	
		}
	}
?>