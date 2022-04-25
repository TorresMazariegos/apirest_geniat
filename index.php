<?php 
require_once 'vendor/autoload.php';
require_once "controllers/auth.controller.php";
require_once "controllers/rutas.controlador.php";
require_once "controllers/users.controlador.php";
require_once "controllers/login.controller.php";
require_once "controllers/post.controller.php";

require_once "models/login.model.php";
require_once "models/users.model.php";
require_once "models/post.model.php";



$rutas = new ControladorRutas();
$rutas -> index();

