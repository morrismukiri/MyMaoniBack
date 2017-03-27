<?php

use Faker\Factory as Faker;
use App\Models\Opinion;
use App\Repositories\OpinionRepository;

trait MakeOpinionTrait
{
    /**
     * Create fake instance of Opinion and save it in database
     *
     * @param array $opinionFields
     * @return Opinion
     */
    public function makeOpinion($opinionFields = [])
    {
        /** @var OpinionRepository $opinionRepo */
        $opinionRepo = App::make(OpinionRepository::class);
        $theme = $this->fakeOpinionData($opinionFields);
        return $opinionRepo->create($theme);
    }

    /**
     * Get fake instance of Opinion
     *
     * @param array $opinionFields
     * @return Opinion
     */
    public function fakeOpinion($opinionFields = [])
    {
        return new Opinion($this->fakeOpinionData($opinionFields));
    }

    /**
     * Get fake data of Opinion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOpinionData($opinionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'userId' => $fake->randomDigitNotNull,
            'pollId' => $fake->randomDigitNotNull,
            'comment' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $opinionFields);
    }
}
