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
    public function index()
    {
        $room_data = Room::get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::get();

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

    public function index_filtered($request)
    {
        dd($request);
        $room_data = Room::get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::get();

        return view('index', compact('room_data', 'category_data', 'type_data', 'cur_category_data'));
    }
}
