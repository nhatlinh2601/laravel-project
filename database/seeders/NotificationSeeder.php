<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $notifications = [
            [
                "content" => 'HTML and CSS for beginer',

            ],
            [
                "content" => 'C++ from basic to advanced',

            ]
        ];

        foreach ($notifications as $notification) {
            Notification::updateOrCreate(['content' => $notification['content']], $notification);
        }
    }
}
