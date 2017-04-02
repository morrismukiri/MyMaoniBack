<?php

use App\Models\Answers;
use App\Repositories\AnswersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnswersRepositoryTest extends TestCase
{
    use MakeAnswersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnswersRepository
     */
    protected $answersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->answersRepo = App::make(AnswersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnswers()
    {
        $answers = $this->fakeAnswersData();
        $createdAnswers = $this->answersRepo->create($answers);
        $createdAnswers = $createdAnswers->toArray();
        $this->assertArrayHasKey('id', $createdAnswers);
        $this->assertNotNull($createdAnswers['id'], 'Created Answers must have id specified');
        $this->assertNotNull(Answers::find($createdAnswers['id']), 'Answers with given id must be in DB');
        $this->assertModelData($answers, $createdAnswers);
    }

    /**
     * @test read
     */
    public function testReadAnswers()
    {
        $answers = $this->makeAnswers();
        $dbAnswers = $this->answersRepo->find($answers->id);
        $dbAnswers = $dbAnswers->toArray();
        $this->assertModelData($answers->toArray(), $dbAnswers);
    }

    /**
     * @test update
     */
    public function testUpdateAnswers()
    {
        $answers = $this->makeAnswers();
        $fakeAnswers = $this->fakeAnswersData();
        $updatedAnswers = $this->answersRepo->update($fakeAnswers, $answers->id);
        $this->assertModelData($fakeAnswers, $updatedAnswers->toArray());
        $dbAnswers = $this->answersRepo->find($answers->id);
        $this->assertModelData($fakeAnswers, $dbAnswers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnswers()
    {
        $answers = $this->makeAnswers();
        $resp = $this->answersRepo->delete($answers->id);
        $this->assertTrue($resp);
        $this->assertNull(Answers::find($answers->id), 'Answers should not exist in DB');
    }
}
