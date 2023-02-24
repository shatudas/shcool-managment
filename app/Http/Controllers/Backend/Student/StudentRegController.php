<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssingStudent;
use App\Model\DiscountStudent;
use App\User;
use App\Model\StduentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\Year;
use DB;
use PDF;


class StudentRegController extends Controller
{

  public function view()
   {
   	$data['years'] = Year::orderBy('id','desc')->get();
    $data['classs'] = StduentClass::all();
    $data['yesr_id'] = Year::orderBy('id','desc')->first()->id;
    $data['class_id'] = StduentClass::orderBy('id','asc')->first()->id;
    $data['alldata'] = AssingStudent::where('yesr_id',$data['yesr_id'])->where('class_id',$data['class_id'])->get();
    return view('backend.student.student_reg.view-student',$data);
   }


   public function yearclasswias(Request $request){
    $data['years'] = Year::orderBy('id','desc')->get();
    $data['classs'] = StduentClass::all();
    $data['yesr_id'] = $request->yesr_id;
    $data['class_id'] = $request->class_id;
    $data['alldata'] = AssingStudent::where('yesr_id',$request->yesr_id)->where('class_id',$request->class_id)->get();
    return view('backend.student.student_reg.view-student',$data);
   }

    public function add()
    {
     $data['years'] = Year::orderBy('id','desc')->get();
     $data['classs'] = StduentClass::all();
     $data['groups'] = StudentGroup::all();
     $data['shifts'] = StudentShift::all();
    	return view('backend.student.student_reg.add-student',$data);
    }


    public function store(Request $request)
    {
    	DB::transaction(function() use($request){

    		$checkYear = Year::find($request->yesr_id)->name;
    		$student =User::where('user_type','Student')->orderBy('id','DESC')->first();
    		if($student == null){
    			$firstReg = 0;
    			$studentId = $firstReg+1;

    			if($studentId < 10){
    				$id_no = '000'.$studentId;
    			}
    			elseif($studentId < 100)
    			{
    				$id_no = '00'.$studentId;
    			}
    			elseif($studentId < 1000)
    			{
    				$id_no = '0'.$studentId;
    			}
    		}

    		else
    		{
    			$student =User::where('user_type','Student')->orderBy('id','DESC')->first()->id;
    			$studentId = $student+1;
    			if($studentId < 10)
    			{
    				$id_no = '000'.$studentId;
    			}
    			elseif($studentId < 100)
    			{
    				$id_no = '00'.$studentId;
    			}
    			elseif($studentId < 1000)
    			{
    				$id_no = '0'.$studentId;
    			}
    		}

    		$final_id_no = $checkYear.$id_no;
    		$user = new User();
    		$code = rand(0000,9999);
    		$user->Id_no = $final_id_no;
    		$user->code = $code;
    		$user->password = bcrypt($code);
    		$user->user_type = 'Student';
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
		    		$filename = date('YmdHi').$file->getClientOriginalname();
		    		$file->move(public_path('upload/student_images'),$filename);
		    		$user['image'] = $filename;
		    	}

      $user->save();

      $assing_student = new  AssingStudent();
      $assing_student->student_id = $user->id;
      $assing_student->yesr_id = $request->yesr_id;
    	 $assing_student->class_id = $request->class_id;
    	 $assing_student->group_id = $request->group_id;
    	 $assing_student->shift_id = $request->shift_id;
      $assing_student->save();

      $discount =new DiscountStudent();

      $discount->assing_student_id = $assing_student->id;
    	 $discount->discount = $request->discount;
    	 $discount->fee_category_id = '1';
    	 $discount->save();
    	 });

       return redirect()->route('student.registration.view')->with('success','Data Insert Successfully');
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
