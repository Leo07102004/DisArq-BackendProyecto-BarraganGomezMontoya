<?php

namespace App\Strategies;

use Illuminate\Http\Request;

interface AuthStrategy
{
    public function authenticate(Request $request): array;
}
