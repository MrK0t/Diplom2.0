<?php

namespace App\Http\Controllers;

use App\Models\OrderRoom;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryRoom;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::get();
        $order_data = OrderRoom::get();
        $room_data = Room::get();
        
        
        if($request['sDate'] !== null || $request['fDate'] !== null)
        {
            $request_after = $request->validate(
                [
                'sDate'=>'date|required|after_or_equal:'.date('Y-m-d'),
                'fDate'=>'date|required|after:'.'sDate',
                ]
            );
                
            foreach($room_data as $key => $room)
            {
                foreach($order_data as $orders)
                {
                    if($room['id'] == $orders['roomId'])
                    {
                        // if it will be all
                        if($request_after['sDate'] <= $orders['fDate'] && $request_after['fDate'] >= $orders['sDate']) 
                        {
                            unset($room_data[$key]) ;
                        }
                    }
                }
            }
        }
        
        if($request['minPrice'] !== null)
        {
            $request_after = $request->validate(
                [
                    'minPrice'=>'integer',
                    ]
                ); 
                foreach($room_data as $key => $room)
                {
                    if($room['price'] <= $request['minPrice'])
                    {
                    // dd($key, $room, $room_data);
                    unset($room_data[$key]) ;
                }
            }
            
        }

        if($request['maxPrice'] !== null)
        {
            $request_after = $request->validate(
                [
                    'maxPrice'=>'integer',
                ]
            );  
            foreach($room_data as $key => $room)
                {
                    if($room['price'] >= $request['maxPrice'])
                    {
                    // dd($key, $room, $room_data);
                    unset($room_data[$key]) ;
                }  
            }
        }

        

        return view('index', compact('room_data', 'category_data', 'type_data', 'cur_category_data'));
    }

    public function show($id)
    {
        $room_data = Room::where('id', $id)->get();
        $type_data = RoomTypes::where('id',  $room_data->toArray()[0]['roomTypeId']);

        $cur_category_data = RoomCategoryRoom::where('roomsId', $id)->get();
        $category_data = RoomCategory::get();

        $buffer = [];

        foreach($cur_category_data as $cur_category)
        {
            foreach($category_data as $category)
            {
                if ($category->id == $cur_category->toArray()['roomCategoryId'])
                {
                    array_push($buffer , $category->toArray()['name']);
 
                }
            }
        }

        return view('room', compact('room_data', 'category_data', 'type_data', 'buffer'));
    }
}
