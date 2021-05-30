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
        for($i = 0; $i < 3; $i++)
        {
            DB::table('buildings')->insert([
                'name' => random_int(2, 4),
                'address' => Str::random(51).'Street',
                // 'email' => Str::random(10).'@gmail.com',
                // 'password' => Hash::make('password'),
                ]);
        }

        for($i = 0; $i < 10; $i++)
        {
            DB::table('room_types')->insert([
                'name' => Str::random(26).'Room-Type',
                ]);
        }

        for($i = 0; $i < 50; $i++)
        {
            DB::table('rooms')->insert([
                'roomTypeId' => random_int(1, 10),
                'buildingId' => random_int(1, 3),
                'roomNumber' => random_int(2, 4),
                'image' => 'depositphotos_2232863-stock-photo-interior-of-a-hotel-room.jpg',
                'price' => random_int(1500, 20000),
                'description' => Str::random(51).'Room-description',
                'isFree' => random_int(0, 1),
                ]);
        }

        for($i = 1; $i <= 10; $i++)
        {
            DB::table('room_categories')->insert([
                'name' => Str::random(31).'Room-Category',
                ]);
        }

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
        
        for($i = 1; $i <= 3; $i++)
        {
            DB::table('orders')->insert([
                'userId' => $i,
                ]);
        }

        for($i = 1; $i <= 3; $i++)
        {
            DB::table('order_rooms')->insert([
                'orderId' => $i,
                'roomId' => $i*2,
                'sDate' => date('Y-m-d'),
                'fDate' => date('Y-m-d',strtotime("+5 day")),
                ]);
            }
    }
}
