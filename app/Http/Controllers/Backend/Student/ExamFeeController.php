bh <?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssingStudent;
use App\Model\DiscountStudent;
use App\User;
use App\Model\StduentClass;

use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\FeeCategoryAmount;
use App\Model\Year;
use App\Model\ExamType;
use DB;
use PDF;


class ExamFeeController extends Controller
{
    public function view()
   {
   	$data['years'] = Year::orderBy('id','desc')->get();
    $data['classs'] = StduentClass::all();
    $data['exam_Type'] = ExamType::all();
    return view('backend.student.exam_type.view-exam-fee',$data);
   }
    
   public function getStudent(Request $request){
   $yesr_id = $request->yesr_id;
   $class_id = $request->class_id;
   if($yesr_id !=''){
   	$where[] = ['yesr_id','like',$yesr_id.'%'];
   }
   if ($class_id !=''){
   	$where[] = ['class_id','like',$class_id.'%'];
   }
   $allStudent = AssingStudent::with(['discount'])->where($where)->get();

   $html['thsource']  = '<th>SL</th>';
   $html['thsource'] .= '<th>ID NO</th>';
   $html['thsource'] .= '<th>Student Name</th>';
   $html['thsource'] .= '<th>Roll</th>';
   $html['thsource'] .= '<th>Exam Fee</th>';
   $html['thsource'] .= '<th>Discount Amount</th>';
   $html['thsource'] .= '<th>Fee(this Student)</th>';
   $html['thsource'] .= '<th>Action</th>';

   foreach ($allStudent as $key => $v) {
   	$registrationfee = FeeCategoryAmount::where('fee_category_id','3')->where('class',$v->class_id)->first();
   	$color = 'success';

   	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
    $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
    $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
    $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'TK'.'</td>';
    $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

    $orginalfee = $registrationfee->amount;
    $discount = $v['discount']['discount'];
    $Discounablefee = $discount/100*$orginalfee;
    $finalfee = (float)$orginalfee-(float)$Discounablefee;

    $html[$key]['tdsource'] .= '<td>'.$finalfee.'TK'.'</td>';
    $html[$key]['tdsource'] .= '<td>';

    $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("student.exam.fee.payslif").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type_id='.$request->exam_type_id.'">Fee Slip</a>';
    $html[$key]['tdsource'] .= '</td>';


   }
   return response()->json(@$html);
   } 

   public function payslif(Request $request){
    $student_id = $request->student_id;
    $class_id = $request->class_id;
    $allStudent['exam_name'] = ExamType::where('id',$request->exam_type_id)->first()['name'];
    $allStudent['detalis'] = AssingStudent::with(['discount','student'])->where('student_id', $student_id)->where('class_id',$class_id)->first();
    $pdf = PDF::loadView('backend.student.exam_type.exam-fee-slip',$allStudent);
    $pdf->SetProtection(['copy','print'], '', 'pass');
    return $pdf->stream('document.pdf');
   }

}
