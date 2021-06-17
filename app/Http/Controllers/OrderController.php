<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderRoom;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryRoom;
use App\Models\RoomTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $room_data = Room::get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::get();
        $order_data = OrderRoom::get();
        $user_data = User::get();

        return view('adminka_orders', compact('order_data','room_data', 'category_data', 'type_data', 'cur_category_data', 'user_data'));
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request_after = $request->validate(
            [
                'roomId'=>'required',
                'userId'=>'required',
                'sDate'=>'date|required|after_or_equal:'.date('Y-m-d'),
                'fDate'=>'date|required|after:'.'sDate',
                ]
            );

        $orders_data = OrderRoom::where('roomId', intval($request_after['roomId']))->get();
        if(!empty($orders_data[0]))
        {
            $sReserv = '';
            $fReserv = '';
            $have_errors = false;
            foreach($orders_data as $orders)
            {
                // if it will be err
                if($request_after['sDate'] <= $orders['fDate'] && $request_after['fDate'] >= $orders['sDate']) 
                {
                    $sReserv = $orders['sDate'];
                    $fReserv = $orders['fDate'];
                    $have_errors = true;
                    break;
                }
            }
            if($have_errors)
            {
                
                $err_interface = new MessageBag();
                $err_interface->add('test', 'Room was already reserved from '.$sReserv.' to '.$fReserv.'.');
                
                $err = new ViewErrorBag();
                $err->__set('order_error', $err_interface );
                return redirect()->back()->withErrors($err);
            }
            else
            {
            OrderRoom::create($request_after);
            return redirect(route('orders.index'));
            }
        }
        else
        {
            // dd('all cool');   
            OrderRoom::create($request_after);
            return redirect(route('orders.index'));
        }
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        if($request['name'])
        {
            $request_after = $request->validate(
                [
                    'name'=>'string|required|unique:users,name|max:30',
                    ]
                );
            
            User::where('id', $id)->update($request_after);
            // dd($id, $request_after['name']);
        }
        if($request['email'])
        {
            $request_after = $request->validate(
                [
                    'email'=>'email|required|unique:users,email|max:50|confirmed',
                    ]
                );
            
            User::where('id', $id)->update($request_after);
        }
        if($request['firstName'])
        {
            $request_after = $request->validate(
                [
                    'firstName'=>'string|required|max:50',
                    ]
                );
            
            User::where('id', $id)->update($request_after);
        }
        if($request['lastName'])
        {
            $request_after = $request->validate(
                [
                    'lastName'=>'string|required|max:50',
                    ]
                );
            
            User::where('id', $id)->update($request_after);
        }
        if($request['patronimic'])
        {
            $request_after = $request->validate(
                [
                    'patronimic'=>'string|required|max:50',
                    ]
                );
            
            User::where('id', $id)->update($request_after);
        }
        if($request['password'])
        {
            $request_after = $request->validate(
                [
                    'password'=>'string|required|confirmed',
                    ]
                );
            $tmp = $request_after['password'];
            $request_after['password'] = Hash::make($tmp);
            User::where('id', $id)->update($request_after);
        }
        return redirect(route('orders.index'));
    }


    public function destroy($id)
    {
        OrderRoom::where('id', intval($id))->delete();
        return redirect(route('orders.index'));
    }
    
}
