<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StduentClass;


class StudentClassController extends Controller
{
    public function view()
    {
    	$data['allData'] =StduentClass::all();
    	return view('backend.setup.student_class.view-class',$data);
    }


    public function add()
    {
    	return view('backend.setup.student_class.add-class');
    }


     public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:stduent_classes,name',
      ]);

      $data= new StduentClass();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.class.view')->with('success','Data Insert Successfully');
      
    }



     public function edit($id)
    {
       $editData=StduentClass::find($id);
       return view('backend.setup.student_class.add-class',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=StduentClass::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:stduent_classes,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.class.view')->with('success','Data Updated Successfully');
    }


    public function delete (Request $request)
    {
      // dd($request->all());
      $data = StduentClass::find($request->id);
      $data->delete();
      return redirect()->route('setups.student.class.view')->with('success','Data Delete Successfully');
    } 

}
