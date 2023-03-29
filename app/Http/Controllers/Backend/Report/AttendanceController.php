<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeAttendance;
use App\user;
use PDF;


class AttendanceController extends Controller
{
  public function view(){
   $data['employee'] = User::where('user_type','Employee')->get();
   return view('backend.report.attendance-view',$data);
  }


  public function get(Request $request){

  	 $employee_id = $request->employee_id;
    if($employee_id !=''){
    	$where[] = ['employee_id','like',$employee_id.'%'];
    }

  	 $date = date('Y-m',strtotime($request->date));
    if($date !=''){
    	$where[]=['date','like',$date.'%'];
    }


    $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->first();


    if($singleAttendance ==true){
     $data['allddata'] = EmployeeAttendance::with(['user'])->where($where)->get();
     $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
     $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leaves')->get()->count();
     $data['mouth'] = date('M Y',strtotime($request->data));
     $pdf = PDF::loadView('backend.report.attendnce-pdf', $data);
					$pdf->SetProtection(['copy', 'print'], '', 'pass');
					return $pdf->stream('document.pdf');

    }else{
    	return redirect()->back()->with('error','Sorry ! These Criteres dose nit match');
    }
   
  }




}
