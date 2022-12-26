<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StduentClass;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmount;

class FeeAmountController extends Controller
{

 public function view()
  {
   $data['allData'] =FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
   return view('backend.setup.fee_amount.view-fee-amount',$data);
  }

 public function add()
  {
   $data['fee_categorys'] = FeeCategory::all();
   $data['classes'] = StduentClass::all();
   return view('backend.setup.fee_amount.add-fee-amount',$data);
  }


 public function store(Request $Request)
  {
   $countClass = count($Request->class);
   if ($countClass != NULL) {
   for ($i=0; $i <$countClass ; $i++) { 
   $fee_amount = new FeeCategoryAmount();
   $fee_amount->fee_category_id = $Request->fee_category_id;
   $fee_amount->class = $Request->class[$i];
   $fee_amount->amount = $Request->amount[$i];
   $fee_amount->save();
    }
    }
   return redirect()->route('fee.amount.view')->with('success','Data Insert Successfully');
  }


 public function edit($fee_category_id)
  {
   $data['editData']=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class','asc')->get();
   $data['fee_categorys'] = FeeCategory::all();
   $data['classes'] = StduentClass::all();
   return view('backend.setup.fee_amount.edit-fee-amount',$data);
  }

   
 public function update(Request $Request,$fee_category_id)
  {
   if($Request->class==NULL){
   return redirect()->back()->with('Error','Sorry ! You Do Not Select  any Item');
   }
   else
    {
     FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
     $countClass = count($Request->class);
     for ($i=0; $i <$countClass ; $i++) { 
     $fee_amount = new FeeCategoryAmount();
     $fee_amount->fee_category_id = $Request->fee_category_id;
     $fee_amount->class = $Request->class[$i];
     $fee_amount->amount = $Request->amount[$i];
     $fee_amount->save();
     }
    }
   return redirect()->route('fee.amount.view')->with('success','Data Updated Successfully');
  }

 
 public function delete (Request $request)
  {
   $data = FeeCategory::find($request->id);
   $data->delete();
   return redirect()->route('fee.category.view')->with('success','Data Delete Successfully');
  } 

    
 public function detalis($fee_category_id)
  {
   $data['editData']=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class','asc')->get();
   return view('backend.setup.fee_amount.detalis-fee-amount',$data);
  }



}
