<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<20;$i++){
            DB::table('userdata')->insert([
                'name' => 'name'.$i,
                'email' => Str::random(10)."@gmail.com",
                'dob' => Str::random(10),
                'phoneno' => Str::random(10),
                'address' => Str::random(10)
            ]);
        }
            
               
    }
}
