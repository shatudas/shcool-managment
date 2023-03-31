<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Year;
use App\Model\AssingStudent;
use App\Model\StduentClass;
use PDF;


class IdCardController extends Controller
{
    public function view(){
     $data['years'] = Year::orderBy('id','desc')->get();
  		 $data['classs'] = StduentClass::all();
   		return view('backend.report.view-ID-card',$data);
    }


   public function get(Request $request){
    $year_id      = $request->year_id;
   	$class_id     = $request->class_id;
    $chack_data = AssingStudent::where('yesr_id',$year_id )->where('class_id',$class_id)->first();

    if($chack_data == true){
    	$data['alldata'] = AssingStudent::where('yesr_id',$year_id)->where('class_id',$class_id)->get();
     
    	$pdf = PDF::loadView('backend.report.ID-card-pdf', $data);
					$pdf->SetProtection(['copy', 'print'], '', 'pass');
					return $pdf->stream('document.pdf');
					// return view('backend.report.ID-card-pdf', $data);
				}else{
      return redirect()->back()->with('error','Sorry ! Criteria dose not match !');
    }
   }


}
