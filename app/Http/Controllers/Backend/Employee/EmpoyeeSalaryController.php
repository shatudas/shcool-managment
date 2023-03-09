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
use DB;
use PDF;

class EmpoyeeSalaryController extends Controller
{

   public function view()
	   {
	   $data['alldata'] = User::where('user_type','Employee')->get();
	    return view('backend.employee.employee_salary.view-employee-salary',$data);
	   }

		 public function increment($id)
		  {
		   $data['editData']=User::find($id);
		   return view('backend.employee.employee_salary.add-employee-salary',$data);
		  }


			 public function store (Request $request, $id){
			 	$user = User::find($id);
			 	$previous_salary = $user->salary;
			 	$present_salary = (float)$previous_salary+(float)$request->increment_salary;
			 	$user->salary = $present_salary;
			 	$user->save();

			 	$saratyData = new EmployreeSalaryLog();
			 	$saratyData->employeee_id = $id;
			 	$saratyData->previous_salary = $previous_salary;
			 	$saratyData->increment_salary = $request->increment_salary;
	   	$saratyData->present_salary = $present_salary;
	   	$saratyData->effected_date = date('Y-m-d',strtotime($request->effected_date));
	   	$saratyData->save();
	   	return redirect()->route('employees.salary.view')->with('success','Data Insert Successfully');

			 }


   public function detalis($id){
    $data['detalis'] = User::find($id);
    $data['salarylog'] = EmployreeSalaryLog::where('employeee_id', $data['detalis']->id)->get();
    return view('backend.employee.employee_salary.employee-salary-detalis',$data);
   }
}
