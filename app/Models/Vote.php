<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Vote",
 *      required={"pollId", "userId", "answerId"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pollId",
 *          description="pollId",
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
 *          property="answerId",
 *          description="answerId",
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
class Vote extends Model
{

    public $table = 'votes';


    public $fillable = [
        'pollId',
        'userId',
        'answerId',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pollId' => 'integer',
        'userId' => 'integer',
        'answerId' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pollId' => 'required',
        'userId' => 'required',
        'answerId' => 'required'
    ];

    public function poll()
    {
        return $this->belongsTo(\App\Models\Poll::class, 'pollId', 'id');
    }

    public function voter()
    {
        return $this->belongsTo(\App\User::class, 'userId','id');
    }

    public function answer()
    {
        return $this->hasOne(\App\Models\Answers::class, 'id','answerId');
    }

}
