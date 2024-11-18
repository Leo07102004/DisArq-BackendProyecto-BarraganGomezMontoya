<?php

namespace App\Http\Controllers;

use App\Services\AuthProxy;
use App\Strategies\BasicAuthStrategy;
use App\Strategies\TokenAuthStrategy;
use Illuminate\Http\Request;
use App\Models\User;

class AuthCompleteController extends Controller
{
    public function login(Request $request)
    {
        // Seleccionar la estrategia según el tipo de autenticación
        $authType = $request->header('Auth-Type', 'basic'); // Por defecto, usar BasicAuth
        $strategy = match ($authType) {
            'basic' => new BasicAuthStrategy(),
            'token' => new TokenAuthStrategy(),
            default => throw new \Exception('Tipo de autenticación no soportado'),
        };

        $proxy = new AuthProxy($strategy);

        $response = $proxy->authenticate($request);
        return response()->json(['mensaje' => $response['mensaje']], $response['status']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            $usuario = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'remember_token' => bin2hex(random_bytes(5)),
            ]);

            return response()->json([
                'mensaje' => 'Usuario registrado con éxito',
                'token' => $usuario->remember_token,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al registrar el usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
