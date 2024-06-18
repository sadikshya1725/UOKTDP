<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'type'=>'Adminsitrativehead',
                'name'=>'Update Name',
                'description'=>'Update Description',
                'image'=>'sample.jpg'
            ],
            [
                'type'=>'Vicechairperson',
                'name'=>'Update Name',
                'description'=>'Update Description',
                'image'=>'sample.jpg'
            ]
        ]);
    }
}
