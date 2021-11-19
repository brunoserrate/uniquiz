<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pergunta;

class PerguntaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pergunta()
    {
        $pergunta = Pergunta::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/perguntas', $pergunta
        );

        $this->assertApiResponse($pergunta);
    }

    /**
     * @test
     */
    public function test_read_pergunta()
    {
        $pergunta = Pergunta::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/perguntas/'.$pergunta->id
        );

        $this->assertApiResponse($pergunta->toArray());
    }

    /**
     * @test
     */
    public function test_update_pergunta()
    {
        $pergunta = Pergunta::factory()->create();
        $editedPergunta = Pergunta::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/perguntas/'.$pergunta->id,
            $editedPergunta
        );

        $this->assertApiResponse($editedPergunta);
    }

    /**
     * @test
     */
    public function test_delete_pergunta()
    {
        $pergunta = Pergunta::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/perguntas/'.$pergunta->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/perguntas/'.$pergunta->id
        );

        $this->response->assertStatus(404);
    }
}
