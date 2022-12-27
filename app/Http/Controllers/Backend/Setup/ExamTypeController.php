<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StduentClass;
use App\Model\ExamType;
use DB;


class ExamTypeController extends Controller
{
  
  public function view()
   {
    $data['allData'] =ExamType::all();
    return view('backend.setup.emax_type.view-emax-type',$data);
   }


  public function add()
   {
    	return view('backend.setup.emax_type.add-emax-type');
   }


  public function store(Request $Request)
   {
    $this->validate($Request,[
     'name'=>'required|unique:exam_types,name',
    ]);

     $data= new ExamType();
     $data->name=$Request->name;
     $data->save();
     return redirect()->route('setups.exam.type.view')->with('success','Data Insert Successfully');
   }


  public function edit($id)
   {
     $editData=ExamType::find($id);
     return view('backend.setup.emax_type.add-emax-type',compact('editData'));
   }

  public function update(Request $Request,$id)
   {
     $data=ExamType::find ($id);
      $this->validate($Request,[
      'name'=>'required|unique:exam_types,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.exam.type.view')->with('success','Data Updated Successfully');
   }


  public function delete (Request $request)
   {
     $data = ExamType::find($request->id);
     $data->delete();
     return redirect()->route('setups.exam.type.view')->with('success','Data Delete Successfully');
   }
    
}
