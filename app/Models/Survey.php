<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Survey",
 *      required={"title", "closeTime", "userId"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="targetGroup",
 *          description="targetGroup",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="userId",
 *          description="userId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Survey extends Model
{

    public $table = 'surveys';



    public $fillable = [
        'title',
        'description',
        'openTime',
        'closeTime',
        'targetGroup',
        'userId'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'openTime' => 'datetime',
        'closeTime' => 'datetime',
        'targetGroup' => 'integer',
        'userId' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'closeTime' => 'required'
    ];

//    protected $with = ['polls','polls.answers','user'];

    public function polls(){
        return $this->hasMany(Poll::class,'surveyId','id');
    }
    public function user(){
        return $this->belongsTo(\App\User::class, 'userId','id');
    }

    public function votes(){
        return $this->hasManyThrough(Vote::class,Poll::class,'surveyId','pollId','id');
    }
}
