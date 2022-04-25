<?php 
require_once 'vendor/autoload.php';

class LoginController{

	/*=============================================
	Crear un registro
	=============================================*/

	public function login($datos){

		

		/*=============================================
		Validar que exista el usuario con estatus 1
		=============================================*/

		$user  = LoginModel::login($datos["email"], $datos["password"]);
		//print_r($user); return;
		if( $user == "No found"){
			$json = array(

				"status"=>401,
				"detalle"=>"Usuario o contraseña erronea"

			);

			echo json_encode($json, true);

			return;
		}else{

			//foreach ($user as $key => $value) {
			
				if($datos["email"] == $user["email"] && $datos["password"] == $user["password"] ){
	
					$token = Auth::SignIn([
						'id' => $user["id"],
							'email' => $user["email"],
							'rol_id' => $user["rol_id"]
					]);
	
					$json = array(
	
						"status"=>200,
						"detalle"=>"Success",
						'token' => $token
	
					);
	
					echo json_encode($json, true);
	
					return;
	
				}else{
	
					$json = array(
	
						"status"=>400,
						"detalle"=>"Acceso denegado"
	
					);
	
					echo json_encode($json, true);
	
					return;
	
				}
			

		}

		
    }
}