<?php 

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=api_rest_geniat",
						"root",
						"");
		// Producción
		//$link = new PDO("mysql:host=localhost;dbname=prueba44_api_rest_geniat",
		//				"	prueba44_geniat","geniat2022");
						
		$link->exec("set names utf8");

		return $link;

	}

}