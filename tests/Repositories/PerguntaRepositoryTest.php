<?php namespace Tests\Repositories;

use App\Models\Pergunta;
use App\Repositories\PerguntaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PerguntaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PerguntaRepository
     */
    protected $perguntaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->perguntaRepo = \App::make(PerguntaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pergunta()
    {
        $pergunta = Pergunta::factory()->make()->toArray();

        $createdPergunta = $this->perguntaRepo->create($pergunta);

        $createdPergunta = $createdPergunta->toArray();
        $this->assertArrayHasKey('id', $createdPergunta);
        $this->assertNotNull($createdPergunta['id'], 'Created Pergunta must have id specified');
        $this->assertNotNull(Pergunta::find($createdPergunta['id']), 'Pergunta with given id must be in DB');
        $this->assertModelData($pergunta, $createdPergunta);
    }

    /**
     * @test read
     */
    public function test_read_pergunta()
    {
        $pergunta = Pergunta::factory()->create();

        $dbPergunta = $this->perguntaRepo->find($pergunta->id);

        $dbPergunta = $dbPergunta->toArray();
        $this->assertModelData($pergunta->toArray(), $dbPergunta);
    }

    /**
     * @test update
     */
    public function test_update_pergunta()
    {
        $pergunta = Pergunta::factory()->create();
        $fakePergunta = Pergunta::factory()->make()->toArray();

        $updatedPergunta = $this->perguntaRepo->update($fakePergunta, $pergunta->id);

        $this->assertModelData($fakePergunta, $updatedPergunta->toArray());
        $dbPergunta = $this->perguntaRepo->find($pergunta->id);
        $this->assertModelData($fakePergunta, $dbPergunta->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pergunta()
    {
        $pergunta = Pergunta::factory()->create();

        $resp = $this->perguntaRepo->delete($pergunta->id);

        $this->assertTrue($resp);
        $this->assertNull(Pergunta::find($pergunta->id), 'Pergunta should not exist in DB');
    }
}
