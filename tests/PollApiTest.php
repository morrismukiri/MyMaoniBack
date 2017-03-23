<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PollApiTest extends TestCase
{
    use MakePollTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePoll()
    {
        $poll = $this->fakePollData();
        $this->json('POST', '/api/v1/polls', $poll);

        $this->assertApiResponse($poll);
    }

    /**
     * @test
     */
    public function testReadPoll()
    {
        $poll = $this->makePoll();
        $this->json('GET', '/api/v1/polls/'.$poll->id);

        $this->assertApiResponse($poll->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePoll()
    {
        $poll = $this->makePoll();
        $editedPoll = $this->fakePollData();

        $this->json('PUT', '/api/v1/polls/'.$poll->id, $editedPoll);

        $this->assertApiResponse($editedPoll);
    }

    /**
     * @test
     */
    public function testDeletePoll()
    {
        $poll = $this->makePoll();
        $this->json('DELETE', '/api/v1/polls/'.$poll->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/polls/'.$poll->id);

        $this->assertResponseStatus(404);
    }
}
