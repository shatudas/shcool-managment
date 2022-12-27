<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentShift;
use DB;


class StudentshiftController extends Controller
{
     public function view()
    {
    	$data['allData'] =StudentShift::all();
    	return view('backend.setup.student_shift.view-shift',$data);
    }


    public function add()
    {
    	return view('backend.setup.student_shift.add-shift');
    }


     public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:student_shifts,name',
      ]);

      $data= new StudentShift();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.shift.view')->with('success','Data Insert Successfully');
    }


    public function edit($id)
    {
       $editData=StudentShift::find($id);
       return view('backend.setup.student_shift.add-shift',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=StudentShift::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:student_shifts,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.shift.view')->with('success','Data Updated Successfully');
    }


    public function delete (Request $request)
    {
      $data = StudentShift::find($request->id);
      $data->delete();
      return redirect()->route('setups.student.year.view')->with('success','Data Delete Successfully');
    }
}
