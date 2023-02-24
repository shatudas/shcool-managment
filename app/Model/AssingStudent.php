<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AssingStudent extends Model
{
    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function student_class(){
     return $this->belongsTo(StduentClass::class,'class_id','id');
    }

    public function year(){
    	return $this->belongsTo(Year::class,'yesr_id','id');
    }

    public function discount(){
    	return $this->belongsTo(DiscountStudent::class,'id','assing_student_id');
    }


}
