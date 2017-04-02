<?php

namespace App\Repositories;

use App\Models\Answers;
use InfyOm\Generator\Common\BaseRepository;

class AnswersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pollId',
        'text'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Answers::class;
    }
}
