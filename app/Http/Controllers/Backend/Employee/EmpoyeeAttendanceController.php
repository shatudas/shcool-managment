<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssingStudent;
use App\Model\DiscountStudent;
use App\User;
use App\Model\StduentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\Year;
use App\Model\EmployreeSalaryLog;
use App\Model\designation;
use App\Model\LeaveParpas;
use App\Model\EmployeeLeave;
use App\Model\EmployeeAttendance;
use DB;
use PDF;

class EmpoyeeAttendanceController extends Controller
{
  public function view()
	 {
		 $data['alldata'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
		 return view('backend.employee.employee_attendance.view-attendance',$data);
	 }


		public function add()
		{
			$data['employees'] = User::where('user_type','Employee')->get();
			return view('backend.employee.employee_attendance.add-attendance',$data);
		}


		public function store(Request $request)
		{
			EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
			$countemployee = count($request->employee_id);
			for($i=0; $i <$countemployee; $i++){
				$attend_status = 'attend_status'.$i;
				$attend = new EmployeeAttendance();
				$attend->date = date('Y-m-d',strtotime($request->date));
				$attend->employee_id = $request->employee_id[$i];
				$attend->attend_status = $request->$attend_status;
				$attend->save();
			}
		 return redirect()->route('employees.attendance.view')->with('success','Data Updated Successfully');
		}


		public function edit($date)
			{
				$data['editdata']= EmployeeAttendance::where('date',$date)->get();
				$data['employees'] = User::where('user_type','Employee')->get();
			 return view('backend.employee.employee_attendance.add-attendance',$data);
			}


	 public function detalis($date){
		 $data['detalis']= EmployeeAttendance::where('date',$date)->get();
			return view('backend.employee.employee_attendance.detalis-attendance',$data);
	 }

 }
