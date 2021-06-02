<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $rooms_img = ['/rooms_img/testRoom.jpg', 'https://i.pinimg.com/originals/d0/a9/46/d0a946309e769a65786767815f47ac75.jpg', 'https://i.pinimg.com/originals/75/85/4a/75854af1eb06a06c06766416aafc85b4.jpg', 'https://cdn.ostrovok.ru/t/x500/content/0e/3a/0e3acad97e765e0a610f4313e3fd393c59397a6f.jpeg', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fdynamic-media-cdn.tripadvisor.com%2Fmedia%2Fphoto-o%2F13%2F2e%2F2b%2F23%2Fmur-hotel-faro-jandia.jpg%3Fw%3D900%26h%3D-1%26s%3D1&f=1&nofb=1', 'http://www.tollesonhotels.com/wp-content/uploads/2017/03/image-result-for-sustainable-hotel-room.jpeg', 'https://i1.wp.com/hotel-umz.ru/wp-content/uploads/2015/06/DSC_73011.jpg', 'https://4.bp.blogspot.com/-S03SPx13CfI/UWvKhH7KtgI/AAAAAAAAAKk/_cu12FTMifY/s1600/design_interior_20.jpg', 'https://yahroma-park.ru/images/new/2-bum/002.jpg','http://www.n-mishor.com/4k_rooms/room_13/room-13_03.jpg'];

        // BUiLDINGS
        for($i = 1; $i <= 3; $i++)
        {
            DB::table('buildings')->insert([
                'name' => $i,
                'address' => Str::random(51).'Street',
                ]);
        }

        // ROOM_TYPES
        DB::table('room_types')->insert([
            'name' =>'Одноместный',
            ]);
        DB::table('room_types')->insert([
            'name' =>'Двухместный с одной кроватью',
            ]);
        DB::table('room_types')->insert([
            'name' =>'Двухместный с двумя кроватями',
            ]);
        DB::table('room_types')->insert([
            'name' =>'Трехместный',
            ]);
        DB::table('room_types')->insert([
            'name' =>'Четырехместный',
            ]);

        // ROOM_CATEGORIES
        DB::table('room_categories')->insert([
            'name' => 'Эконом',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'Стандарт',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'Люкс',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'Семейный номер',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'С балконом',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'С кухней',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'С панорамным видом',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'С сауной',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'С телевизором',
            ]);
        DB::table('room_categories')->insert([
            'name' => 'С холодильником',
            ]);

        // ROOMS
        for($i = 0; $i < 10; $i++)
        {
            DB::table('rooms')->insert([
                'roomTypeId' => random_int(1, 5),
                'buildingId' => random_int(1, 3),
                'roomNumber' => random_int(2, 4),
                'image' => $rooms_img[$i],
                'price' => random_int(1500, 20000),
                'description' => Str::random(51).'Room-description'
            ]);
        }

        //ROOMS_CATEGORY_ROOMS 
        for($i = 1; $i <= 5; $i++)
        {
            DB::table('room_category_rooms')->insert([
                'roomsId' => $i,
                'roomCategoryId' => $i,
                ]);
            for($j = 6; $j <= 10; $j++){
                DB::table('room_category_rooms')->insert([
                    'roomsId' => $i,
                    'roomCategoryId' => $j,
                    ]);
            }
        }

        // USERS
        DB::table('users')->insert([
            'name' => 'default-user1',
            'email' => 'user1@user1.com',
            'firstName' => 'user1-FN',
            'lastName' => 'user1-LN',
            'patronimic' => 'user1-Ptrn',
            'password' => Hash::make('111'),
            'isAdmin' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'default-user2',
            'email' => 'user2@user2.com',
            'firstName' => 'user2-FN',
            'lastName' => 'user2-LN',
            'patronimic' => 'user2-Ptrn',
            'password' => Hash::make('111'),
            'isAdmin' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'firstName' => 'admin-FN',
            'lastName' => 'admin-LN',
            'patronimic' => 'admin-Ptrn',
            'password' => Hash::make('111'),
            'isAdmin' => 1,
        ]);
        

            
        // ORDERS_ROOMS
        for($i = 1; $i <= 3; $i++)
        {
        DB::table('order_rooms')->insert([
            'userId' => $i,
            'roomId' => $i*2,
            'sDate' => date('Y-m-d'),
            'fDate' => date('Y-m-d',strtotime("+5 day")),
            ]);
        }
    }
}
