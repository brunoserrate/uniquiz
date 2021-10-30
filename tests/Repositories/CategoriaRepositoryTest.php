<?php namespace Tests\Repositories;

use App\Models\Categoria;
use App\Repositories\CategoriaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CategoriaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CategoriaRepository
     */
    protected $categoriaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoriaRepo = \App::make(CategoriaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_categoria()
    {
        $categoria = Categoria::factory()->make()->toArray();

        $createdCategoria = $this->categoriaRepo->create($categoria);

        $createdCategoria = $createdCategoria->toArray();
        $this->assertArrayHasKey('id', $createdCategoria);
        $this->assertNotNull($createdCategoria['id'], 'Created Categoria must have id specified');
        $this->assertNotNull(Categoria::find($createdCategoria['id']), 'Categoria with given id must be in DB');
        $this->assertModelData($categoria, $createdCategoria);
    }

    /**
     * @test read
     */
    public function test_read_categoria()
    {
        $categoria = Categoria::factory()->create();

        $dbCategoria = $this->categoriaRepo->find($categoria->id);

        $dbCategoria = $dbCategoria->toArray();
        $this->assertModelData($categoria->toArray(), $dbCategoria);
    }

    /**
     * @test update
     */
    public function test_update_categoria()
    {
        $categoria = Categoria::factory()->create();
        $fakeCategoria = Categoria::factory()->make()->toArray();

        $updatedCategoria = $this->categoriaRepo->update($fakeCategoria, $categoria->id);

        $this->assertModelData($fakeCategoria, $updatedCategoria->toArray());
        $dbCategoria = $this->categoriaRepo->find($categoria->id);
        $this->assertModelData($fakeCategoria, $dbCategoria->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_categoria()
    {
        $categoria = Categoria::factory()->create();

        $resp = $this->categoriaRepo->delete($categoria->id);

        $this->assertTrue($resp);
        $this->assertNull(Categoria::find($categoria->id), 'Categoria should not exist in DB');
    }
}
