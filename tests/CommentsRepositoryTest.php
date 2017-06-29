<?php

use App\Models\Comments;
use App\Repositories\CommentsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentsRepositoryTest extends TestCase
{
    use MakeCommentsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CommentsRepository
     */
    protected $commentsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->commentsRepo = App::make(CommentsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateComments()
    {
        $comments = $this->fakeCommentsData();
        $createdComments = $this->commentsRepo->create($comments);
        $createdComments = $createdComments->toArray();
        $this->assertArrayHasKey('id', $createdComments);
        $this->assertNotNull($createdComments['id'], 'Created Comments must have id specified');
        $this->assertNotNull(Comments::find($createdComments['id']), 'Comments with given id must be in DB');
        $this->assertModelData($comments, $createdComments);
    }

    /**
     * @test read
     */
    public function testReadComments()
    {
        $comments = $this->makeComments();
        $dbComments = $this->commentsRepo->find($comments->id);
        $dbComments = $dbComments->toArray();
        $this->assertModelData($comments->toArray(), $dbComments);
    }

    /**
     * @test update
     */
    public function testUpdateComments()
    {
        $comments = $this->makeComments();
        $fakeComments = $this->fakeCommentsData();
        $updatedComments = $this->commentsRepo->update($fakeComments, $comments->id);
        $this->assertModelData($fakeComments, $updatedComments->toArray());
        $dbComments = $this->commentsRepo->find($comments->id);
        $this->assertModelData($fakeComments, $dbComments->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteComments()
    {
        $comments = $this->makeComments();
        $resp = $this->commentsRepo->delete($comments->id);
        $this->assertTrue($resp);
        $this->assertNull(Comments::find($comments->id), 'Comments should not exist in DB');
    }
}
