<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentsApiTest extends TestCase
{
    use MakeCommentsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateComments()
    {
        $comments = $this->fakeCommentsData();
        $this->json('POST', '/api/v1/comments', $comments);

        $this->assertApiResponse($comments);
    }

    /**
     * @test
     */
    public function testReadComments()
    {
        $comments = $this->makeComments();
        $this->json('GET', '/api/v1/comments/'.$comments->id);

        $this->assertApiResponse($comments->toArray());
    }

    /**
     * @test
     */
    public function testUpdateComments()
    {
        $comments = $this->makeComments();
        $editedComments = $this->fakeCommentsData();

        $this->json('PUT', '/api/v1/comments/'.$comments->id, $editedComments);

        $this->assertApiResponse($editedComments);
    }

    /**
     * @test
     */
    public function testDeleteComments()
    {
        $comments = $this->makeComments();
        $this->json('DELETE', '/api/v1/comments/'.$comments->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comments/'.$comments->id);

        $this->assertResponseStatus(404);
    }
}
