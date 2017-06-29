<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Comments",
 *      required={"userId", "surveyId", "comment"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="surveyId",
 *          description="surveyId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="comment",
 *          description="comment",
 *          type="string"
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
class Comments extends Model
{

    public $table = 'comments';
    


    public $fillable = [
        'userId',
        'surveyId',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'userId' => 'integer',
        'surveyId' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userId' => 'required',
        'surveyId' => 'required',
        'comment' => 'required'
    ];

    
}
