<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssingStudent;
use App\Model\DiscountStudent;
use App\User;
use App\Model\StduentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\Year;
use App\Model\StudentMarks;
use App\Model\AssingSubject;
use DB;
use PDF;

class defaultController extends Controller
{
 public function getstudent(Request $request){
  $yesr_id = $request->yesr_id;
  $class_id = $request->class_id;
  $allData = AssingStudent::with('student')->where('yesr_id',$yesr_id)->where('class_id',$class_id)->get();
  return response()->json($allData);
 }

 public function getsubject(Request $request){
  $class_id = $request->class_id;
  $allData=  AssingSubject::with(['subject'])->where('class_id',$class_id)->get();
  return response()->json($allData);
 }




}
