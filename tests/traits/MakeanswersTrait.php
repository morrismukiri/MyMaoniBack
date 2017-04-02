<?php

use Faker\Factory as Faker;
use App\Models\answers;
use App\Repositories\answersRepository;

trait MakeanswersTrait
{
    /**
     * Create fake instance of answers and save it in database
     *
     * @param array $answersFields
     * @return answers
     */
    public function makeanswers($answersFields = [])
    {
        /** @var answersRepository $answersRepo */
        $answersRepo = App::make(answersRepository::class);
        $theme = $this->fakeanswersData($answersFields);
        return $answersRepo->create($theme);
    }

    /**
     * Get fake instance of answers
     *
     * @param array $answersFields
     * @return answers
     */
    public function fakeanswers($answersFields = [])
    {
        return new answers($this->fakeanswersData($answersFields));
    }

    /**
     * Get fake data of answers
     *
     * @param array $postFields
     * @return array
     */
    public function fakeanswersData($answersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pollId' => $fake->randomDigitNotNull,
            'text' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $answersFields);
    }
}
