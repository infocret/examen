<?php

use App\Models\mensaje;
use App\Repositories\mensajeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class mensajeRepositoryTest extends TestCase
{
    use MakemensajeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var mensajeRepository
     */
    protected $mensajeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->mensajeRepo = App::make(mensajeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatemensaje()
    {
        $mensaje = $this->fakemensajeData();
        $createdmensaje = $this->mensajeRepo->create($mensaje);
        $createdmensaje = $createdmensaje->toArray();
        $this->assertArrayHasKey('id', $createdmensaje);
        $this->assertNotNull($createdmensaje['id'], 'Created mensaje must have id specified');
        $this->assertNotNull(mensaje::find($createdmensaje['id']), 'mensaje with given id must be in DB');
        $this->assertModelData($mensaje, $createdmensaje);
    }

    /**
     * @test read
     */
    public function testReadmensaje()
    {
        $mensaje = $this->makemensaje();
        $dbmensaje = $this->mensajeRepo->find($mensaje->id);
        $dbmensaje = $dbmensaje->toArray();
        $this->assertModelData($mensaje->toArray(), $dbmensaje);
    }

    /**
     * @test update
     */
    public function testUpdatemensaje()
    {
        $mensaje = $this->makemensaje();
        $fakemensaje = $this->fakemensajeData();
        $updatedmensaje = $this->mensajeRepo->update($fakemensaje, $mensaje->id);
        $this->assertModelData($fakemensaje, $updatedmensaje->toArray());
        $dbmensaje = $this->mensajeRepo->find($mensaje->id);
        $this->assertModelData($fakemensaje, $dbmensaje->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletemensaje()
    {
        $mensaje = $this->makemensaje();
        $resp = $this->mensajeRepo->delete($mensaje->id);
        $this->assertTrue($resp);
        $this->assertNull(mensaje::find($mensaje->id), 'mensaje should not exist in DB');
    }
}
