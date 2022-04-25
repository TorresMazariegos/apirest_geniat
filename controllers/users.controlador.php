<?php 

class UsersController{

	/*=============================================
	Crear un registro
	=============================================*/

	public function create($datos){
		
		/*=============================================
		Validar nombre
		=============================================*/

		if(isset($datos["name"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["name"])){

			$json = array(
				"status"=>404,
				"detalle"=>"Error en el campo nombre, sólo se permiten letras"
			);

			echo json_encode($json, true);

			return;
		}

		/*=============================================
		Validar apellido
		=============================================*/

		if(isset($datos["lastname"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["lastname"])){

			$json = array(

				"status"=>404,
				"detalle"=>"Error en el campo apellido, sólo se permiten letras"

			);

			echo json_encode($json, true);

			return;
		}

		/*=============================================
		Validar email
		=============================================*/

		if(isset($datos["email"]) && !preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $datos["email"])){

			$json = array(

				"status"=>404,
				"detalle"=>"Error en el campo email, coloca un email válido"

			);

			echo json_encode($json, true);

			return;
		}

		/*=============================================
		Validar que el email no esté repetido
		=============================================*/

		$clientes  = UsersModel::index("users");
		
		foreach ($clientes as $key => $value) {
			
			if($value["email"] == $datos["email"]){

				$json = array(

					"status"=>404,
					"detalle"=>"El email ya existe en la base de datos"

				);

				echo json_encode($json, true);

				return;

			}
		}

		// Validate permissions		
        $token = Auth::Check($datos['token']);
        $permission = Auth::ValidateRol($datos['token'], 'eliminar');
        //print_r($permission); 

        if($token){

            if($permission){

				$datos = array("name"=>$datos["name"],
								"lastname"=>$datos["lastname"],
								"email"=>$datos["email"],
								"password"=>$datos["password"],
								"rol_id"=>$datos["rol_id"],
								"status"=>$datos["status"],
								//"id_cliente"=>$id_cliente,
								//"llave_secreta"=>$llave_secreta,
								"created_at"=>date('Y-m-d h:i:s'),
								"updated_at"=>date('Y-m-d h:i:s')
								);

				$create = UsersModel::create("users", $datos);

				/*=============================================
				Respuesta del modelo
				=============================================*/

				if($create == "ok"){

					$json = array(

							"status"=>200,
							"detalle"=>"Registro exitoso, usuario creado"

						);						

				}

			}else{

                $json = array(

                    "status"=>404,
                    "detalles"=>"No cuenta con los permisos para esta acción"
                    
                );

            }
			

		}else{

			$json = array(

	    		"status"=>404,
	    		"detalles"=>"El token es inválido"
	    		
	    	);

		}

		echo json_encode($json, true);

		return;

	}

}