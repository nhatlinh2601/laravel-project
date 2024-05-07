<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Request $request)
    {

        $students = Student::all();
        foreach ($students as $student) {

            Order::updateOrCreate([
                'student_id' => $student->id,
                'total' => rand(100, 100000),
            ]);
        }
    }
}
