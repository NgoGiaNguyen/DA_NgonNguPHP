<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;// sử dụng lớp Request của laravel để xử lý dữ liệu yêu cầu HTTP (FROM, dữ liệu yêu cầu người dùng gửi lên)
use App\Models\Slide;// đại diện cho bảng slide trong cơ sở dữ liệu

class ManagerSlideController extends Controller {// lớp này kế thừa từ lớp controller, tức là lớp này có thể sử dụng các phương thức, tính năng từ lớp controller. Lớp này quản lý các thao tác liên quan đến slide trong ứng dụng
    public function listSlide() {
        $slides = Slide::paginate(5); // để truy xuất tất cả các bản ghi từ bảng slides trong cơ sở dữ liệu và phân trang kết quả, mỗi trang hiển thị 5 bản ghi, tại một thời điểm nếu nhiều hơn 5 bản ghi nó sẽ hiển thị ở trang khác
        return view('page.manager_slides', compact('slides'));// trả về view, đồng thời nó sẽ truyền biến slides chứa danh sách các slide để hiển thị lên trang
     }

    public function create() {
        return view('page.manager_slide_create'); // phương thức này trả về view, nơi người dùng có thể thấy form để thêm slide mới
    }

    public function store(Request $request) {
        $request->validate([// xác thực dữ liệu người dùng gửi lên
            'image' => 'required|string|max:100', // Bắt buộc (required) phải là chuỗi string và không vượt quá 100 ký tự
            'link' => 'nullable|url',// không bắt buộc có thể để trống , phải là một URL hợp lệ
        ]);

        Slide::create([ // tạo một bản ghi mới trong bảng slides với các giá trị từ request
            'image' => $request->image,
            'link' => $request->link,
        ]);

        return redirect()->route('manager_slides')->with('success', 'Thêm slide thành công!');// sau khi lưu silde thành công thì chuyển hướng người dùng về trang danh sách slide và thông báo thành công
    }

    public function edit($id) { // phương thức chỉnh sửa
        $slide = Slide::findOrFail($id);// tìm một bản ghi trong slides dựa trên ID. nếu không tìm thấy sẽ trả về lỗi
        return view('page.manager_slide_edit', compact('slide'));// sẽ trả về biến view , đồng thời truyền dữ liệu của slide được tìm thấy để hiển thị trong from chỉnh sửa
    }

    public function update(Request $request, $id) {
        $request->validate([ // xác thực dữ liệu người dùng gửi lên
            'image' => 'required|string|max:100', // Bắt buộc (required) phải là chuỗi string và không vượt quá 100 ký tự
            'link' => 'nullable|url', // không bắt buộc có thể để trống , phải là một URL hợp lệ
        ]);

        $slide = Slide::findOrFail($id); // tìm bản ghi cập nhật theo id
        $slide->update([
            'image' => $request->image,//  Điều này có nghĩa là khi người dùng tải lên hoặc nhập dữ liệu hình ảnh trong form, dữ liệu đó sẽ được lấy từ yêu cầu và lưu vào trường image.
            'link' => $request->link,// Điều này có nghĩa là khi người dùng tải lên hoặc nhập địa chỉ URL trong form, dữ liệu đó sẽ được lấy từ yêu cầu và lưu vào trường link.
        ]);

        return redirect()->route('manager_slides')->with('success', 'Cập nhật slide thành công!');// chuyển hướng người dùng về trang danh sách và báo thành công
    }

    public function destroy($id) {
        $slide = Slide::findOrFail($id);// Tìm bản ghi cần xóa dựa theo ID
        $slide->delete();// XÓA BẢN GHI KHỎI CƠ SỞ DỮ LIỆU

        return redirect()->route('manager_slides')->with('success', 'Xóa slide thành công!');// Chuyển về danh sách slide và thông báo sau khi xóa thành công
    }
}
