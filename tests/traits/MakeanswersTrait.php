<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\Answers;
use App\Repositories\AnswersRepository;

trait MakeAnswersTrait
{
    /**
     * Create fake instance of Answers and save it in database
     *
     * @param array $answersFields
     * @return Answers
     */
    public function makeAnswers($answersFields = [])
    {
        /** @var AnswersRepository $answersRepo */
        $answersRepo = App::make(AnswersRepository::class);
        $theme = $this->fakeAnswersData($answersFields);
        return $answersRepo->create($theme);
    }

    /**
     * Get fake instance of Answers
     *
     * @param array $answersFields
     * @return Answers
     */
    public function fakeAnswers($answersFields = [])
    {
        return new Answers($this->fakeAnswersData($answersFields));
    }

    /**
     * Get fake data of Answers
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnswersData($answersFields = [])
    {
        return factory(App\Models\Answers::class)->make()['attributes'];
    }
}
