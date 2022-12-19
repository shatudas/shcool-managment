<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentGroup;

class StudentGroupController extends Controller
{
   public function view()
    {
    	$data['allData'] =StudentGroup::all();
    	return view('backend.setup.Studentgroup.view-group',$data);
    }


    public function add()
    {

    	return view('backend.setup.Studentgroup.add-group');
    }


     public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:student_groups,name',
      ]);

      $data= new StudentGroup();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.group.view')->with('success','Data Insert Successfully');
    }


     public function edit($id)
    {
       $editData=StudentGroup::find($id);
       return view('backend.setup.Studentgroup.add-group',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=StudentGroup::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:student_groups,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.group.view')->with('success','Data Updated Successfully');
    }


    public function delete (Request $request)
    {
      $data = StudentGroup::find($request->id);
      $data->delete();
      return redirect()->route('setups.student.group.view')->with('success','Data Delete Successfully');
    } 
}
