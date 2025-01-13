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
        $username = mb_strtoupper($request->input('username'));
        $fullName = $danhXung . ' ' . $username;

        // Lưu file ảnh upload với tên duy nhất
        $uploadedFile = $request->file('img');
        $uniqueId = uniqid(); // Tạo ID duy nhất
        $avatarPath = public_path("images/avatar_{$uniqueId}.png");
        $uploadedFile->move(public_path('images'), "avatar_{$uniqueId}.png");


        // Tạo ảnh nền và vẽ text + avatar
        $baseImagePath = public_path('images/thumoi-1.jpg');
        $outputPath = public_path("images/generated_thumoi_{$uniqueId}.png");
        $fontPath = public_path('fonts/Montserrat/static/Montserrat-Bold.ttf');

        $image = Image::make($baseImagePath);

        $avatar = Image::make($avatarPath);

        // 1. Resize chiều ngang về 300px, giữ tỉ lệ
        $avatar->fit(344, 344, function ($constraint) {
            $constraint->upsize();
        });

        // 2. Crop chính giữa thành hình vuông 300x300
        $x = (int)(($avatar->width() / 2) - (344 / 2));
        $y = (int)(($avatar->height() / 2) - (344 / 2));
        $avatar->crop(344, 344, $x, $y);


        // 3. Tạo mặt nạ tròn để bo tròn avatar
        $mask = Image::canvas(344, 344);
        $mask->circle(344, 172, 172, function ($draw) {
            $draw->background('#fff');
        });
        $avatar->mask($mask, false);

        // 4. Chèn avatar đã bo tròn vào ảnh nền
        $backgroundWidth = $image->width();
        $avatarWidth = $avatar->width();
        $x = ($backgroundWidth - $avatarWidth) / 2; // Căn giữa theo chiều ngang
        $y = 264; // Cách top 200px

        // Chèn avatar vào ảnh nền
        $image->insert($avatar, 'top-left', (int)$x, $y);


        // 5. Thêm text vào ảnh
        $image->text($fullName, $image->width() / 2, 160, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(50);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('top');
        });

        // 6. Lưu ảnh vào thư mục tạm
        $image->save($outputPath);

        // Xóa file avatar tạm
        @unlink($avatarPath);

        // Trả về view để hiển thị ảnh
        return view('show_image', ['imagePath' => asset("images/generated_thumoi_{$uniqueId}.png"), 'fileName' => "generated_thumoi_{$uniqueId}.png"]);

    }


    // Phương thức tải ảnh
    public function download(Request $request, $fileName)
    {
        $outputPath = public_path("images/{$fileName}");

        // Kiểm tra file có tồn tại không
        if (!file_exists($outputPath)) {
            abort(404, 'File không tồn tại!');
        }

        // Tải file và xóa sau khi gửi
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

}

