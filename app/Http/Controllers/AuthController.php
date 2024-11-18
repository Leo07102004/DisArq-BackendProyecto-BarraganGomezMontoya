<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function autenticar(Request $request)
    {
        /*$username = "malesita";
        $password = "malesitapro";
        if(empty($_SERVER["HTTP_AUTHORIZATION"])){
            return response()->json(['mensaje' => 'Petición Errónea se debe incluir una autorización básica con usuario y clave'], 400);
        }
        else if($_SERVER["PHP_AUTH_USER"]==="" || $_SERVER["PHP_AUTH_PW"]===""){
            return response()->json(['mensaje' => 'Petición Errónea por campos vacíos'], 400);
        }
        else if($_SERVER["PHP_AUTH_USER"]===$username && $_SERVER["PHP_AUTH_PW"]===$password){
            return response()->json(['mensaje' => 'Usuario Autorizado'], 200);
        }
        else{
            return response()->json(['mensaje' => 'Sin Autorización'], 401);
        }*/

        if(empty($_SERVER["HTTP_AUTHORIZATION"])){
            return response()->json(['mensaje' => 'Petición Errónea se debe incluir una autorización básica con usuario y clave'], 400);
        }
        else if($_SERVER["PHP_AUTH_USER"]==="" || $_SERVER["PHP_AUTH_PW"]===""){
            return response()->json(['mensaje' => 'Petición Errónea por campos vacíos'], 400);
        }else{
            $usuario = User::where('email', $_SERVER["PHP_AUTH_USER"])->first(); 
            if ($usuario === null) {
                return response()->json(['mensaje' => 'No existe ese usuario'], 404);
            } else {
                $password = $_SERVER["PHP_AUTH_PW"];
                $token = $usuario->remember_token;
                //SE DEBEN MODIFICAR LAS CLAVES EN LA BASE DE DATOS CON HASH Y SALT PARA QUE FUNCIONE
                /*$sal = password_hash(random_bytes(16), PASSWORD_DEFAULT);
                $contrasena_hash = password_hash($password . $sal, PASSWORD_DEFAULT);*/
                if (password_verify($password, $usuario->password)) {
                    return response()->json(['mensaje' => 'Usuario y clave correcta','token' => $token], 201);
                } else {
                    return response()->json(['mensaje' => 'Clave incorrecta'], 401);
                }
            }
        }
    }

    public function registrar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // Crear el nuevo usuario
            $usuario = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')), // Encriptar la contraseña
                'remember_token' => bin2hex(random_bytes(5)), // Generar un token único
            ]);

            // Devolver la respuesta con éxito
            return response()->json([
                'mensaje' => 'Usuario registrado con éxito',
                'token' => $usuario->remember_token,
            ], 201);

        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json([
                'mensaje' => 'Error al registrar el usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
