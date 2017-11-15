<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\Survey;
use App\Repositories\SurveyRepository;

trait MakeSurveyTrait
{
    /**
     * Create fake instance of Survey and save it in database
     *
     * @param array $surveyFields
     * @return Survey
     */
    public function makeSurvey($surveyFields = [])
    {
        /** @var SurveyRepository $surveyRepo */
        $surveyRepo = App::make(SurveyRepository::class);
        $theme = $this->fakeSurveyData($surveyFields);
        return $surveyRepo->create($theme);
    }

    /**
     * Get fake instance of Survey
     *
     * @param array $surveyFields
     * @return Survey
     */
    public function fakeSurvey($surveyFields = [])
    {
        return new Survey($this->fakeSurveyData($surveyFields));
    }

    /**
     * Get fake data of Survey
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSurveyData($surveyFields = [])
    {

        return factory(App\Models\Survey::class)->make()['attributes'];

    }
}
