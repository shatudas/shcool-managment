<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
      public function fee_category(){
      	return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
      }


      public function student_class(){
      	return $this->belongsTo(StduentClass::class,'class','id');
      }
}
