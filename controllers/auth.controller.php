<?php
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth
{
    private static $secret_key = 'Sdw1s9x8@';
    private static $encrypt = ['HS256'];
    private static $aud = null;

    public static function SignIn($data)
    {
        $time = time();

        $token = array(
            'exp' => $time + (60*60),
            'aud' => self::Aud(),
            'data' => $data
        );

        return JWT::encode($token, self::$secret_key, 'HS256');
    }

    public static function Check($token)
    {

        if(empty($token))
        {
            throw new Exception("Invalid token supplied.");
        }

        $decode = JWT::decode($token, new Key(self::$secret_key, 'HS256'));

        if($decode->aud !== self::Aud())
        {
            throw new Exception("Invalid user logged in.");
        }else{
            return True;
        }
        
    }

    public static function ValidateRol($token, $permiso)
    {
        //print_r($token);
        $data = JWT::decode($token, new Key(self::$secret_key, 'HS256'))->data;
       
        $data = $data->id ;
        $post = UsersModel::validatePermission($data, $permiso);
        //print_r($post);
        return $post;
        
        //return $post;
        // [id] => 9
        // [email] => correo1@gmail.com
        // [rol_id] => 1

    }

    private static function Aud()
    {
        $aud = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud);
    }
}