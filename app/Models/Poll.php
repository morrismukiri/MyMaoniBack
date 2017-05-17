<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Poll",
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
 *          property="surveyId",
 *          description="Survey Id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="categoryId",
 *          description="category Id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="targetGroup",
 *          description="targetGroup",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
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
class Poll extends Model
{

    public $table = 'polls';
    


    public $fillable = [
        'title',
        'description',
        'surveyId',
        'categoryId',
        'openTime',
        'closeTime',
        'targetGroup',
        'type',
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
        'surveyId'=>'integer',
        'categoryId'=>'integer',
        'openTime' => 'datetime',
        'closeTime' => 'datetime',
        'targetGroup' => 'integer',
        'type' => 'string',
        'userId' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    public function survey(){
        return $this->belongsTo(Survey::class,'surveyId','id');
    }
    public function user(){
        return $this->belongsTo(\App\User::class, 'userId','id');
    }
    public function opinions(){
        return $this->hasMany(\App\Models\Opinion::class, 'pollId','id');
    }
    public function category(){
        return $this->belongsTo(\App\Models\Category::class,'categoryId','id');
    }
    public function answers(){
        return $this->hasMany(Answers::class,'pollId','id');
    }
    public function votes(){
        return $this->hasMany(Vote::class,'pollId','id');
    }

}
