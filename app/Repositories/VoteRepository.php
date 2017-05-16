<?php

namespace App\Repositories;

use App\Models\Vote;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VoteRepository
 * @package namespace App\Repositories;
 */
class VoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pollId',
        'userId',
        'answerId',
        'comment'
    ];

    public function model()
    {
        return Vote::class;
    }
}
