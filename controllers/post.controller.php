<?php 
require_once 'vendor/autoload.php';
class PostController{

	/*=============================================
	Mostrar todos los registros
	=============================================*/

	public function index($datos){

		// Validate permissions		
        $token = Auth::Check($datos['token']);
        $permission = Auth::ValidateRol($datos['token'], 'consulta');
        //print_r($token); 

        if($token){

            if($permission){
				
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
                        "detalles"=>"No hay ningún post registrado"
                        
                    );

                    echo json_encode($json, true);	

                    return;

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

	/*=============================================
	Crear un post
	=============================================*/

	public function create($datos){

        
		// Validate permissions		
        $token = Auth::Check($datos['token']);
        $permission = Auth::ValidateRol($datos['token'], 'agregar');
        //print_r($token); 

        if($token){

            if($permission){

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
                        "detalle"=>"Registro exitoso, su post ha sido guardado"

                    ); 
                    
                    echo json_encode($json, true); 

                    return;    	

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

    /*=============================================
	Show one post
	=============================================*/

	public function show($id){

		
		

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
                "detalles"=>"No hay ningún post registrado"
                
            );

            echo json_encode($json, true);	

            return;

        }

		echo json_encode($json, true);	

		return;  	

	}

	/*=============================================
	Update post
	=============================================*/

	public function update($id, $datos){

        
		// Validate permissions		
        $token = Auth::Check($datos['token']);
        $permission = Auth::ValidateRol($datos['token'], 'eliminar');
        //print_r($permission); 

        if($token){

            if($permission){

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

                $post = PostModel::show($id);
                //print_r($post); return;
                foreach ($post as $key => $value) {

                        /*=============================================
                        Llevar datos al modelo
                        =============================================*/
        
                        $datos = array( "id"=>$id,
                                        "title"=>$datos["title"],
                                        "description"=>$datos["description"],
                                        "status"=>$datos["status"],
                                        "user_created_id"=>$datos["user_created_id"],
                                        "updated_at"=>date('Y-m-d h:i:s'));

                        $update = PostModel::update($datos);

                        /*=============================================
                        Respuesta del modelo
                        =============================================*/

                        if($update == "ok"){

                            $json = array(
                                "status"=>200,
                                "detalle"=>"Registro exitoso, su post ha sido actualizado"

                            ); 
                            
                            echo json_encode($json, true); 

                            return;    	

                        }

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

	/*=============================================
	Borrar post
	=============================================*/

	public function delete($id, $datos){

		// Validate permissions		
        $token = Auth::Check($datos['token']);
        $permission = Auth::ValidateRol($datos['token'], 'actualizar');
        //print_r($permission); 

        if($token){

            if($permission){

                $post = PostModel::show($id);

                foreach ($post as $key => $valuepost) {                   
                        
                        $delete = PostModel::delete( $id);

                        /*=============================================
                        Respuesta del modelo
                        =============================================*/

                        if($delete == "ok"){

                            $json = array(
                                "status"=>200,
                                "detalle"=>"Se ha borrado su post con éxito"

                            ); 
                            
                            echo json_encode($json, true); 

                            return;    	

                        }                    

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