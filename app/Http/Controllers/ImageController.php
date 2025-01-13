<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'danh-xung' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif', // Giới hạn file ảnh
        ]);

        // Nhận dữ liệu từ request
        $danhXung = $request->input('danh-xung');
        $username = $request->input('username');
        $fullName = $danhXung . ' ' . $username;

        // Lưu file ảnh upload với tên duy nhất
        $uploadedFile = $request->file('img');
        $uniqueAvatarName = uniqid('avatar_') . '.' . $uploadedFile->getClientOriginalExtension();
        $avatarPath = public_path('images/' . $uniqueAvatarName);
        $uploadedFile->move(public_path('images'), $uniqueAvatarName);

        // Tạo ảnh nền và vẽ text + avatar
        $baseImagePath = public_path('images/thumoi.png');
        $outputPath = public_path('images/generated_thumoi.png');
        $fontPath = public_path('fonts/arial.ttf');

        $image = Image::make($baseImagePath);

        $avatar = Image::make($avatarPath);

        // 1. Resize chiều ngang về 300px, giữ tỉ lệ
        $avatar->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // 2. Crop chính giữa thành hình vuông 300x300
        $x = ($avatar->width() / 2) - (300 / 2);
        $y = ($avatar->height() / 2) - (300 / 2);
        $avatar->crop(300, 300, $x, $y);

        // 3. Tạo mặt nạ tròn để bo tròn avatar
        $mask = Image::canvas(300, 300);
        $mask->circle(300, 150, 150, function ($draw) {
            $draw->background('#fff');
        });
        $avatar->mask($mask, false);

        // 4. Chèn avatar đã bo tròn vào ảnh nền
        $image->insert($avatar, 'top-left', 0, 0); // Điều chỉnh tọa độ avatar

        // 5. Thêm text vào ảnh
        $image->text($fullName, $image->width() / 2, 160, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(40);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('top');
        });

        // 6. Lưu ảnh vào thư mục tạm
        $image->save($outputPath);

        // Xóa file avatar tạm
        @unlink($avatarPath);

        // Trả về view để hiển thị ảnh
        return view('show_image', ['imagePath' => asset('images/generated_thumoi.png')]);
    }


    // Phương thức tải ảnh
    public function download()
    {
        $outputPath = public_path('images/generated_thumoi.png');
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}

