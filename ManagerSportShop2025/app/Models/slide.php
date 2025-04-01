<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;// cho phép bạn sử dụng factories để tạo dữ liệu giả lập cho model trong quá trình phát triển hoặc kiểm thử.
use Illuminate\Database\Eloquent\Model;// Class slide sẽ kế thừa từ Model, cho phép bạn sử dụng các tính năng của Eloquent để tương tác với cơ sở dữ liệu, chẳng hạn như các thao tác CRUD

class slide extends Model // Định nghĩa class slide mở rộng (extends) từ class Model. Class này đại diện cho bảng slide trong cơ sở dữ liệu và sẽ sử dụng các phương thức và thuộc tính của Eloquent để làm việc với bảng đó.
{
    protected $table = "slide";//Xác định bảng slide trong cơ sở dữ liệu mà model này sẽ tương tác. Nếu không khai báo, Laravel sẽ tự động suy ra tên bảng từ tên model theo quy tắc số nhiều (ví dụ: nếu model là Slide, bảng sẽ là slides). Tuy nhiên, vì bảng này tên là slide (số ít), nên cần phải khai báo cụ thể.
    public $timestamps = false; // Tắt tính năng tự động quản lý cột thời gian created_at và updated_at. Nếu không thì laravel sẽ tự động thêm và cập nhật hai cột này
    protected $fillable = [ // Khai báo thuộc tính $fillable, là một mảng bao gồm các trường được phép gán giá trị hàng loạt
        'image', //Ở đây, chỉ các trường image và link mới được phép gán dữ liệu khi bạn thực hiện thao tác tạo hoặc cập nhật dữ liệu thông qua các phương thức như create() hoặc update().
        'link', 
    ];
}
