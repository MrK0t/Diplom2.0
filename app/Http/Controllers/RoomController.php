<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryRoom;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class RoomController extends Controller
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

        return view('adminka_rooms', compact('room_data', 'category_data', 'type_data', 'cur_category_data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room_data = Room::where('id', $id)->get();
        $type_data = RoomTypes::where('id',  $room_data->toArray()[0]['roomTypeId']);

        $cur_category_data = RoomCategoryRoom::where('roomsId', $id)->get();
        $category_data = RoomCategory::where('id',$cur_category_data->toArray()[0]['roomCategoryId']);

        return view('adminka_edit_room', compact('room_data', 'category_data', 'type_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room_data = Room::where('id', $id)->get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::where('roomsId', $id)->get();

        return view('adminka_edit_room', compact('room_data', 'category_data', 'type_data', 'cur_category_data'));
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
        //
    }
}
