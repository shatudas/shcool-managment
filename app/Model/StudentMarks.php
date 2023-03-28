<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StudentMarks extends Model
{
 public function student(){
  return $this->belongsTo(User::class,'student_id','id');
 }
 public function student_class(){
  return $this->belongsTo(StduentClass::class,'class_id','id');
  }

  public function year(){
  return $this->belongsTo(Year::class,'year_id','id');
  }

  public function assing_subject(){
  return $this->belongsTo(AssingSubject::class,'assign_subject_id','id');
  }

   public function exam_type(){
  return $this->belongsTo(ExamType::class,'exam_type_id','id');
  }
  



}
