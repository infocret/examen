<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class mensajeApiTest extends TestCase
{
    use MakemensajeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatemensaje()
    {
        $mensaje = $this->fakemensajeData();
        $this->json('POST', '/api/v1/mensajes', $mensaje);

        $this->assertApiResponse($mensaje);
    }

    /**
     * @test
     */
    public function testReadmensaje()
    {
        $mensaje = $this->makemensaje();
        $this->json('GET', '/api/v1/mensajes/'.$mensaje->id);

        $this->assertApiResponse($mensaje->toArray());
    }

    /**
     * @test
     */
    public function testUpdatemensaje()
    {
        $mensaje = $this->makemensaje();
        $editedmensaje = $this->fakemensajeData();

        $this->json('PUT', '/api/v1/mensajes/'.$mensaje->id, $editedmensaje);

        $this->assertApiResponse($editedmensaje);
    }

    /**
     * @test
     */
    public function testDeletemensaje()
    {
        $mensaje = $this->makemensaje();
        $this->json('DELETE', '/api/v1/mensajes/'.$mensaje->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mensajes/'.$mensaje->id);

        $this->assertResponseStatus(404);
    }
}
