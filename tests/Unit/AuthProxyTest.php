<?php

namespace Tests\Unit;

use App\Services\AuthProxy;
use App\Strategies\BasicAuthStrategy;
use App\Strategies\TokenAuthStrategy;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Mockery;

class AuthProxyTest extends TestCase
{
    /** @test */
    public function it_calls_authenticate_on_basic_auth_strategy()
    {
        // Crear un mock de la estrategia
        $basicAuthMock = Mockery::mock(BasicAuthStrategy::class);
        $basicAuthMock->shouldReceive('authenticate')
                      ->once()
                      ->andReturn(['status' => 200, 'mensaje' => 'Usuario autenticado', 'token' => 'mock_token']);

        // Crear el proxy con la estrategia mockeada
        $proxy = new AuthProxy($basicAuthMock);
        
        // Crear una solicitud simulada
        $request = Request::create('/login', 'POST');

        // Llamar al método authenticate del proxy
        $response = $proxy->authenticate($request);

        // Asegurarse de que el proxy devolvió la respuesta correcta
        $this->assertEquals(200, $response['status']);
        $this->assertEquals('Usuario autenticado', $response['mensaje']);
        $this->assertEquals('mock_token', $response['token']);
    }

    /** @test */
    public function it_calls_authenticate_on_token_auth_strategy()
    {
        // Crear un mock de la estrategia
        $tokenAuthMock = Mockery::mock(TokenAuthStrategy::class);
        $tokenAuthMock->shouldReceive('authenticate')
                      ->once()
                      ->andReturn(['status' => 200, 'mensaje' => 'Usuario autenticado', 'token' => 'mock_token']);

        // Crear el proxy con la estrategia mockeada
        $proxy = new AuthProxy($tokenAuthMock);
        
        // Crear una solicitud simulada
        $request = Request::create('/login', 'POST');

        // Llamar al método authenticate del proxy
        $response = $proxy->authenticate($request);

        // Asegurarse de que el proxy devolvió la respuesta correcta
        $this->assertEquals(200, $response['status']);
        $this->assertEquals('Usuario autenticado', $response['mensaje']);
        $this->assertEquals('mock_token', $response['token']);
    }
}
