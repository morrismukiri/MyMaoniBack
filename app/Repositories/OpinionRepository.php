<?php

namespace App\Repositories;

use App\Models\Opinion;
use InfyOm\Generator\Common\BaseRepository;

class OpinionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'userId',
        'pollId',
        'comment'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opinion::class;
    }
}
