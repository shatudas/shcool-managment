<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
use DB;

class SubjecCtontroller extends Controller
{
     public function view()
    {
    	$data['allData'] =Subject::all();
    	return view('backend.setup.subject.view-subject',$data);
    }


    public function add()
    {

    	return view('backend.setup.subject.add-subject');
    }


     public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:subjects,name',
      ]);

      $data= new Subject();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.subject.view')->with('success','Data Insert Successfully');
    }


     public function edit($id)
    {
       $editData=Subject::find($id);
       return view('backend.setup.subject.add-subject',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=Subject::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:subjects,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.subject.view')->with('success','Data Updated Successfully');
    }


    public function delete (Request $request)
    {
      $data = Subject::find($request->id);
      $data->delete();
      return redirect()->route('setups.subject.view')->with('success','Data Delete Successfully');
    } 
}
