<?php

namespace App\Strategies;

use App\Models\User;
use Illuminate\Http\Request;

class BasicAuthStrategy implements AuthStrategy
{
    public function authenticate(Request $request): array
    {
        if (empty($_SERVER["HTTP_AUTHORIZATION"])) {
            return ['status' => 400, 'mensaje' => 'Petición Errónea, autorización básica requerida'];
        }

        $email = $_SERVER["PHP_AUTH_USER"] ?? '';
        $password = $_SERVER["PHP_AUTH_PW"] ?? '';

        if (empty($email) || empty($password)) {
            return ['status' => 400, 'mensaje' => 'Usuario o clave vacíos'];
        }

        $usuario = User::where('email', $email)->first();
        if (!$usuario || !password_verify($password, $usuario->password)) {
            return ['status' => 401, 'mensaje' => 'Credenciales incorrectas'];
        }

        return [
            'status' => 200,
            'mensaje' => 'Usuario autenticado',
            'token' => $usuario->remember_token,
        ];
    }
}
