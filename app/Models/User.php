<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'postcode',
        'state',
        'district',
        'school',
        'ic_number',
        'is_admin',
        'is_active',
        'is_student',
        'is_trainer',
        'is_approved',
        'is_ecerdb_personnel',
        'profile_picture',
        'first_time_login',
        'screenshots',
        'game_progress',
        'lesson_progress',
        'quiz_progress',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student(){
      return $this->hasOne('App\Models\Student');
    }

    public function messages(){
      return $this->hasMany('App\Models\Message');
    }

    public function feedback(){
      return $this->hasMany('App\Models\Feedback');
    }

    public function sendPasswordResetNotification($token)
    {
      $this->notify(new ResetPasswordNotification($token, $this->email));
    }
}
