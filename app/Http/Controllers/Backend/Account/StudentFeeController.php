<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssingStudent;
use App\Model\DiscountStudent;
use App\Model\StduentClass;
use App\User;
use App\Model\Year;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\FeeCategory;
use App\Model\AccountStudentFee;
use App\Model\FeeCategoryAmount;
use DB;
use PDF;

class StudentFeeController extends Controller
 {
  public function view(){
   $data['alldata'] = AccountStudentFee::all();
   return view('backend.account.student.fee-view',$data);
  }

  public function add(){ 
   $data['years'] = Year::orderBy('id','desc')->get();
   $data['classs'] = StduentClass::all();
   $data['fee_categorys'] = FeeCategory::all();
   return view('backend.account.student.fee-add',$data);
  }


  public function getStudent(Request $request){
   $year_id = $request->year_id;
   $class_id = $request->class_id;
   $fee_category_id = $request->fee_category_id;
   $date = date('Y-m',strtotime($request->date));
   $data = AssingStudent::with(['discount'])->where('yesr_id',$year_id)->where('class_id',$class_id)->get();
  
   $html['thsource']  = '<th>ID NO</th>';
   $html['thsource'] .= '<th>Student Name</th>';
   $html['thsource'] .= '<th>Father Name</th>';
   $html['thsource'] .= '<th>Mother Name</th>';
   $html['thsource'] .= '<th>Original Fee</th>';
   $html['thsource'] .= '<th>Discount Amount</th>';
   $html['thsource'] .= '<th>Fee (this Student)</th>';
   $html['thsource'] .= '<th>Select</th>';

   foreach ($data as $key => $std) {
    $registrationfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class',$std->class_id)->first();

    $AccountStudentFee =AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();

    if($AccountStudentFee !=null){
     $checked='checked';
    }else{
     $checked='';
    }

    $html[$key]['tdsource']  = '<td>'.$std['student']['id_no'].'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'">'.'</td>';
    $html[$key]['tdsource'] .= '<td>'.$std['student']['name'].'<input type="hidden" name="year_id" value="'.$std->year_id.'">'.'</td>';
    $html[$key]['tdsource'] .= '<td>'.$std['student']['fname'].'<input type="hidden" name="class_id" value="'.$std->class_id.'">'.'</td>';
    $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'TK'.'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
    $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';
   
    $orginalfee = $registrationfee->amount;
    $discount = $std['discount']['discount'];
    $Discounablefee = $discount/100*$orginalfee;
    $finalfee = (float)$orginalfee-(float)$Discounablefee;

    $html[$key]['tdsource'] .= '<td>'.'<input type="text" name="amount[]" value="'.$finalfee.'" class="form-control" readonly>'.'</td>';

    $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform:scale(1.5);margin-left:10px;">'.'</td>';
    }
    return response()->json(@$html);
   } 


   public function store(Request $request){
    $date =date('Y-m',strtotime($request->date));
    AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$date)->delete();
    $checkdata = $request->checkmanage;
    if($checkdata !=null){
     for($i=0; $i<count($checkdata); $i++){
      $data = new AccountStudentFee();
      $data->class_id = $request->class_id;
      $data->year_id = $request->year_id;
      $data->date = $date;
      $data->fee_category_id = $request->fee_category_id;
      $data->student_id = $request->student_id[$checkdata[$i]];
      $data->amount = $request->amount[$checkdata[$i]];
      $data->save();
     }
    }
    if(! empty(@$data) ||empty($checkdata)){
    return redirect()->route('student.fee.view')->with('success','well done ! Successfully Update');
    }else{
     return redirect()->back()->with('error','Sorry! date not Saved');
    }
   }

}
