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
use DB;
use PDF;


class EmpoyeeLeaveController extends Controller
{
 
 public function view()
	 {
		$data['alldata'] = EmployeeLeave::orderBy('id','desc')->get();
		return view('backend.employee.employee_leave.view-leave',$data);
	 }


		public function add()
		{
			$data['employees'] = User::where('user_type','Employee')->get();
		 $data['parpose'] = LeaveParpas::all();
			return view('backend.employee.employee_leave.add-leave',$data);
		}


		public function store(Request $request)
		{
			if($request->leave_parpose_id == '0'){
				$leavepurpose = new LeaveParpas();
				$leavepurpose->name = $request->name;
				$leavepurpose->save();
				$leave_parpose_id = $leavepurpose->id;
			}else{
				$leave_parpose_id = $request->leave_parpose_id;
			}
				$employee_leave = new EmployeeLeave();
				$employee_leave->employee_id =$request->employee_id;
				$employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
	   $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
	   $employee_leave->leave_parpose_id = $leave_parpose_id;
	   $employee_leave->save();
		  return redirect()->route('employees.leave.view')->with('success','Data Updated Successfully');
		}


		public function edit($id)
		 {
				$data['editdata']= EmployeeLeave::find($id);
				$data['employees'] = User::where('user_type','Employee')->get();
				$data['parpose'] = LeaveParpas::all();
				return view('backend.employee.employee_leave.add-leave',$data);
			}


	 public function update(Request $request,$id)
	 {	
			if($request->leave_parpose_id == '0'){
				$leavepurpose = new LeaveParpas();
				$leavepurpose->name = $request->name;
				$leavepurpose->save();
				$leave_parpose_id = $leavepurpose->id;
			}else{
				$leave_parpose_id = $request->leave_parpose_id;
			}
				$employee_leave = EmployeeLeave::find($id);
				$employee_leave->employee_id =$request->employee_id;
				$employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
	   $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
	   $employee_leave->leave_parpose_id = $leave_parpose_id;
	   $employee_leave->save();
				return redirect()->route('employees.leave.view')->with('success','Data Updated Successfully');
	 }


	 public function detalis($id){
		 $data['detalis'] = User::find($id);
		 $pdf = PDF::loadView('backend.employee.employee_reg.Employee-detalis-pdf', $data);
		 $pdf->SetProtection(['copy', 'print'], '', 'pass');
		 return $pdf->stream('document.pdf');
	 }

}
