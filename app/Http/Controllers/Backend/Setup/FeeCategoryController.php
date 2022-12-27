<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StduentClass;
use App\Model\FeeCategory;
use DB;


class FeeCategoryController extends Controller
{
   public function view()
    {
    	$data['allData'] =FeeCategory::all();
    	return view('backend.setup.fee_category.view-fee-Category',$data);
    }

   public function add()
    {
    	return view('backend.setup.fee_category.add-fee-Category');
    }

   public function store(Request $Request)
    {
      $this->validate($Request,[
        'name'=>'required|unique:fee_categories,name',
      ]);

      $data= new FeeCategory();
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('fee.category.view')->with('success','Data Insert Successfully');
    }


   public function edit($id)
    {
       $editData=FeeCategory::find($id);
       return view('backend.setup.fee_category.add-fee-Category',compact('editData'));
    }

   
    public function update(Request $Request,$id)
    {
     $data=FeeCategory::find ($id);

      $this->validate($Request,[
        'name'=>'required|unique:fee_categories,name,'.$data->id           
      ]);
     
      $data->name=$Request->name;
      $data->save();
      return redirect()->route('fee.category.view')->with('success','Data Updated Successfully');
    }

   public function delete (Request $request)
    {
      $data = FeeCategory::find($request->id);
      $data->delete();
      return redirect()->route('fee.category.view')->with('success','Data Delete Successfully');
    } 

}
