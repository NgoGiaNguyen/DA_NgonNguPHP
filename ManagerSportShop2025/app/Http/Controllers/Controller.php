<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;// Trait này cung cấp các phương thức để kiểm soát việc cấp quyền và phân quyền cho người dùng
use Illuminate\Foundation\Bus\DispatchesJobs;//Trait này cho phép bạn gửi các công việc (jobs) để thực thi dưới dạng các background jobs (công việc nền). thực hiện các tác vụ nặng (như xử lý file, gửi email) mà không làm gián đoạn trải nghiệm người dùng trên giao diện.
use Illuminate\Foundation\Validation\ValidatesRequests;// Trait này cung cấp các phương thức hỗ trợ xác thực (validation) dữ liệu từ các request HTTP.
use Illuminate\Routing\Controller as BaseController; //Class Controller trong Laravel đóng vai trò là cơ sở (base) cho tất cả các controller khác. Mọi controller đều kế thừa từ BaseController để có sẵn các chức năng mặc định của Laravel (như điều hướng request, tương tác với view,...)

class Controller extends BaseController //Class Controller trong Laravel đóng vai trò là cơ sở (base) cho tất cả các controller khác. Mọi controller đều kế thừa từ BaseController để có sẵn các chức năng mặc định của Laravel (như điều hướng request, tương tác với view,...)
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
// Các controller khác sẽ kế thừa từ lớp này để sử dụng lại những tính năng đó.
//Nó cung cấp các tính năng quan trọng như phân quyền, xử lý công việc nền, và xác thực dữ liệu cho tất cả các controller khác trong ứng dụng thông qua việc kế thừa class này.