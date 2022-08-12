<?php

namespace App\Http\Controllers;
use App\Models\CustomerDetails; 
use App\Models\Room_types; 
use App\Models\Room_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomDetailsController extends Controller
{
    public function index()
    {
      $data = DB::table('customer_details')
      ->join('room_details',  'customer_details.id','=','room_details.customer_details_id')
      ->join('room_types',  'room_details.room_types_id','=','room_types.id')->get();
      // ->join('room_types',  'customer_details.customer_details_id','=','room_types.id')->get();

      return view ('Booking/index', ['data' => $data]);
    }

    public function create()
    {
        $data = Room_types::all();
       return view('Booking/create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // return $request->all();
     
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

      $data1 = new Room_details(); 
      $data1->room_types_id = $request->room_types;
      $data1->customer_details_id = $data->id;
      $data1->no_of_rooms = $request->no_of_rooms; 
      $data1->check_in = $request->check_in ; 
      $data1->check_out = $request->check_out; 
      $data1->no_of_person = $request->no_of_person ; 
      $data1->remarks = $request->remarks ; 
      $data1->save();

      return redirect('/Booking')->with('a', 'Personal details added sucessfully');

    }
    public function edit ($id)
    {
      $customer = Room_details::has($id);
     
      return view('Booking.edit',compact('room_details'));
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
//     public function destroy ($id)
//     {
//       $data1= Room_details::has($id);
//       $data1->delete(); 
//       return redirect()->back()->with('message', 'Customer Detail Removed');  
//   }
}
