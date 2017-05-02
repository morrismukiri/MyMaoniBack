<?php

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
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'description' => $fake->text,
            'openTime' => $fake->word,
            'closeTime' => $fake->word,
            'targetGroup' => $fake->randomDigitNotNull,
            'type' => $fake->word,
            'userId' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $surveyFields);
    }
}
