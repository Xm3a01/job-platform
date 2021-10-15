<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasTranslations;

    public $translatable = ['name' , 'last_name','brith' , 'gender','level_of_work' , 'religion'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ar_name',
        'last_name',
        'ar_last_name',
        'sub_special_id',
        'email',
        'password',
        'role_id',
        'country_id',
        'sub_special_id',
        'salary',
        'ar_brith',
        'brith',
        'salary_type',
        'city_id',
        'phone',
        'level_of_work',
        'ar_level_of_work',
        'visit_count',
        'available',
        'avatar',
        'ar_gender',
        'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function exps()
    {
        return $this->hasMany(Exp::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function special()
    {
        return $this->belongsTo(Special::class);
    }

    public function sub_special()
    {
        return $this->belongsTo(SubSpecial::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }
}
