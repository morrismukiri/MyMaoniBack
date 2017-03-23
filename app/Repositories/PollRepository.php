<?php

namespace App\Repositories;

use App\Models\Poll;
use InfyOm\Generator\Common\BaseRepository;

class PollRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'openTime',
        'closeTime',
        'targetGroup',
        'type',
        'userId'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Poll::class;
    }
}
