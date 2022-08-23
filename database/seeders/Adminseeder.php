<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
            'id'=>1,
            'name'=>'Mallows',
            'email'=>'mallowtech@gmail.com',
            'password'=>Hash::make('mallowtech@123'),
            'created_at'=>now(),
            'updated_at'=>now(),


        ], [
            'id'=>2,
            'name'=>'Mathu',
            'email'=>'mathu@gmail.com',
            'password'=>Hash::make('mathu123'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]
    ]);
    }
}
