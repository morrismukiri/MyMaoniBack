<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnswersApiTest extends TestCase
{
    use MakeAnswersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnswers()
    {
        $answers = $this->fakeAnswersData();
        $this->json('POST', '/api/v1/answers', $answers);

        $this->assertApiResponse($answers);
    }

    /**
     * @test
     */
    public function testReadAnswers()
    {
        $answers = $this->makeAnswers();
        $this->json('GET', '/api/v1/answers/'.$answers->id);

        $this->assertApiResponse($answers->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnswers()
    {
        $answers = $this->makeAnswers();
        $editedAnswers = $this->fakeAnswersData();

        $this->json('PUT', '/api/v1/answers/'.$answers->id, $editedAnswers);

        $this->assertApiResponse($editedAnswers);
    }

    /**
     * @test
     */
    public function testDeleteAnswers()
    {
        $answers = $this->makeAnswers();
        $this->json('DELETE', '/api/v1/answers/'.$answers->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/answers/'.$answers->id);

        $this->assertResponseStatus(404);
    }
}
