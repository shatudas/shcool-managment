<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\designation;
use DB;


class DesignationCtontroller extends Controller
{
    public function view()
    {
    	$data['allData'] =designation::all();
    	return view('backend.setup.designation.view-designation',$data);
    }


    public function add()
    {

    	return view('backend.setup.designation.add_designation');
    }


     public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:designations,name',
      ]);

      $data= new designation();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.designation.view')->with('success','Data Insert Successfully');
    }


     public function edit($id)
    {
       $editData=designation::find($id);
       return view('backend.setup.designation.add_designation',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=designation::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:designations,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('setups.designation.view')->with('success','Data Updated Successfully');
    }


    public function delete (Request $request)
    {
      $data = designation::find($request->id);
      $data->delete();
      return redirect()->route('setups.designation.view')->with('success','Data Delete Successfully');
    } 
}
