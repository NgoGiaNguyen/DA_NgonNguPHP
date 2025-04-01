<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // cho phép bạn sử dụng factories để tạo dữ liệu giả lập cho model trong quá trình phát triển hoặc kiểm thử.
use Illuminate\Database\Eloquent\Model;// Class slide sẽ kế thừa từ Model, cho phép bạn sử dụng các tính năng của Eloquent để tương tác với cơ sở dữ liệu, chẳng hạn như các thao tác CRUD

class news extends Model// Định nghĩa class news mở rộng (extends) từ class Model. Điều này có nghĩa là model news kế thừa tất cả các tính năng của Eloquent ORM, cho phép nó tương tác với bảng news trong cơ sở dữ liệu.
{
    protected $table = "news";// xác định tên trong bản mà cơ sở dữ liệu sẽ tương tác và chỉ định rõ là bảng cần tương tác là bảng news
    const CREATED_AT = 'create_at';// Ở đây, cột lưu thời gian tạo bản ghi trong bảng news là create_at, không phải created_at, nên cần khai báo để Laravel biết.
    const UPDATED_AT = 'update_at';//Ở đây, cột dùng để lưu thời gian cập nhật trong bảng news là update_at.
}
