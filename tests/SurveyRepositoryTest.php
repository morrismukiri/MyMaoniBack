<?php

use App\Models\Survey;
use App\Repositories\SurveyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SurveyRepositoryTest extends TestCase
{
    use MakeSurveyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SurveyRepository
     */
    protected $surveyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->surveyRepo = App::make(SurveyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSurvey()
    {
        $survey = $this->fakeSurveyData();
        $createdSurvey = $this->surveyRepo->create($survey);
        $createdSurvey = $createdSurvey->toArray();
        $this->assertArrayHasKey('id', $createdSurvey);
        $this->assertNotNull($createdSurvey['id'], 'Created Survey must have id specified');
        $this->assertNotNull(Survey::find($createdSurvey['id']), 'Survey with given id must be in DB');
        $this->assertModelData($survey, $createdSurvey);
    }

    /**
     * @test read
     */
    public function testReadSurvey()
    {
        $survey = $this->makeSurvey();
        $dbSurvey = $this->surveyRepo->find($survey->id);
        $dbSurvey = $dbSurvey->toArray();
        $this->assertModelData($survey->toArray(), $dbSurvey);
    }

    /**
     * @test update
     */
    public function testUpdateSurvey()
    {
        $survey = $this->makeSurvey();
        $fakeSurvey = $this->fakeSurveyData();
        $updatedSurvey = $this->surveyRepo->update($fakeSurvey, $survey->id);
        $this->assertModelData($fakeSurvey, $updatedSurvey->toArray());
        $dbSurvey = $this->surveyRepo->find($survey->id);
        $this->assertModelData($fakeSurvey, $dbSurvey->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSurvey()
    {
        $survey = $this->makeSurvey();
        $resp = $this->surveyRepo->delete($survey->id);
        $this->assertTrue($resp);
        $this->assertNull(Survey::find($survey->id), 'Survey should not exist in DB');
    }
}
