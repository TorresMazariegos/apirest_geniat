<?php 
/*
$url = "http://restful-php-torres.com/post";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer {token}",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);
 */
$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

if(count(array_filter($arrayRutas)) == 0){
			
	$json = array(

	"detalle"=>"no encontrado"

	);

	echo json_encode($json, true);

	return;

}else{

	/*=============================================
	Cuando pasamos solo un índice en el array $arrayRutas
	=============================================*/

	if(count(array_filter($arrayRutas)) == 1){			
		
		/*=============================================
		Cuando se hace peticiones desde registro
		=============================================*/

		if(array_filter($arrayRutas)[1] == "login"){

			/*=============================================
			Peticiones POST
			=============================================*/

			if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

				/*=============================================
				Capturar datos
				=============================================*/

				$datos = array( "email"=>$_POST["email"],
								"password"=>$_POST["password"]
								);

				$login = new LoginController();
				$login -> login($datos);

			}else{

				$json = array(

					"detalle"=>"no encontrado"

				);

				echo json_encode($json, true);

				return;

			}

		}else if(array_filter($arrayRutas)[1] == "post"){

			/*=============================================
			
			=============================================*/

			if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET"){

			

				$token = $_GET["token"];
				print_r($token); return;
				$post = new PostController();
				$post -> index(null);

			}else{

				$json = array(

					"detallet"=>"no encontrado"

				);

				echo json_encode($json, true);

				return;

			}

		}else{
			//print_r("print"); return;
			$json = array(

				"detalle"=>"no encontrado"

			);

			echo json_encode($json, true);

			return;

		}

		

	}else{

		/*=============================================
		Add users
		=============================================*/

		if(array_filter($arrayRutas)[1] == "users" && array_filter($arrayRutas)[2] == "add"){

			/*=============================================
			Peticiones POST
			=============================================*/

			if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

				/*=============================================
				Capturar datos
				=============================================*/

				$datos = array( "name"=>$_POST["name"],
								"lastname"=>$_POST["lastname"],
								"email"=>$_POST["email"],
								"password"=>$_POST["password"],
								"rol_id"=>$_POST["rol_id"],
								"status"=>$_POST["status"]);

				$registro = new UsersController();
				$registro -> create($datos);	

			}else{

				$json = array(

					"detalle"=>"no encontrado"

				);

				echo json_encode($json, true);

				return;

			}

		}else if(array_filter($arrayRutas)[1] == "post" && array_filter($arrayRutas)[2] == "add"){

			/*=============================================
			Peticiones POST
			=============================================*/

			if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

				/*=============================================
				Capturar datos
				=============================================*/

				$datos = array( "title"=>$_POST["title"],
								"description"=>$_POST["description"],
								"status"=>$_POST["status"],
								"user_created_id"=>$_POST["user_created_id"]
								);

				$post = new PostController();
				$post -> create($datos);	

			}else{

				$json = array(

					"detalle"=>"no encontrado"

				);

				echo json_encode($json, true);

				return;

			}

		}else if(array_filter($arrayRutas)[1] == "post" && array_filter($arrayRutas)[2] == "update" && is_numeric(array_filter($arrayRutas)[3])){

			/*=============================================
			Peticiones POST
			=============================================*/

			if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "PUT"){

				/*=============================================
				Capturar datos
				=============================================*/
				$datos = array();

				parse_str(file_get_contents('php://input'), $datos);
				//$res = file_get_contents('php://input');
				//print_r($res); return;

				$editarPost = new PostController();
				$editarPost -> update(array_filter($arrayRutas)[3], $datos);

			}else{

				$json = array(

					"detalleq"=>"no encontrado"

				);

				echo json_encode($json, true);

				return;

			}

		}else {

			$json = array(

				"detalle"=>"no encontrado"

			);

			echo json_encode($json, true);

			return;

		}

		

	}

}



