<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $courses = Course::all();

        foreach ($orders as $order) {
            for ($i=0; $i < rand(1,4) ; $i++) { 
                $course= $courses->random();
                OrderDetail::updateOrCreate(
                    [
                        'order_id'=> $order->id,
                        'course_id'=> $course->id,
                        'price'=>$course->price,
                    ]
                    );
            }
        }
    }
}
