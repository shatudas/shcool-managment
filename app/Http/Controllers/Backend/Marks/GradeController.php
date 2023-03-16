<?php

namespace App\Http\Controllers\Backend\Marks;

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
use App\Model\ExamType;
use App\Model\MarkGrade;
use DB;
use PDF;



class GradeController extends Controller
{
    public function view(){
    	$data['alldata'] = MarkGrade::all();
    	return view('Backend.marks.grade-marks-view',$data);
    }

    public function add(){
    	return view('Backend.marks.grade-marks-add');
    }


     public function edit($id){
    	$data['editdata'] = MarkGrade::find($id);
    	return view('Backend.marks.grade-marks-add',$data);
    }

    public function store(Request $request){
    	$data = new MarkGrade();
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();
    	return redirect()->route('grade.view')->with('success','Data Save Successfully !');
    }


    public function update(Request $request, $id){
    	$data = MarkGrade::find($id);
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();
    	return redirect()->route('grade.view')->with('success','Data Update Successfully !');

    }



}
