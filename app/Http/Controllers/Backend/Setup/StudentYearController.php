<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Year;

class StudentYearController extends Controller
{
     public function view()
    {
    	$data['allData'] =Year::all();
    	return view('backend.setup.year.view-year',$data);
    }


    public function add()
    {

    	return view('backend.setup.year.add-year');
    }


     public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:years,name',
      ]);

      $data= new Year();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.year.view')->with('success','Data Insert Successfully');
    }


     public function edit($id)
    {
       $editData=Year::find($id);
       return view('backend.setup.year.add-year',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=Year::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:years,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.student.year.view')->with('success','Data Updated Successfully');
    }


    public function delete (Request $request)
    {
      $data = Year::find($request->id);
      $data->delete();
      return redirect()->route('setups.student.year.view')->with('success','Data Delete Successfully');
    } 
}
