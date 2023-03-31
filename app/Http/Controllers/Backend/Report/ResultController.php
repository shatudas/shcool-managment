<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Model\MarkGrade;
use\App\Model\StudentMarks;
use\App\Model\Year;
use\App\Model\StduentClass;
use\App\Model\ExamType;

use PDF;


class ResultController extends Controller
{


  public function  view()
  {
   $data['years'] = Year::orderBy('id','desc')->get();
   $data['classs'] = StduentClass::all();
   $data['exam_type'] = ExamType::all();
   return view('backend.report.view-result',$data);
  }

  public function get(Request $request){
    $year_id      = $request->year_id;
   	$class_id     = $request->class_id;
   	$exam_type_id = $request->exam_type_id;
    $singleResult = StudentMarks::where('year_id',$year_id )->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();

    if($singleResult == true){
    	$data['alldata'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
    
    	$pdf = PDF::loadView('backend.report.result-pdf', $data);
					$pdf->SetProtection(['copy', 'print'], '', 'pass');
					return $pdf->stream('document.pdf');
				}else{
      return redirect()->back()->with('error','Sorry ! Criteria dose not match !');
    }
   }

}
