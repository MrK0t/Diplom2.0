<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryRoom;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $room_data = Room::get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::get();
        $building_data = Building::get();
        foreach($room_data as $key =>$room)
        {
            if($room['isActive'] == 0)
            {
                unset($room_data[$key]);
            }
        }

        return view('adminka_rooms', compact('room_data', 'category_data', 'type_data', 'cur_category_data', 'building_data'));
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        $request_after = '';
        
        if($request['categoryId'])
        {

            $request_after = $request->validate(
                [
                    'buildingId'=>'integer|required',
                    'roomTypeId'=>'integer|required',
                    'roomNumber'=>'string|required|max:4',
                    'image'=>'string|required|max:300',
                    'description'=>'string|required|max:300',
                    'price'=>'integer|required',
                    
                    'categoryId'=>'nullable'
                    ]
                );
                
            $category_data = array_pop($request_after);
            $respo = Room::create($request_after);
            
            foreach($category_data as $category)
            {
                $mas['roomsId']=$respo->id;
                $mas['roomCategoryId']=intval($category);

                RoomCategoryRoom::create($mas);
            }

        }
        else
        {
            $request_after = $request->validate(
                [
                    'buildingId'=>'integer|required',
                    'roomTypeId'=>'integer|required',
                    'roomNumber'=>'string|required|max:4',
                    'image'=>'string|required|max:300',
                    'description'=>'string|required|max:300',
                    'price'=>'integer|required',
                    
                ]
            );
            $respo = Room::create($request_after);
        }


        return redirect(route('rooms.index'));
    }



    public function show($id)
    {
        $room_data = Room::where('id', $id)->get();
        $type_data = RoomTypes::where('id',  $room_data->toArray()[0]['roomTypeId']);
        $cur_category_data = RoomCategoryRoom::where('roomsId', $id)->get();
        $category_data = RoomCategory::where('id',$cur_category_data->toArray()[0]['roomCategoryId']);

        return view('adminka_edit_room', compact('room_data', 'category_data', 'type_data'));
    }

    

    public function edit($id)
    {
        $room_data = Room::where('id', $id)->get();
        $category_data = RoomCategory::get();
        $type_data = RoomTypes::get();
        $cur_category_data = RoomCategoryRoom::where('roomsId', $id)->get();
        $building_data = Building::get();
        
        return view('adminka_edit_room', compact('room_data', 'category_data', 'type_data', 'cur_category_data', 'building_data'));
    }
    
    
    
    public function update(Request $request, $id)
    {
        $request_after = '';
        if($request['categoryId'])
        {
            $request_after = $request->validate(
                [
                    'buildingId'=>'integer|required',
                    'roomTypeId'=>'integer|required',
                    'roomNumber'=>'string|required|max:4',
                    'image'=>'string|required|max:300',
                    'description'=>'string|required|max:300',
                    'price'=>'integer|required',
                    
                    'categoryId'=>'nullable'
                    ]
                );
                
                $mas=[];
                $new_category_data = array_pop($request_after); 
                RoomCategoryRoom::where('roomsId', $id)->delete();
                
                foreach($new_category_data as $category)
                {
                    $mas['roomsId']=$id;
                    $mas['roomCategoryId']=intval($category);
                    
                    RoomCategoryRoom::create($mas);
                }
            }
            else
            {
                $request_after = $request->validate(
                    [
                        'buildingId'=>'integer|required',
                        'roomTypeId'=>'integer|required',
                        'roomNumber'=>'string|required|max:4',
                        'image'=>'string|required|max:300',
                        'description'=>'string|required|max:300',
                        'price'=>'integer|required',
                        
                        ]
                    );
                RoomCategoryRoom::where('roomsId', $id)->delete();
            }
                
                Room::where('id', $id)->update($request_after);
        return redirect(route('rooms.index'));
    }




    public function destroy($id)
    {
        $room_data = Room::where('id', $id)->first();
        $room_data['isActive'] = 0;
        
        $updated_data = [
            "isActive" => $room_data['isActive'],
            
        ];
        Room::where('id', $id)->update($updated_data);
        return redirect(route('rooms.index'));

    }
}
