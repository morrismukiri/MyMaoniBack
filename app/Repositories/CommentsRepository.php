<?php

namespace App\Repositories;

use App\Models\Comments;
use InfyOm\Generator\Common\BaseRepository;

class CommentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'userId',
        'surveyId',
        'comment'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comments::class;
    }
}
