<?php

namespace App\Services;

use App\Strategies\AuthStrategy;
use Illuminate\Http\Request;

class AuthProxy
{
    protected AuthStrategy $strategy;

    public function __construct(AuthStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function authenticate(Request $request): array
    {
        // Aquí se podrían agregar más validaciones (por ejemplo, registrar intentos de inicio de sesión)
        return $this->strategy->authenticate($request);
    }
}
