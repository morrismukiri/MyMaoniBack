<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SurveyApiTest extends TestCase
{
    use MakeSurveyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSurvey()
    {
        $survey = $this->fakeSurveyData();
        $this->json('POST', '/api/v1/surveys', $survey);

        $this->assertApiResponse($survey);
    }

    /**
     * @test
     */
    public function testReadSurvey()
    {
        $survey = $this->makeSurvey();
        $this->json('GET', '/api/v1/surveys/'.$survey->id);

        $this->assertApiResponse($survey->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSurvey()
    {
        $survey = $this->makeSurvey();
        $editedSurvey = $this->fakeSurveyData();

        $this->json('PUT', '/api/v1/surveys/'.$survey->id, $editedSurvey);

        $this->assertApiResponse($editedSurvey);
    }

    /**
     * @test
     */
    public function testDeleteSurvey()
    {
        $survey = $this->makeSurvey();
        $this->json('DELETE', '/api/v1/surveys/'.$survey->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/surveys/'.$survey->id);

        $this->assertResponseStatus(404);
    }
}
