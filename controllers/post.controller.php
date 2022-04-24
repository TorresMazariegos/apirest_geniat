<?php 

class PostController{

	/*=============================================
	Mostrar todos los registros
	=============================================*/

	public function index($page){

		/*=============================================
		Validar credenciales del cliente
		=============================================*/

		//$clientes = UsersModel::index();

		//if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){

			//foreach ($clientes as $key => $valueCliente) {
				
				//if( "Basic ".base64_encode($_SERVER['PHP_AUTH_USER'].":".$_SERVER['PHP_AUTH_PW']) == 
					//"Basic ".base64_encode($valueCliente["id_cliente"].":".$valueCliente["llave_secreta"]) ){				

					

                    $post = PostModel::index();

					

					if(!empty($post)){

						$json = array(

							"status"=>200,
							"total_registros"=>count($post),
							"detalle"=>$post

						);

						echo json_encode($json, true);

						return;

					}else{

						$json = array(

				    		"status"=>200,
				    		"total_registros"=>0,
				    		"detalles"=>"No hay ningún curso registrado"
				    		
				    	);

						echo json_encode($json, true);	

						return;

					}


				/*}else{

					$json = array(

			    		"status"=>404,
			    		"detalles"=>"El token es inválido"
			    		
			    	);

				}*/

			//}

		/*}else{

			$json = array(

	    		"status"=>404,
	    		"detalles"=>"No está autorizado para recibir los registros"
	    		
	    	);

		}*/

		echo json_encode($json, true);	

		return;  	

		

	}

	/*=============================================
	Crear un curso
	=============================================*/

	public function create($datos){

		/*=============================================
		Validar credenciales del cliente
		=============================================*/

		//$clientes = UsersModel::index("clientes");

		//if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){

			//foreach ($clientes as $key => $valueCliente) {
				
				//if( "Basic ".base64_encode($_SERVER['PHP_AUTH_USER'].":".$_SERVER['PHP_AUTH_PW']) == 
				//	"Basic ".base64_encode($valueCliente["id_cliente"].":".$valueCliente["llave_secreta"]) ){

					/*=============================================
					data validation
					=============================================*/

					foreach ($datos as $key => $valueDatos) {

						if(isset($valueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $valueDatos)){

							$json = array(

								"status"=>404,
								"detalle"=>"Error en el campo ".$key

							);

							echo json_encode($json, true);

							return;
						}

					}

					/*=============================================
					Validar que el titulo o la descripcion no estén repetidos
					=============================================*/

					$post = PostModel::index();
					
					foreach ($post as $key => $value) {
						
						if($value->title == $datos["title"]){

							$json = array(

								"status"=>404,
								"detalle"=>"El título ya existe en la base de datos"

							);

							echo json_encode($json, true);	

							return;

						}

						if($value->description == $datos["description"]){

							$json = array(

								"status"=>404,
								"detalle"=>"La descripción ya existe en la base de datos"

							);

							echo json_encode($json, true);	

							return;

							
						}

					}

				
					/*=============================================
					Llevar datos al modelo
					=============================================*/
	
					$datos = array( "title"=>$datos["title"],
									"description"=>$datos["description"],
									"status"=>$datos["status"],
									"user_created_id"=>$datos["user_created_id"],
									"created_at"=>date('Y-m-d h:i:s'),
									"updated_at"=>date('Y-m-d h:i:s'));

					$create = PostModel::create($datos);

					/*=============================================
					Respuesta del modelo
					=============================================*/

					if($create == "ok"){

				    	$json = array(
			        	 	"status"=>200,
				    		"detalle"=>"Registro exitoso, su curso ha sido guardado"

				    	); 
				    	
				    	echo json_encode($json, true); 

				    	return;    	

			   	 	}
				
				/*}else{

					$json = array(

			    		"status"=>404,
			    		"detalles"=>"El token es inválido"
			    		
			    	);

				}*/

			//}

		/*}else{

			$json = array(

	    		"status"=>404,
	    		"detalles"=>"No está autorizado para recibir los registros"
	    		
	    	);

		}*/

		echo json_encode($json, true);	

		return;  	

	}

    /*=============================================
	Show one post
	=============================================*/

	public function show($id){

		
		//$clientes = UsersModel::index("clientes");

		//if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){

			//foreach ($clientes as $key => $valueCliente) {
				
				//if( "Basic ".base64_encode($_SERVER['PHP_AUTH_USER'].":".$_SERVER['PHP_AUTH_PW']) == 
					//"Basic ".base64_encode($valueCliente["id_cliente"].":".$valueCliente["llave_secreta"]) ){

					/*=============================================
					Mostrar todos los cursos
					=============================================*/

					$post = PostModel::show($id);
                    print_r($post); return;
					if(!empty($post)){

						$json = array(

							"status"=>200,
							"detalle"=>$post

						);

						echo json_encode($json, true);

						return;

					}else{

						$json = array(

				    		"status"=>200,
				    		"total_registros"=>0,
				    		"detalles"=>"No hay ningún curso registrado"
				    		
				    	);

						echo json_encode($json, true);	

						return;

					}


				/*}else{

					$json = array(

			    		"status"=>404,
			    		"detalles"=>"El token es inválido"
			    		
			    	);

				}

			}

		}else{

			$json = array(

	    		"status"=>404,
	    		"detalles"=>"No está autorizado para recibir los registros"
	    		
	    	);

		}*/

		echo json_encode($json, true);	

		return;  	

	}

	/*=============================================
	Update post
	=============================================*/

	public function update($id, $datos){

		/*=============================================
		Validar credenciales del cliente
		=============================================*/

		//$clientes = UsersModel::index("clientes");

		//if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){

			//foreach ($clientes as $key => $valueCliente) {
				
				//if( "Basic ".base64_encode($_SERVER['PHP_AUTH_USER'].":".$_SERVER['PHP_AUTH_PW']) == 
				//	"Basic ".base64_encode($valueCliente["id_cliente"].":".$valueCliente["llave_secreta"]) ){

					/*=============================================
					Data validation
					=============================================*/

					foreach ($datos as $key => $valueDatos) {

						if(isset($valueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $valueDatos)){

							$json = array(

								"status"=>404,
								"detalle"=>"Error en el campo ".$key

							);

							echo json_encode($json, true);

							return;
						}

					}

					/*=============================================
					Validation of id user created
					=============================================*/

					$curso = PostModel::show($id);

					foreach ($curso as $key => $valueCurso) {
						
						if($valueCurso->user_created_id == 1){

							/*=============================================
							Llevar datos al modelo
							=============================================*/
			
							$datos = array( "id"=>$id,
											"title"=>$datos["title"],
											"description"=>$datos["description"],
											"status"=>$datos["status"],
											"updated_at"=>date('Y-m-d h:i:s'));

							$update = PostModel::update($datos);

							/*=============================================
							Respuesta del modelo
							=============================================*/

							if($update == "ok"){

						    	$json = array(
					        	 	"status"=>200,
						    		"detalle"=>"Registro exitoso, su curso ha sido actualizado"

						    	); 
						    	
						    	echo json_encode($json, true); 

						    	return;    	

					   	 	}

						}else{

							$json = array(

						    		"status"=>404,
						    		"detalle"=>"No está autorizado para modificar este curso"
						    	
						    	);

					    	echo json_encode($json, true);

					    	return;

						}

					}
		
				/*}else{

					$json = array(

			    		"status"=>404,
			    		"detalles"=>"El token es inválido"
			    		
			    	);

				}

			}

		}else{

			$json = array(

	    		"status"=>404,
	    		"detalles"=>"No está autorizado para recibir los registros"
	    		
	    	);

		}*/

		echo json_encode($json, true);	

		return;  	

	}

	/*=============================================
	Borrar curso
	=============================================*/

	public function delete($id){

		/*=============================================
		Validar credenciales del cliente
		=============================================*/

		$clientes = UsersModel::index("clientes");

		if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){

			foreach ($clientes as $key => $valueCliente) {
				
				if( "Basic ".base64_encode($_SERVER['PHP_AUTH_USER'].":".$_SERVER['PHP_AUTH_PW']) == 
					"Basic ".base64_encode($valueCliente["id_cliente"].":".$valueCliente["llave_secreta"]) ){

					/*=============================================
					Validar id creador
					=============================================*/

					$curso = ModeloCursos::show("cursos","clientes", $id);

					foreach ($curso as $key => $valueCurso) {
						
						if($valueCurso->id_creador == $valueCliente["id"]){

							/*=============================================
							Llevar datos al modelo
							=============================================*/
						
							$delete = ModeloCursos::delete("cursos", $id);

							/*=============================================
							Respuesta del modelo
							=============================================*/

							if($delete == "ok"){

						    	$json = array(
					        	 	"status"=>200,
						    		"detalle"=>"Se ha borrado su curso con éxito"

						    	); 
						    	
						    	echo json_encode($json, true); 

						    	return;    	

					   	 	}

						}else{

							$json = array(

						    		"status"=>404,
						    		"detalle"=>"No está autorizado para borrar este curso"
						    	
						    	);

					    	echo json_encode($json, true);

					    	return;

						}

					}
		
				}else{

					$json = array(

			    		"status"=>404,
			    		"detalles"=>"El token es inválido"
			    		
			    	);

				}

			}

		}else{

			$json = array(

	    		"status"=>404,
	    		"detalles"=>"No está autorizado para recibir los registros"
	    		
	    	);

		}

		echo json_encode($json, true);	

		return;  	


	}


}