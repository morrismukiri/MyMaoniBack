<?php

use App\Models\Poll;
use App\Repositories\PollRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PollRepositoryTest extends TestCase
{
    use MakePollTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PollRepository
     */
    protected $pollRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pollRepo = App::make(PollRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePoll()
    {
        $poll = $this->fakePollData();
        $createdPoll = $this->pollRepo->create($poll);
        $createdPoll = $createdPoll->toArray();
        $this->assertArrayHasKey('id', $createdPoll);
        $this->assertNotNull($createdPoll['id'], 'Created Poll must have id specified');
        $this->assertNotNull(Poll::find($createdPoll['id']), 'Poll with given id must be in DB');
        $this->assertModelData($poll, $createdPoll);
    }

    /**
     * @test read
     */
    public function testReadPoll()
    {
        $poll = $this->makePoll();
        $dbPoll = $this->pollRepo->find($poll->id);
        $dbPoll = $dbPoll->toArray();
        $this->assertModelData($poll->toArray(), $dbPoll);
    }

    /**
     * @test update
     */
    public function testUpdatePoll()
    {
        $poll = $this->makePoll();
        $fakePoll = $this->fakePollData();
        $updatedPoll = $this->pollRepo->update($fakePoll, $poll->id);
        $this->assertModelData($fakePoll, $updatedPoll->toArray());
        $dbPoll = $this->pollRepo->find($poll->id);
        $this->assertModelData($fakePoll, $dbPoll->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePoll()
    {
        $poll = $this->makePoll();
        $resp = $this->pollRepo->delete($poll->id);
        $this->assertTrue($resp);
        $this->assertNull(Poll::find($poll->id), 'Poll should not exist in DB');
    }
}
