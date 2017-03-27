<?php

use App\Models\Opinion;
use App\Repositories\OpinionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OpinionRepositoryTest extends TestCase
{
    use MakeOpinionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OpinionRepository
     */
    protected $opinionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->opinionRepo = App::make(OpinionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOpinion()
    {
        $opinion = $this->fakeOpinionData();
        $createdOpinion = $this->opinionRepo->create($opinion);
        $createdOpinion = $createdOpinion->toArray();
        $this->assertArrayHasKey('id', $createdOpinion);
        $this->assertNotNull($createdOpinion['id'], 'Created Opinion must have id specified');
        $this->assertNotNull(Opinion::find($createdOpinion['id']), 'Opinion with given id must be in DB');
        $this->assertModelData($opinion, $createdOpinion);
    }

    /**
     * @test read
     */
    public function testReadOpinion()
    {
        $opinion = $this->makeOpinion();
        $dbOpinion = $this->opinionRepo->find($opinion->id);
        $dbOpinion = $dbOpinion->toArray();
        $this->assertModelData($opinion->toArray(), $dbOpinion);
    }

    /**
     * @test update
     */
    public function testUpdateOpinion()
    {
        $opinion = $this->makeOpinion();
        $fakeOpinion = $this->fakeOpinionData();
        $updatedOpinion = $this->opinionRepo->update($fakeOpinion, $opinion->id);
        $this->assertModelData($fakeOpinion, $updatedOpinion->toArray());
        $dbOpinion = $this->opinionRepo->find($opinion->id);
        $this->assertModelData($fakeOpinion, $dbOpinion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOpinion()
    {
        $opinion = $this->makeOpinion();
        $resp = $this->opinionRepo->delete($opinion->id);
        $this->assertTrue($resp);
        $this->assertNull(Opinion::find($opinion->id), 'Opinion should not exist in DB');
    }
}
