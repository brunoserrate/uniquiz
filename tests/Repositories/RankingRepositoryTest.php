<?php namespace Tests\Repositories;

use App\Models\Ranking;
use App\Repositories\RankingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RankingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RankingRepository
     */
    protected $rankingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->rankingRepo = \App::make(RankingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ranking()
    {
        $ranking = Ranking::factory()->make()->toArray();

        $createdRanking = $this->rankingRepo->create($ranking);

        $createdRanking = $createdRanking->toArray();
        $this->assertArrayHasKey('id', $createdRanking);
        $this->assertNotNull($createdRanking['id'], 'Created Ranking must have id specified');
        $this->assertNotNull(Ranking::find($createdRanking['id']), 'Ranking with given id must be in DB');
        $this->assertModelData($ranking, $createdRanking);
    }

    /**
     * @test read
     */
    public function test_read_ranking()
    {
        $ranking = Ranking::factory()->create();

        $dbRanking = $this->rankingRepo->find($ranking->id);

        $dbRanking = $dbRanking->toArray();
        $this->assertModelData($ranking->toArray(), $dbRanking);
    }

    /**
     * @test update
     */
    public function test_update_ranking()
    {
        $ranking = Ranking::factory()->create();
        $fakeRanking = Ranking::factory()->make()->toArray();

        $updatedRanking = $this->rankingRepo->update($fakeRanking, $ranking->id);

        $this->assertModelData($fakeRanking, $updatedRanking->toArray());
        $dbRanking = $this->rankingRepo->find($ranking->id);
        $this->assertModelData($fakeRanking, $dbRanking->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ranking()
    {
        $ranking = Ranking::factory()->create();

        $resp = $this->rankingRepo->delete($ranking->id);

        $this->assertTrue($resp);
        $this->assertNull(Ranking::find($ranking->id), 'Ranking should not exist in DB');
    }
}
