<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $users=User::where('group_id','2')->get();
        $teachers = [
            [
                'id' => '1',
                "name" => "Khalid Dinh",
                "description" => 'Kỹ sư Devops. Có nhiều năm kinh nghiệm triển khai các mô hình Devops, CI/CD cho các dự án nước ngoài.  <br><br>
                Thành thạo việc sử dụng các công nghệ IT, Devops như: Linux, Docker, MySQL, ElasticSearch, RabbitMQ, Kafka, Nginx,...  <br><br>
                
                Thành thạo các mô hình CI/CD với Jenkins, GitLab CI  <br><br>
                
                Thành thạo lập trình các ngôn ngữ/framework: Java/Spring, NodeJS/Express, Python,...  <br><br>
                
                Thành thạo mô hình Microservices với việc triển khai trên các công nghệ cụm mới nhất: Kubernetes  <br><br>
                
                Hiểu rõ triết lý phát triển phần mềm theo mô hình Devops, DevSecOps, Agile,... ',
                'exp' => '1.5',
                'user_id'=>$users->random()->id,

            ],
            [
                'id' => '2',
                "name" => "Luu Ho Phuong",
                "description" => '* Tôi có trên 19 năm kinh nghiệm làm việc tại các vị trí như : Lập trình viên, kỹ sư mạng, kỹ sư quản trị hệ thống, trưởng phòng IT, và giám đốc kỹ thuật cho các công ty IT của Việt Nam, Singapore, Nhật Bản.  <br><br>
                * Kinh nghiệm tham gia tư vấn thiết kế, triển khai, quản trị nhiều dự án. Xây dựng hệ thống ứng dụng, mạng, bảo mật, và điện toán đám mây trong và ngoài nước. Đã từng tham gia giảng dạy tại các trung tâm, học viện CNTT . <br><br>
                
                * Có chứng chỉ quốc tế: MCSE Cloud Platform and Infrastructure, MCSE Server Infrastructure, LPIC-2 (Linux Professinal Institute), AWS Certified Solutions Architect, AWS Certified SysOps Administrator, Linux Academy Red Hat Certified Engineer  ',
                'exp' => '1.5',
                'user_id'=>$users->random()->id,

            ],
            [
                'id' => '3',
                "name" => "Đỗ Anh Việt",
                "description" => '* Tôi có trên 19 năm kinh nghiệm làm việc tại các vị trí như : Lập trình viên, kỹ sư mạng, kỹ sư quản trị hệ thống, trưởng phòng IT, và giám đốc kỹ thuật cho các công ty IT của Việt Nam, Singapore, Nhật Bản. <br><br>
                * Kinh nghiệm tham gia tư vấn thiết kế, triển khai, quản trị nhiều dự án. Xây dựng hệ thống ứng dụng, mạng, bảo mật, và điện toán đám mây trong và ngoài nước. Đã từng tham gia giảng dạy tại các trung tâm, học viện CNTT . <br><br>
                
                * Có chứng chỉ quốc tế: MCSE Cloud Platform and Infrastructure, MCSE Server Infrastructure, LPIC-2 (Linux Professinal Institute), AWS Certified Solutions Architect, AWS Certified SysOps Administrator, Linux Academy Red Hat Certified Engineer  ',
                'exp' => '1.5',
                'user_id'=>$users->random()->id,

            ],
            [
                'id' => '4',
                "name" => "Nguyễn Đỗ Việt Hoàng",
                "description" => '* Tôi có trên 19 năm kinh nghiệm làm việc tại các vị trí như : Lập trình viên, kỹ sư mạng, kỹ sư quản trị hệ thống, trưởng phòng IT, và giám đốc kỹ thuật cho các công ty IT của Việt Nam, Singapore, Nhật Bản. <br><br>
                * Kinh nghiệm tham gia tư vấn thiết kế, triển khai, quản trị nhiều dự án. Xây dựng hệ thống ứng dụng, mạng, bảo mật, và điện toán đám mây trong và ngoài nước. Đã từng tham gia giảng dạy tại các trung tâm, học viện CNTT . <br><br>
                
                * Có chứng chỉ quốc tế: MCSE Cloud Platform and Infrastructure, MCSE Server Infrastructure, LPIC-2 (Linux Professinal Institute), AWS Certified Solutions Architect, AWS Certified SysOps Administrator, Linux Academy Red Hat Certified Engineer',
                'exp' => '1.5',
                'user_id'=>$users->random()->id,
            ]


        ];


        foreach ($teachers as $teacher) {
            Teacher::updateOrCreate(['name' => $teacher['name']], $teacher);
        }
        
    }
}
