<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StduentClass;
use App\Model\Subject;
use App\Model\AssingSubject;
use DB;
use Auth;

class AssingSubjecCtontroller extends Controller
{
    public function view()
  {
   $data['allData'] =AssingSubject::select('class_id')->groupBy('class_id')->get();
   return view('backend.setup.assing_subject.view-assing-subject',$data);
  }

 public function add()
  {
   $data['subjects'] = Subject::all();
   $data['classes'] = StduentClass::all();
   return view('backend.setup.assing_subject.add-assing-subject',$data);
  }


 public function store(Request $Request)
  {
   $subjectCount = count($Request->subject_id);
   if ($subjectCount != NULL) {
   for ($i=0; $i <$subjectCount ; $i++) { 
   $assinfSub = new AssingSubject();
   $assinfSub->class_id = $Request->class_id;
   $assinfSub->subject_id = $Request->subject_id[$i];
   $assinfSub->full_mark = $Request->full_mark[$i];
   $assinfSub->pass_work = $Request->pass_work[$i];
   $assinfSub->get_work = $Request->get_work[$i];
   $assinfSub->save();
    }
    }
   return redirect()->route('setups.assing.subject.view')->with('success','Data Insert Successfully');
  }


 public function edit($class_id)
  {
   $data['editData']=AssingSubject::where('class_id',$class_id)->get();

   // dd($data['editData']);

   $data['subjects'] = Subject::all();
   $data['classes'] = StduentClass::all();
   return view('backend.setup.assing_subject.edit-assing-subject',$data);
  }

   
 public function update(Request $Request,$class_id)
  {
   if($Request->subject_id==NULL){
   return redirect()->back()->with('Error','Sorry ! You Do Not Select  any Item');
   }
   else
    {
      AssingSubject::whereNotIn('subject_id',$Request->subject_id)->where('class_id',$Request->class_id)->delete();
      foreach($Request->subject_id as $key =>$value){
        $assing_subject_exist = AssingSubject::where('subject_id',$Request->subject_id[$key])->where('class_id',$Request->class_id)->first();
        if($assing_subject_exist){
          $assing_subject = $assing_subject_exist;
        }else{
          $assing_subject = new AssingSubject();  
        }
         $assing_subject->class_id   = $Request->class_id;
         $assing_subject->subject_id = $Request->subject_id[$key];
         $assing_subject->full_mark  = $Request->full_mark[$key];
         $assing_subject->pass_work  = $Request->pass_work[$key];
         $assing_subject->get_work   = $Request->get_work[$key];
         $assing_subject->updated_by = Auth::user()->id;

      }
    }
   return redirect()->route('setups.assing.subject.view')->with('success','Data Updated Successfully');


  }


 public function delete (Request $request)
  {
   $data = FeeCategory::find($request->id);
   $data->delete();
   return redirect()->route('fee.category.view')->with('success','Data Delete Successfully');
  } 

    
 public function detalis($class_id)
  {

   $data['editData']=AssingSubject::where('class_id',$class_id)->get();
   // dd($data['editData']);
   return view('backend.setup.assing_subject.detalis-assing-subject',$data);
  }



}
