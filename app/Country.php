<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name','ar_name'];


    function cities() {
        return $this->hasMany(City::class);
    }

    function users() {
        return $this->hasMany(User::class);
    }
}
