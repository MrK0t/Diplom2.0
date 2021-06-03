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

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_data = Room::get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::get();
        $order_data = OrderRoom::get();

        return view('profile', compact('order_data','room_data', 'category_data', 'type_data', 'cur_category_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cur_date = date('Y-m-d');

        $request_after = $request->validate(
            [
                'roomId'=>'required',
                'userId'=>'required',
                'sDate'=>'date|required|after_or_equal:'.$cur_date,
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
                dd('room already reserved since '.$sReserv.' for '.$fReserv);
            }
            else
            {
            OrderRoom::create($request_after);
            return redirect(route('orders.index'));
            }
        }
        else
        {
            dd('all cool');   
            OrderRoom::create($request_after);
            return redirect(route('orders.index'));
        }
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderRoom::where('id', intval($id))->delete();
        return redirect(route('orders.index'));
    }
}
