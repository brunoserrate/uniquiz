<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ranking;

class RankingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ranking()
    {
        $ranking = Ranking::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/rankings', $ranking
        );

        $this->assertApiResponse($ranking);
    }

    /**
     * @test
     */
    public function test_read_ranking()
    {
        $ranking = Ranking::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/rankings/'.$ranking->id
        );

        $this->assertApiResponse($ranking->toArray());
    }

    /**
     * @test
     */
    public function test_update_ranking()
    {
        $ranking = Ranking::factory()->create();
        $editedRanking = Ranking::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/rankings/'.$ranking->id,
            $editedRanking
        );

        $this->assertApiResponse($editedRanking);
    }

    /**
     * @test
     */
    public function test_delete_ranking()
    {
        $ranking = Ranking::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/rankings/'.$ranking->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/rankings/'.$ranking->id
        );

        $this->response->assertStatus(404);
    }
}
