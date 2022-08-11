<?php

namespace App\Http\Controllers;
use App\Models\CustomerDetails;
use Illuminate\Http\Request;

class CustomerDetailsController extends Controller
{
    public function index()
    {
      $customer = CustomerDetails::all();
      return view ('Customer.index', compact ('customer'));
    }

    public function create()
    {
       return view('Customer.create');
    }

    public function store(Request $request)
    {
     
      $request->validate([
        'title' => 'required | String',
        'name' =>  'required | String' ,
        'address' => 'required | String',
      ]);

      $data = new CustomerDetails();
      $data->title = $request->title ; 
      $data->name = $request->name; 
      $data->address = $request->address; 
      $data->number = $request->number; 
      $data->email = $request->email; 
      $data->identity = $request->identity; 
      $data->save();

      return redirect('/Customer')->with('a', 'Personal details added sucessfully');

    }
    public function edit ($id)
    {
      $customer = customerDetails::has($id);
      return view('Customer.edit',compact('customer_details'));
    }
    public function update(Request $request, $customer)
    {
       
        $request->validate([
            'title' => 'required | String',
            'name' =>  'required | String' ,
            'address' => 'required | String',
          ]);
    
          $data = CustomerDetails::has($id);
          $data->title = $request->title ; 
          $data->name = $request->name; 
          $data->address = $request->address; 
          $data->number = $request->number; 
          $data->email = $request->email; 
          $data->identity = $request->identity; 
          $data->update();

      return redirect('/Customer')->with('message', 'Customer detail edited sucessfully');

    }
    public function destroy ($id)
    {
      $data= Gallery::has($id);
      $data->delete(); 
      return redirect()->back()->with('message', 'Customer Detail Removed');  
  }
}
