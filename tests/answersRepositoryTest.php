<?php

use App\Models\answers;
use App\Repositories\answersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class answersRepositoryTest extends TestCase
{
    use MakeanswersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var answersRepository
     */
    protected $answersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->answersRepo = App::make(answersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateanswers()
    {
        $answers = $this->fakeanswersData();
        $createdanswers = $this->answersRepo->create($answers);
        $createdanswers = $createdanswers->toArray();
        $this->assertArrayHasKey('id', $createdanswers);
        $this->assertNotNull($createdanswers['id'], 'Created answers must have id specified');
        $this->assertNotNull(answers::find($createdanswers['id']), 'answers with given id must be in DB');
        $this->assertModelData($answers, $createdanswers);
    }

    /**
     * @test read
     */
    public function testReadanswers()
    {
        $answers = $this->makeanswers();
        $dbanswers = $this->answersRepo->find($answers->id);
        $dbanswers = $dbanswers->toArray();
        $this->assertModelData($answers->toArray(), $dbanswers);
    }

    /**
     * @test update
     */
    public function testUpdateanswers()
    {
        $answers = $this->makeanswers();
        $fakeanswers = $this->fakeanswersData();
        $updatedanswers = $this->answersRepo->update($fakeanswers, $answers->id);
        $this->assertModelData($fakeanswers, $updatedanswers->toArray());
        $dbanswers = $this->answersRepo->find($answers->id);
        $this->assertModelData($fakeanswers, $dbanswers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteanswers()
    {
        $answers = $this->makeanswers();
        $resp = $this->answersRepo->delete($answers->id);
        $this->assertTrue($resp);
        $this->assertNull(answers::find($answers->id), 'answers should not exist in DB');
    }
}
