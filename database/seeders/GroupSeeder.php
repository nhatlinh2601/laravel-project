<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                "name"=> "Quản trị viên",
            ],
            [
                "name"=> "Giáo viên",
            ],
           
            
        ];
        foreach ($groups as $group) {
            Group::updateOrCreate(['name' => $group['name']], $group);
        }
        

    }
}
