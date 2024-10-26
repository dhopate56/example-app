<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index(){
        $title= "create customer";
        $customer=new Customers();
 
        $url= url('/customer');
        $data= compact('url','title', 'customer');
        return view('customer')->with($data);
    }
    public function store(Request $request){
// echo "<pre>";
// print_r($request->all());

// custom helper example calling code --->
// show($request->all());
// die;
$customer= new Customers;
$customer->name=$request['name'];
$customer->save();
return redirect('/customer/view');
    }
    public function view(){
        $customer= Customers::all();
      $data= compact('customer');
return view('customer-view')->with($data);
    }
    public function delete($id){
$customer= Customers::find($id)->delete();
// if(!is_null($customer)){
//     $customer->delete();
// }
return redirect()->back();
    }
    public function edit($id){

        $customer= Customers::find($id);
        if(is_null($customer)){
return redirect('customer/view');        }
else{
    $title= "update customer";
    $url= url('/customer/update') ."/". $id;
$data= compact('customer','url', 'title');
return view('customer')->with($data);
}    }

public function update($id, Request $request){
    $customer= Customers::find($id);
    $customer->name=$request['name'];
    $customer->save();
return redirect('/customer/view');

}

public function trash(){
    $customer= Customers::onlyTrashed()->get();
  $data= compact('customer');
return view('customer-trash')->with($data);
}

public function restore($id){
    $customer= Customers::withTrashed()->find($id)->restore();
    // if(!is_null($customer)){
    //     $customer->delete();
    // }
    return redirect('/customer/view');
        }

         public function permanentdelete($id){
            $customer= Customers::withTrashed()->find($id)->forceDelete();
            // if(!is_null($customer)){
//     $customer->delete();
// }
return redirect()->back();
    }

    

}
