<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasTranslations;

    public $translatable = ['language' , 'language_level'];

    protected $fillable = ['user_id','language' , 'language_level'];


    public function user() {

        return $this->belongsTo(User::class);
    }
}
