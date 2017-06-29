<?php

use Faker\Factory as Faker;
use App\Models\Comments;
use App\Repositories\CommentsRepository;

trait MakeCommentsTrait
{
    /**
     * Create fake instance of Comments and save it in database
     *
     * @param array $commentsFields
     * @return Comments
     */
    public function makeComments($commentsFields = [])
    {
        /** @var CommentsRepository $commentsRepo */
        $commentsRepo = App::make(CommentsRepository::class);
        $theme = $this->fakeCommentsData($commentsFields);
        return $commentsRepo->create($theme);
    }

    /**
     * Get fake instance of Comments
     *
     * @param array $commentsFields
     * @return Comments
     */
    public function fakeComments($commentsFields = [])
    {
        return new Comments($this->fakeCommentsData($commentsFields));
    }

    /**
     * Get fake data of Comments
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCommentsData($commentsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'userId' => $fake->randomDigitNotNull,
            'surveyId' => $fake->randomDigitNotNull,
            'comment' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $commentsFields);
    }
}
