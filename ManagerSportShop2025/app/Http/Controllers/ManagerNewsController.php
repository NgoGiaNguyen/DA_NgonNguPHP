<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

 class ManagerNewsController extends Controller{
        public function listNew(){
            $news = news::paginate(5);// để truy xuất tất cả các bản ghi từ bảng news trong cơ sở dữ liệu và phân trang kết quả, mỗi trang hiển thị 5 bản ghi, tại một thời điểm nếu nhiều hơn 5 bản ghi nó sẽ hiển thị ở trang khác
            return view('page.manager_news',compact('news'));// trả về biến view hiển thị lên giao diện cho trang tin tức
        }


        public function create(){ // tạo tin tức mới cho trang, này chỉ là biểu mẫu cho việc tạo tin tức
            return view('page.manager_news_create');
        }

        public function store(Request $req){
            $req -> validate([ // Xác thức dữ liệu đầu vào từ yêu cầu HTTP theo các quy tắc cụ thể. Nó đảm bảo dữ liệu là hợp lệ và tránh lỗi khi xử lý các yêu cầu không đúng chuẩn
                'title' => 'nullable|string', // khai báo dữ liệu có thể để trống hoặc dùng kiểu chữ
                'content' => 'nullable|string', // khai báo dữ liệu có thể để trống hoặc dùng kiểu chữ
                'image' => 'nullable|string|max:2048' // khai báo dữ liệu có thể để trống hoặc dùng kiểu chữ và giới hạn từ là 2048 từ
            ]);


            $new = new news(); // tạo một đối tượng news mới
            $new->title = $req->title;// người dùng sẽ nhập giá trị vào và gửi Laravel sẽ nhận yêu cầu đó thông qua đối tượng $req. Gán giá trị từ yêu cầu http ( biến req ) vào thuộc tính title của đối tượng new
            $new->content = $req->content;
            $new->image = $req->image;
            $new->save(); // Lưu đối tượng news mới vào cơ sở dữ liệu

            return redirect()->route('manager_news')->with('success', 'Thêm tin tức mới thành công!');// Điều hướng người dùng về trang danh sách tin tức và kèm theo thông báo thành công
            
        }

        public function edit($id){ 
            $new = news::findOrFail($id);// truy xuất tin tức theo ID, nếu không tìm thấy id đó sẽ tự động trả về 404
            return view('page.manager_news_edit', compact('new'));// trả về biến view và truyền biến news vào view để hiển thị tin tức cần chỉnh sửa

        }

        public function update(Request $req,$id){ // nó giống với phương thức store nhưng ở đây nó là cập nhật một bản ghi có sẵn trong cơ sở dữ liệu theo id, thay vì phải tạo mới
            
            $req -> validate([
                'title' => 'nullable|string',
                'content' => 'nullable|string',
                'image' => 'nullable|string|max:2048' 
            ]);
            $new = news::findOrFail($id);// truy xuất đối tượng news từ cơ sở dữ liệu dựa trên id 
            $new->title = $req->title;
            $new->content = $req->content;
            $new->image = $req->image;
            $new->save();// lưu các thay đổi đó vào cơ sở dữ liệu

           return redirect()->route('manager_news')->with('success', 'Cập nhật tin tức mới thành công!');// điều hướng người dùng về trang danh sách và thông báo là cập nhật tin tức thành công

        }


        public function destroy($id){ // Xóa tin tức
            $new = news::findOrFail($id);// truy xuất tin tức theo id, nếu không có id đó nó sẽ lỗi 
            $new-> delete();// xóa bản ghi đó ra khỏi cơ sở dữ liệu
            return redirect()->route('manager_news')->with('success', 'xóa tin tức thành công!');// điều hướng người dùng về danh sách tin tức và hiển thị thông báo xóa thành công

        }


        
 }