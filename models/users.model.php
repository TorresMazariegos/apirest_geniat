<?php 

require_once "conexion.php";

class UsersModel{

	/*=============================================
	Mostrar todos los registros
	=============================================*/

	static public function index($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

	    $stmt -> close();

	    $stmt -= null;
	}

	/*=============================================
		Valida roles y permisos
	=============================================*/

	static public function validatePermission($user_id, $permiso){
		//print_r("Prueba");
		//return;
		$stmt = Conexion::conectar()->prepare("SELECT * FROM users
		inner join roles on users.rol_id = roles.id
		inner join roles_has_permissions as rpe on roles.id = rpe.rol_id
		inner join permissions as per on per.id = rpe.permission_id 
		where users.id = $user_id and per.name like '$permiso'");

		$stmt -> execute();
		$num = $stmt->rowCount();
		//print_r($stmt);
		//print_r('R: '.$num);
		//return;
		if($num == 1){
			
			return True;

		}else{

			return False;

		}
		//return $stmt -> fetchAll();
	    $stmt -> close();
	    $stmt -= null;
	}

	

	/*=============================================
	Crear un registro
	=============================================*/

	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(name, lastname, email ,password, rol_id, status, created_at, updated_at) VALUES (:name, :lastname, :email, :password, :rol_id, :status, :created_at, :updated_at)");

		$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":lastname", $datos["lastname"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		//$pass = password_hash($datos["password"],PASSWORD_BCRYPT);
		$pass = $datos["password"];
		$stmt -> bindParam(":password", $pass, PDO::PARAM_STR);
		$stmt -> bindParam(":rol_id", $datos["rol_id"], PDO::PARAM_STR);
		$stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
		//$stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
		//$stmt -> bindParam(":llave_secreta", $datos["llave_secreta"], PDO::PARAM_STR);
		$stmt -> bindParam(":created_at", $datos["created_at"], PDO::PARAM_STR);
		$stmt -> bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}


}