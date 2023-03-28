<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeAttendance;
use App\user;


class AttendanceController extends Controller
{
  public function view(){
   $data['employee'] = User::where('uuser_type','Employee')->get();
   return view('backend.report.attendance-view',$data);
  }


  public function get(){

  }




}
