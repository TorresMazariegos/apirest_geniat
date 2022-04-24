<?php 

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=api_rest_geniat",
						"root",
						"");

		$link->exec("set names utf8");

		return $link;

	}

}