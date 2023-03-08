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

    		$checkYear = date('Y', strtotime($request->join_date));
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
      		$data['image'] = $filename;
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


    public function edit($student_id)
    {
    	$data['editdata']=AssingStudent::with(['student','discount'])->where('student_id',$student_id)->first();
     $data['years'] = Year::orderBy('id','desc')->get();
     $data['classs'] = StduentClass::all();
     $data['groups'] = StudentGroup::all();
     $data['shifts'] = StudentShift::all();
     return view('backend.student.student_reg.add-student',$data);
    	
    }


   public function update(Request $request,$student_id)
   {
      DB::transaction(function() use($request,$student_id){

      $user = User::where('id',$student_id)->first();
      $user->name = $request->name;
      $user->fname = $request->fname;
      $user->mname = $request->mname;
      $user->mobile = $request->mobile;
      $user->address = $request->address;
      $user->gender = $request->gender;
      $user->religion = $request->religion;
      $user->dob = date('Y-m-d',strtotime($request->dob));

       if($request->file('image'))
       {
        $file = $request->file('image');
        @unlink(public_path('upload/student_images/'.$user->image));
        $filename = date('YmdHi').$file->getClientOriginalname();
        $file->move(public_path('upload/student_images'),$filename);
        $user['image'] = $filename;
       }
      $user->save();

      $assing_student = AssingStudent::where('id',$request->id)->where('student_id',$student_id)->first();
      $assing_student->student_id = $user->id;
      $assing_student->yesr_id = $request->yesr_id;
      $assing_student->class_id = $request->class_id;
      $assing_student->group_id = $request->group_id;
      $assing_student->shift_id = $request->shift_id;
      $assing_student->save();

      $discount = DiscountStudent::where('assing_student_id',$request->id)->first();
      $discount->discount = $request->discount;
      $discount->save();
      });
       return redirect()->route('student.registration.view')->with('success','Data Updated Successfully');
   }



    public function promotion($student_id)
    {
     $data['editdata']=AssingStudent::with(['student','discount'])->where('student_id',$student_id)->first();
     $data['years'] = Year::orderBy('id','desc')->get();
     $data['classs'] = StduentClass::all();
     $data['groups'] = StudentGroup::all();
     $data['shifts'] = StudentShift::all();
     return view('backend.student.student_reg.promotion-student',$data);
     
    }



     public function promotionstore(Request $request,$student_id)
   {
      DB::transaction(function() use($request,$student_id){

      $user = User::where('id',$student_id)->first();
      $user->name = $request->name;
      $user->fname = $request->fname;
      $user->mname = $request->mname;
      $user->mobile = $request->mobile;
      $user->address = $request->address;
      $user->gender = $request->gender;
      $user->religion = $request->religion;
      $user->dob = date('Y-m-d',strtotime($request->dob));

       if($request->file('image'))
       {
        $file = $request->file('image');
        @unlink(public_path('upload/student_images/'.$user->image));
        $filename = date('YmdHi').$file->getClientOriginalname();
        $file->move(public_path('upload/student_images'),$filename);
        $user['image'] = $filename;
       }
      $user->save();

      $assing_student = new AssingStudent();
      $assing_student->student_id = $student_id;
      $assing_student->yesr_id = $request->yesr_id;
      $assing_student->class_id = $request->class_id;
      $assing_student->group_id = $request->group_id;
      $assing_student->shift_id = $request->shift_id;
      $assing_student->save();

      $discount = new DiscountStudent();
      $discount->assing_student_id = $assing_student->id;
      $discount->fee_category_id = '1';
      $discount->discount = $request->discount;
      $discount->save();
      });
       return redirect()->route('student.registration.view')->with('success','Student Promotion Successfully');
   }


   public function detallis($student_id){
    $data['detalis'] = AssingStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    $pdf = PDF::loadView('backend.student.student_reg.student-detalis-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
   }

   // function generate_pdf() {
   // }


   
}
