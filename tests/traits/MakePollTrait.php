<?php

use Faker\Factory as Faker;
use App\Models\Poll;
use App\Repositories\PollRepository;

trait MakePollTrait
{
    /**
     * Create fake instance of Poll and save it in database
     *
     * @param array $pollFields
     * @return Poll
     */
    public function makePoll($pollFields = [])
    {
        /** @var PollRepository $pollRepo */
        $pollRepo = App::make(PollRepository::class);
        $theme = $this->fakePollData($pollFields);
        return $pollRepo->create($theme);
    }

    /**
     * Get fake instance of Poll
     *
     * @param array $pollFields
     * @return Poll
     */
    public function fakePoll($pollFields = [])
    {
        return new Poll($this->fakePollData($pollFields));
    }

    /**
     * Get fake data of Poll
     *
     * @param array $postFields
     * @return array
     */
    public function fakePollData($pollFields = [])
    {
        return factory(App\Models\Poll::class)->make()['attributes'];

    }
}
