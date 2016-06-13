<?php
	require_once ('requiments.php');

	public class CtrlUsuario extends AbstractCtrl{

		
		public function create($obj){
			$usuario = new MdlUsuario();
			$code = $usuario->create($obj);

			if($code == "0000"){
				echo json_encode (1);
			} else{
				echo json_encode ($code);
			}

		}

		public function read($id){
			if($id == null || $id == '') return 0;

			$user = new MdlUsuario();
			$result = $user->read($id);

			if($result){
				echo json_encode ($result);
			} else{
				echo json_encode ($stmt->errorCode());
			}
		}

		public function update($id){

			$user = new MdlUsuario();
			$result = $user->update($id);
			
			if($code == "0000"){
				echo json_encode (1);
			} else{
				echo json_encode ($stmt->errorCode());
			}
		}


		public function delete($id){

			$user = new MdlUsuario();
			$code = $user->delete($id);

			if($code == "0000"){
				echo json_encode (1);
			} else{
				echo json_encode ($stmt->errorCode());
			}
		}
	}

	$ctrlUsuario = new CtrlUsuario();
	$ctrlUsuario->service($_POST);
?>