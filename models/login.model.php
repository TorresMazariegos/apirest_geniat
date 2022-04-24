<?php 

require_once "conexion.php";

class LoginModel{

	/*=============================================
	 Login
	=============================================*/

	static public function login($email, $password){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM users where email = '$email' and password = '$password' and status = 1");

		$stmt -> execute();
		$num = $stmt->rowCount();
		//print_r($num ); return;

		if($num>0){
 
			// get record details / values
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
			return $row;
		}else{
			return "No found";
		}

		//return $stmt -> fetchAll();

	    $stmt -> close();

	    $stmt -= null;

	}

}