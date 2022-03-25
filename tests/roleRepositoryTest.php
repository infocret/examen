<?php

use App\Models\role;
use App\Repositories\roleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roleRepositoryTest extends TestCase
{
    use MakeroleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var roleRepository
     */
    protected $roleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roleRepo = App::make(roleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreaterole()
    {
        $role = $this->fakeroleData();
        $createdrole = $this->roleRepo->create($role);
        $createdrole = $createdrole->toArray();
        $this->assertArrayHasKey('id', $createdrole);
        $this->assertNotNull($createdrole['id'], 'Created role must have id specified');
        $this->assertNotNull(role::find($createdrole['id']), 'role with given id must be in DB');
        $this->assertModelData($role, $createdrole);
    }

    /**
     * @test read
     */
    public function testReadrole()
    {
        $role = $this->makerole();
        $dbrole = $this->roleRepo->find($role->id);
        $dbrole = $dbrole->toArray();
        $this->assertModelData($role->toArray(), $dbrole);
    }

    /**
     * @test update
     */
    public function testUpdaterole()
    {
        $role = $this->makerole();
        $fakerole = $this->fakeroleData();
        $updatedrole = $this->roleRepo->update($fakerole, $role->id);
        $this->assertModelData($fakerole, $updatedrole->toArray());
        $dbrole = $this->roleRepo->find($role->id);
        $this->assertModelData($fakerole, $dbrole->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleterole()
    {
        $role = $this->makerole();
        $resp = $this->roleRepo->delete($role->id);
        $this->assertTrue($resp);
        $this->assertNull(role::find($role->id), 'role should not exist in DB');
    }
}
