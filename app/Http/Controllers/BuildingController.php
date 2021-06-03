<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $building_data = Building::get();
        return view('adminka_buildings', compact('building_data'));
    }

    public function create()
    {
        //
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        {
            $building_data = Building::where('id', $id)->get();
            return view('adminka_edit_buildings', compact('building_data'));
        }
    }

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
