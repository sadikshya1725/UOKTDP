<?php

namespace Database\Seeders;
use App\Models\Orgchart;

use Illuminate\Database\Seeder;

class OrgchartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orgchart::create([
            'image'=>'parishad.jpg',
        ]);
    }
}
