<?php

namespace App;

use App\Models\Vote;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $username
 * @property string $phone
 * @property string $gender
 * @property string $address
 * @property date $dob
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public $table = 'users';


    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone', 'gender', 'address', 'county', 'constituency', 'ward', 'dob'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'username' => 'string',
        'phone' => 'string',
        'gender' => 'string',
        'address' => 'string',
        'county' => 'string',
        'constituency' => 'string',
        'ward' => 'string',
        'dob' => 'date',
        'email' => 'string',
        'password' => 'string'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'username' => 'alpha_dash|max:15|unique:users',
        'phone' => 'unique:users',
        'gender' => '',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {

        if ($password !== null) {
            if (is_null(request()->bcrypt)) {
                $this->attributes['password'] = bcrypt($password);
            } else {
                $this->attributes['password'] = $password;
            }
        }
    }

    public function polls()
    {
        return $this->hasMany(\App\Models\Poll::class, 'userId', 'id');
    }

    public function surveys()
    {
        return $this->hasMany(\App\Models\Survey::class, 'userId', 'id');
    }

    public function opinions()
    {
        return $this->hasMany(\App\Models\Opinion::class, 'userId', 'id');
    }

    public function votes()
    {
        return $this->hasMany(\App\Models\Vote::class, 'userId', 'id');
    }
}
