<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use App\Models\RoomCategoryRoom;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_data = RoomCategory::get();
        return view('adminka_categories', compact('category_data'));
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
                'name'=>'string|required|unique:room_categories,name|max:50'
            ]
        );
        // dd($request_after);

        RoomCategory::create($request_after);
        return redirect(route('categories.index'));
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
        $category_data = RoomCategory::where('id', $id)->get();

        return view('adminka_edit_categories', compact('category_data'));
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
                'name'=>'string|required|unique:room_categories,name|max:50'
            ]
        );
        
        RoomCategory::where('id', $id)->update($request_after);
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $category_data = RoomCategory::where('id', $id)->first();
        if($category_data != null)
        {
            RoomCategoryRoom::where('roomCategoryId', $id)->delete();
            $category_data->delete();

        }
        return redirect(route('categories.index'));
    }
}
