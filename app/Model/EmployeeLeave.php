<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class EmployeeLeave extends Model
{
   public function user(){
   	return $this->belongsTo(User::class,'employee_id','id');
   }

   public function purpose(){
   	return $this->belongsTo(LeaveParpas::class,'leave_parpose_id','id');
   }
}
