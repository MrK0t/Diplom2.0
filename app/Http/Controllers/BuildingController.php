<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building_data = Building::get();
        return view('adminka_buildings', compact('building_data'));
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
                'name'=>'string|required|unique:buildings,name|max:4',
                'address'=>'string|required|max:60'
            ]
        );

        Building::create($request_after);
        return redirect(route('buildings.index'));
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
        {
            $building_data = Building::where('id', $id)->get();
            return view('adminka_edit_buildings', compact('building_data'));
        }
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
                'name'=>'string|required|unique:room_types,name|max:50',
                'address'=>'string|required|max:60'
            ]
        );

        Building::where('id', $id)->update($request_after);
        return redirect(route('buildings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building_data = Building::where('id', $id)->first();
        if($building_data != null)
        {
            // Building::delete($building_data);
            $building_data->delete();

        }
        return redirect(route('buildings.index'));

    }
}
