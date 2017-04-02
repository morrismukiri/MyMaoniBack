<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class answersApiTest extends TestCase
{
    use MakeanswersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateanswers()
    {
        $answers = $this->fakeanswersData();
        $this->json('POST', '/api/v1/answers', $answers);

        $this->assertApiResponse($answers);
    }

    /**
     * @test
     */
    public function testReadanswers()
    {
        $answers = $this->makeanswers();
        $this->json('GET', '/api/v1/answers/'.$answers->id);

        $this->assertApiResponse($answers->toArray());
    }

    /**
     * @test
     */
    public function testUpdateanswers()
    {
        $answers = $this->makeanswers();
        $editedanswers = $this->fakeanswersData();

        $this->json('PUT', '/api/v1/answers/'.$answers->id, $editedanswers);

        $this->assertApiResponse($editedanswers);
    }

    /**
     * @test
     */
    public function testDeleteanswers()
    {
        $answers = $this->makeanswers();
        $this->json('DELETE', '/api/v1/answers/'.$answers->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/answers/'.$answers->id);

        $this->assertResponseStatus(404);
    }
}
