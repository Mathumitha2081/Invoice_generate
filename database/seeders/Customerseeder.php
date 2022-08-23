<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Customerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            [
                'id' => 1,
                'name' => 'Mallows',
                'email' => 'mallowtech@gmail.com',
                'password' => Hash::make('mallowtech@123'),
                'created_at' => now(),
                'updated_at' => now(),


            ], [
                'id' => 2,
                'name' => 'Mathu',
                'email' => 'mathu@gmail.com',
                'password' => Hash::make('mathu123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
