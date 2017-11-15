<?php

use Carbon\Carbon;
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
        return factory(App\Models\Comments::class)->make()['attributes'];

    }
}
