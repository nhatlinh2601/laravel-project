<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{

   
   
    

    public function run()
    {

        $users=User::all();
        $categories=Category::all();
        $posts = [
            [   
                'id' => '1',
                'title' => 'Authentication & Authorization trong ReactJS', 
                'content' => 'Bảo mật người dùng và dữ liệu là một ưu tiên hàng đầu trong phát triển ứng dụng ReactJS, và để đảm bảo điều này, Authentication (Xác thực) và Authorization (Phân quyền) là hai yếu tố quan trọng không thể thiếu. <br> <br>
    
                Trong quá trình xác thực, ứng dụng xác định xem người dùng có quyền truy cập hay không thông qua việc xác minh danh tính. Sử dụng các kỹ thuật như JSON Web Tokens (JWT), ReactJS tạo và xác minh token để duy trì trạng thái xác thực. Những thư viện như jsonwebtoken giúp quản lý quá trình này một cách hiệu quả. <br> <br>
                
                Ngay sau đó, phân quyền đảm bảo rằng người dùng chỉ có quyền truy cập vào những phần của ứng dụng mà họ được phép. Sử dụng các cơ sở dữ liệu hoặc middleware, ReactJS có thể kiểm soát quyền truy cập vào các thành phần hoặc tính năng cụ thể. Higher Order Components (HOCs) hoặc Hooks như useEffect thường được sử dụng để kiểm tra quyền truy cập này.<br> <br>
                
                React Router là công cụ quan trọng giúp bảo vệ các tuyến đường và trang chỉ được truy cập bởi những người dùng có quyền. Việc lưu trữ thông tin xác thực trong Local Storage hoặc Cookies giúp duy trì trạng thái xác thực qua các phiên làm việc.<br> <br>
                
                Đối với bảo mật toàn diện, không chỉ là về cách triển khai mà còn về cách chúng ta thực hiện các biện pháp an toàn trong mã nguồn. Việc xử lý các vấn đề như Cross-Site Request Forgery (CSRF) đóng một vai trò quan trọng trong việc tạo ra một ứng dụng ReactJS an toàn và đáng tin cậy.<br> <br>
                
                Tổng cộng, việc tích hợp Authentication và Authorization không chỉ tạo ra một trải nghiệm an toàn cho người dùng mà còn giúp bảo vệ thông tin quan trọng của họ trong môi trường trực tuyến ngày nay.',
    
                'slug' => 'Authentication-&-uthorization-trong-ReactJS',
                'image_path' => 'img/news/ns-1.jpg',
                'category_id' =>$categories->random()->id,
                'user_id' =>$users->random()->id,
            ],
            [
                'id' => '2',
                'title' => 'Ưu điểm của ReactJS trong Phát triển Web', 
                'content' => 'So với nhiều khung công việc khác, ReactJS là một lựa chọn mạnh mẽ cho việc phát triển ứng dụng web hiện đại. Việc sử dụng các thành phần tái sử dụng giúp tạo ra một cấu trúc mã nguồn dễ bảo trì và mở rộng.
    
                ReactJS không chỉ giúp tối ưu hóa hiệu suất của ứng dụng mà còn mang lại trải nghiệm người dùng mượt mà hơn thông qua cơ chế làm mới linh hoạt. Việc sử dụng Virtual DOM giúp giảm tải cho máy chủ và tăng tốc độ render, đặc biệt quan trọng khi xây dựng các ứng dụng phức tạp.
    
                Ngoài ra, cộng đồng đông đảo và tính tương thích tốt với nhiều thư viện và công nghệ khác nhau làm cho ReactJS trở thành sự lựa chọn lý tưởng cho các dự án phát triển web đa dạng.',
                'slug' => 'uu-diem-reactjs-phat-trien-web',
                'image_path' => 'img/news/ns-2.jpg',
                 'category_id' =>$categories->random()->id,
                'user_id' =>$users->random()->id,
            ],
    
            [
                'id' => '3',
                'title' => 'Tích hợp Redux trong Ứng dụng ReactJS', 
                'content' => 'Đối với các ứng dụng ReactJS lớn và phức tạp, việc quản lý trạng thái có thể trở nên khó khăn. Đây là nơi mà Redux đến cứu rỗi, cung cấp một quy trình quản lý trạng thái đơn giản và hiệu quả.
    
                Redux giúp tổ chức trạng thái của ứng dụng một cách rõ ràng thông qua việc sử dụng một nguồn dữ liệu duy nhất. Điều này không chỉ làm cho việc theo dõi trạng thái dễ dàng mà còn tạo ra tính dự đoán và nhất quán trong quá trình phát triển.
    
                Sự tích hợp giữa ReactJS và Redux mang lại một mô hình kiến trúc mạnh mẽ, giúp phát triển ứng dụng linh hoạt và mở rộng một cách dễ dàng. Nhờ vào việc quản lý trạng thái hiệu quả, Redux trở thành một công cụ quan trọng cho những dự án ReactJS lớn và phức tạp.',
                'slug' => 'redux-trong-ung-dung-reactjs',
                'image_path' => 'img/news/ns-3.jpg',
                'category_id' =>$categories->random()->id,
                'user_id' =>$users->random()->id,
            ],
    
            [
                'id' => '4',
                'title' => 'GraphQL: Tương lai của Giao thức Truy vấn Dữ liệu', 
                'content' => 'GraphQL đã nhanh chóng trở thành một lựa chọn phổ biến trong cộng đồng phát triển web, thay vì REST API truyền thống. Khả năng truy vấn linh hoạt, tiết kiệm băng thông, và khả năng tự mô tả của GraphQL giúp tối ưu hóa quá trình truyền tải dữ liệu giữa máy khách và máy chủ.
    
                Sự mở rộng của GraphQL cho phép người phát triển chỉ lấy những dữ liệu cần thiết, giảm lượng dữ liệu không cần thiết được truyền tải qua mạng. Điều này không chỉ tăng hiệu suất ứng dụng mà còn tạo ra một trải nghiệm người dùng tốt hơn.
    
                Với khả năng tương tác mạnh mẽ, GraphQL đang dần trở thành xu hướng quan trọng và có thể là giao thức chủ đạo trong tương lai của phát triển web.',
                'slug' => 'graphql-tuong-lai-giao-thuc-truy-van-du-lieu',
                'image_path' => 'img/news/ns-4.jpg',
                 'category_id' =>$categories->random()->id,
                'user_id' =>$users->random()->id,
            ],
    
            [
                'id' => '5',
                'title' => 'Sự Ra Đời và Phát Triển của Docker trong Hệ Sinh Thái DevOps', 
                'content' => 'Docker đã đưa đến một cuộc cách mạng trong quá trình triển khai và quản lý ứng dụng. Việc sử dụng containerization giúp đơn giản hóa quá trình triển khai và đảm bảo rằng môi trường phát triển được giữ nguyên từ máy tính cá nhân đến máy chủ.
    
                Với sự linh hoạt và tương thích rộng rãi, Docker trở thành một phần không thể thiếu trong hệ sinh thái DevOps. Khả năng tạo ra môi trường đồng nhất giữa các giai đoạn của quy trình phát triển giúp tăng tốc độ và chất lượng của dự án.
    
                DevOps không chỉ là một xu hướng, mà còn là một sự thay đổi cách tiếp cận phát triển phần mềm, và Docker chính là một công cụ quan trọng trong hành trang của các nhà phát triển và quản trị hệ thống.',
                'slug' => 'docker-trong-he-sinh-thai-devops',
                'image_path' => 'img/news/ns-5.jpg',
                 'category_id' =>$categories->random()->id,
                'user_id' =>$users->random()->id,
    
            ],
    
            [
                'id' => '6',
                'title' => 'Sự Tăng Trưởng Của Ngôn Ngữ Lập Trình Python', 
                'content' => 'Python đã trở thành một trong những ngôn ngữ lập trình phổ biến nhất trên thế giới. Được biết đến với cú pháp đơn giản và dễ đọc, Python không chỉ thuận tiện cho người mới học lập trình mà còn được ưa chuộng trong cộng đồng phát triển chuyên nghiệp.
    
                Sự đa nhiệm của Python giúp nó trở thành một công cụ linh hoạt cho nhiều ứng dụng, từ phân tích dữ liệu đến phát triển web và trí tuệ nhân tạo. Cộng đồng lớn và tính tương thích với nhiều thư viện và framework khác nhau giúp Python duy trì sức hút của mình trong cả cộng đồng lập trình viên và doanh nghiệp.',
                'slug' => 'tang-truong-python-ngon-ngu-lap-trinh',
                'image_path' => 'img/news/ns-6.jpg',
                 'category_id' =>$categories->random()->id,
                'user_id' =>$users->random()->id,
    
            ],
    
        ];
      
        foreach ($posts as $post) {
            Post::updateOrCreate(
                [
                    'title' => $post['title'],
                ],
                $post
            );
        }
    }
}
