<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OpinionApiTest extends TestCase
{
    use MakeOpinionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOpinion()
    {
        $opinion = $this->fakeOpinionData();
        $this->json('POST', '/api/v1/opinions', $opinion);

        $this->assertApiResponse($opinion);
    }

    /**
     * @test
     */
    public function testReadOpinion()
    {
        $opinion = $this->makeOpinion();
        $this->json('GET', '/api/v1/opinions/'.$opinion->id);

        $this->assertApiResponse($opinion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOpinion()
    {
        $opinion = $this->makeOpinion();
        $editedOpinion = $this->fakeOpinionData();

        $this->json('PUT', '/api/v1/opinions/'.$opinion->id, $editedOpinion);

        $this->assertApiResponse($editedOpinion);
    }

    /**
     * @test
     */
    public function testDeleteOpinion()
    {
        $opinion = $this->makeOpinion();
        $this->json('DELETE', '/api/v1/opinions/'.$opinion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/opinions/'.$opinion->id);

        $this->assertResponseStatus(404);
    }
}
