<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Education extends Model
{
    use HasTranslations;

   public $translatable = ['qualification' , 'university'];

   protected $fillable =['user_id' , 'qualification', 'ar_qualification' , 'grade_date' , 'grade' , 'ar_university' , 'university' , 'sub_special_id','special_id'];

   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function sub_special()
   {
       return $this->belongsTo(SubSpecial::class);
   }

   public function special()
   {
       return $this->belongsTo(Special::class);
   }
}
