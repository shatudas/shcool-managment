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

class StudentRollController extends Controller
{
     public function view()
   {
   	$data['years'] = Year::orderBy('id','desc')->get();
    $data['classs'] = StduentClass::all();
    return view('backend.student.student_roll.view-roll-gaterate',$data);
   }

   public function get_student(Request $request){
  
    $allData = AssingStudent::with(['student'])->where('yesr_id',$request->yesr_id)->where('class_id',$request->class_id)->get();
    return response()->json($allData);
   } 

   public function store(Request $request){
    $yesr_id = $request->yesr_id;
    $class_id = $request->class_id;
    if($request->student_id !=null){
     for($i=0; $i < count($request->student_id); $i++){
     AssingStudent::where('yesr_id',$yesr_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
     }
    }
    else{
     return redirect()->back()->with('error','Sorry ! There are no Student');
    }
    return redirect()->route('student.roll.view')->with('success','successfully roll generated');
   }

}
