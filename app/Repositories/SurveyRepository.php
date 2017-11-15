<?php

namespace App\Repositories;

use App\Models\Survey;
use InfyOm\Generator\Common\BaseRepository;

class SurveyRepository extends BaseRepository
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
        'userId'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Survey::class;
    }
}
