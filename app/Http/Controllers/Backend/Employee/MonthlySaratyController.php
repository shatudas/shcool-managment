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


class MonthlySaratyController extends Controller
{

  public function view()
	 {
	
		 $data['alldata'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
		 return view('backend.employee.monthly_salary.view-salary');
	 }

	 public function getsalary(Request $request){
   $date = date('Y-m', strtotime($request->date)); 
   if($date !=''){
   	$where[] = ['date','like',$date.'%'];
   }
   $data= EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

   $html['thsource']  = '<th>SL</th>';
   $html['thsource'] .= '<th>Employee Id</th>';
   $html['thsource'] .= '<th>Basic Salary</th>';
   $html['thsource'] .= '<th>Salary (this month)</th>';
   $html['thsource'] .= '<th>Action</th>';

   foreach ($data as $key => $attend) {
   	$tatalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
   	$adsentcount = count($tatalattend->where('attend_status','Absent'));
   	$color = 'success';

   	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
    $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';

    $salary = (float)$attend['user']['salary'];
    $salaryparday = (float)$salary/30;
    $totalsalaryminus =(float)$adsentcount*(float)$salaryparday;
    $totalsalary = (float)$salary-(float)$totalsalaryminus;
    $html[$key]['tdsource'] .= '<td>'.$totalsalary.'</td>';

    $html[$key]['tdsource'] .= '<td>';

    $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("employees.monthly.salary.payslip",$attend->employee_id).'">Pay Slip</a>';
    $html[$key]['tdsource'] .= '</td>';

   }
   return response()->json(@$html);
   } 


   public function payslip(Request $request, $employee_id){
   	$id = EmployeeAttendance::where('employee_id',$employee_id)->first();
   	$date  =date('Y-m', strtotime($id->date));
   	if($date !=''){
   	$where[] = ['date','like',$date.'%'];
   }

   $data['totalattendgroupbyid'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();

    $pdf = PDF::loadView('backend.employee.monthly_salary.monthlysalaryPDF',$data);
    $pdf->SetProtection(['copy','print'], '', 'pass');
    return $pdf->stream('document.pdf');
   }
	 

}
