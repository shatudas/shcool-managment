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


class EmpoyeeRegController extends Controller
{
    public function view()
   {
    $data['alldata'] = User::where('user_type','Employee')->get();
    return view('backend.employee.employee_reg.view-employee',$data);
   }

    public function add()
    {
     $data['designation'] = designation::all();
    	return view('backend.employee.employee_reg.add-employee',$data);
    }


    public function store(Request $request)
    {
    	DB::transaction(function() use($request){

    		$checkYear = date('Ym', strtotime($request->join_date));
    		$employee =User::where('user_type','Employee')->orderBy('id','DESC')->first();
    		if($employee == null){
    			$firstReg = 0;
    			$employeeId = $firstReg+1;

    			if($employeeId < 10){
    				$id_no = '000'.$employeeId;
    			}
    			elseif($employeeId < 100)
    			{
    				$id_no = '00'.$employeeId;
    			}
    			elseif($employeeId < 1000)
    			{
    				$id_no = '0'.$employeeId;
    			}
    		}

    		else
    		{
    			$employee =User::where('user_type','Employee')->orderBy('id','DESC')->first()->id;
    			$employeeId = $employee+1;
    			if($employeeId < 10)
    			{
    				$id_no = '000'.$employeeId;
    			}
    			elseif($employeeId < 100)
    			{
    				$id_no = '00'.$employeeId;
    			}
    			elseif($employeeId < 1000)
    			{
    				$id_no = '0'.$employeeId;
    			}
    		}

    		$final_id_no = $checkYear.$id_no;
    		$user = new User();
    		$code = rand(0000,9999);
    		$user->Id_no = $final_id_no;
    		$user->password = bcrypt($code);
    		$user->user_type = 'Employee';
    		$user->code = $code;
    		$user->name = $request->name;
    		$user->fname = $request->fname;
    		$user->mname = $request->mname;
    		$user->mobile = $request->mobile;
    		$user->email = $request->email;
    		$user->address = $request->address;
    		$user->gender = $request->gender;
    		$user->religion = $request->religion;
    		$user->salary = $request->salary;
      $user->designation_id = $request->designation_id;
    		$user->dob = date('Y-m-d',strtotime($request->dob));
      $user->join_date = date('Y-m-d',strtotime($request->join_date));

    			if($request->file('image'))
		    	{
		    		$file = $request->file('image');
		      $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
		      $file->move(public_path('upload/employee_image/'),$filename);
      		$user['image'] = $filename;
		    	}

      $user->save();

      $employee_salary = new EmployreeSalaryLog();
      $employee_salary->employeee_id = $user->id;
      $employee_salary->effected_date = date('Y-m-d',strtotime($request->join_date));
    	 $employee_salary->previous_salary = $request->salary;
    	 $employee_salary->present_salary = $request->salary;
    	 $employee_salary->increment_salary = '0';
      $employee_salary->save();
     });
       return redirect()->route('employees.reg.view')->with('success','Data Insert Successfully');
      }

		    public function edit($id)
		    {
		    	$data['editdata']=User::find($id);
		     $data['designation'] = designation::all();
		    	return view('backend.employee.employee_reg.add-employee',$data);
		    }


   public function update(Request $request,$id)
   {
    		$user =User::find($id);
    		$user->name = $request->name;
    		$user->fname = $request->fname;
    		$user->mname = $request->mname;
    		$user->mobile = $request->mobile;
    		$user->email = $request->email;
    		$user->address = $request->address;
    		$user->gender = $request->gender;
    		$user->religion = $request->religion;
      $user->designation_id = $request->designation_id;
    		$user->dob = date('Y-m-d',strtotime($request->dob));

    			if($request->file('image'))
		    	{
		    		$file = $request->file('image');
		    		@unlink(public_path('upload/employee_image/'.$user->image));
		      $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
		      $file->move(public_path('upload/employee_image/'),$filename);
      		$user['image'] = $filename;
		    	}
      $user->save();
      return redirect()->route('employees.reg.view')->with('success','Data Updated Successfully');
   }


    
   public function detalis($id){
    $data['detalis'] = User::find($id);
    $pdf = PDF::loadView('backend.employee.employee_reg.Employee-detalis-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
   }

   // function generate_pdf() {
   // }


   
}
