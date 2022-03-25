<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roleApiTest extends TestCase
{
    use MakeroleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreaterole()
    {
        $role = $this->fakeroleData();
        $this->json('POST', '/api/v1/roles', $role);

        $this->assertApiResponse($role);
    }

    /**
     * @test
     */
    public function testReadrole()
    {
        $role = $this->makerole();
        $this->json('GET', '/api/v1/roles/'.$role->id);

        $this->assertApiResponse($role->toArray());
    }

    /**
     * @test
     */
    public function testUpdaterole()
    {
        $role = $this->makerole();
        $editedrole = $this->fakeroleData();

        $this->json('PUT', '/api/v1/roles/'.$role->id, $editedrole);

        $this->assertApiResponse($editedrole);
    }

    /**
     * @test
     */
    public function testDeleterole()
    {
        $role = $this->makerole();
        $this->json('DELETE', '/api/v1/roles/'.$role->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roles/'.$role->id);

        $this->assertResponseStatus(404);
    }
}
