<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AccountOtherCost;

class OtherCostController extends Controller
{
	public function view(){
		$data['alldata'] = AccountOtherCost::orderBy('id','desc')->get();
   	return view('backend.account.cost.otherCost-view',$data);
	}

		public function add(){
   	return view('backend.account.cost.otherCost-add');
	}

	public function store(Request $request){
		$cost = new AccountOtherCost();
		$cost->date = date('Y-m-d',strtotime($request->date));
		$cost->amount = $request->amount;

		if ($request->file('image')){
		$file = $request->file('image');
		$filename = date('YmdHi').$file->getClientOriginalName();
		$file->move(public_path('upload/cost_images'),$filename);
		$cost['image']= $filename;
	}
	$cost->description =$request->description;
	$cost->save();
	return redirect()->route('account.cost.view')->with('success','Data Saved Successfully');

}

   public function edit($id)
    {
     $editdata=AccountOtherCost::find($id);
     return view('backend.account.cost.otherCost-add',compact('editdata'));
    }


			  public function update(Request $request, $id){
					$cost = AccountOtherCost::find($id);
					$cost->date = date('Y-m-d',strtotime($request->date));
					$cost->amount = $request->amount;

					if ($request->file('image')){
					$file = $request->file('image');
					@unlink(public_path('upload/cost_images/'.$cost->image));
					$filename = date('YmdHi').$file->getClientOriginalName();
					$file->move(public_path('upload/cost_images'),$filename);
					$cost['image']= $filename;
				}
				$cost->description =$request->description;
				$cost->save();
				return redirect()->route('account.cost.view')->with('success','Data Saved Successfully');

 }

}
