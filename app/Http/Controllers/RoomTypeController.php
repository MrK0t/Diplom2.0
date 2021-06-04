<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_data = RoomTypes::where('default', 0)->get();
        return view('adminka_types', compact('type_data'));
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
        $request_after = $request->validate(
            [
                'name'=>'string|required|unique:room_types,name|max:50'
            ]
        );

        RoomTypes::create($request_after);
        return redirect(route('types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $type_data = RoomTypes::where('id', $id)->get();
        
        return view('adminka_edit_type', ['type_data' => $type_data]);
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
        $request_after = $request->validate(
            [
                'name'=>'string|required|unique:room_types,name|max:50'
            ]
        );
        
        RoomTypes::where('id', $id)->update($request_after);
        return redirect(route('types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_data = RoomTypes::where('id', $id)->first();

        if($type_data != null)
        {
            $updated_data = [
                "roomTypeId" => 1,
            ];
            Room::where('roomTypeId', $id)->update($updated_data);
            
            $type_data->delete();
        }
        return redirect(route('types.index'));
    }
}
