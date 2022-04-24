<?php 

require_once "conexion.php";

class PostModel{

	/*=============================================
	Show post
	=============================================*/

	static public function index(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM post where status = 1");


		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);

	    $stmt -> close();

	    $stmt -= null;

	}

	/*=============================================
	Create Post
	=============================================*/

	static public function create($datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO post(title, description, status, user_created_id, created_at, updated_at) VALUES (:title, :description, :status, :user_created_id, :created_at, :updated_at)");

		$stmt -> bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
		$stmt -> bindParam(":user_created_id", $datos["user_created_id"], PDO::PARAM_STR);		
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

	
	/*=============================================
	Show one post
	=============================================*/

	static public function show($id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM post WHERE id=$id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);

	    $stmt -> close();

	    $stmt -= null;

	}
	
	/*=============================================
	Actualización de un curso
	=============================================*/

	static public function update($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE post SET title=:title, description=:description, status=:status, user_created_id=:user_created_id , updated_at=:updated_at WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
		$stmt -> bindParam(":user_created_id", $datos["user_created_id"], PDO::PARAM_STR);		
		$stmt -> bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Borrar curso
	=============================================*/

	static public function delete($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt-> close();

		$stmt = null;



	}

}