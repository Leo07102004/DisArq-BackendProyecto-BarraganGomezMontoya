<?php

namespace App\Strategies;

use App\Models\User;
use Illuminate\Http\Request;

class TokenAuthStrategy implements AuthStrategy
{
    public function authenticate(Request $request): array
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return ['status' => 400, 'mensaje' => 'Token no proporcionado'];
        }

        $usuario = User::where('remember_token', $token)->first();
        if (!$usuario) {
            return ['status' => 401, 'mensaje' => 'Token inválido'];
        }

        return [
            'status' => 200,
            'mensaje' => 'Usuario autenticado',
            'usuario' => $usuario->toArray(),
        ];
    }
}
