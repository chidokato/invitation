<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    // Phương thức tạo ảnh và hiển thị trang view
    public function generate(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $username = $request->input('username');

        // Tạo ảnh
        $baseImagePath = public_path('images/thumoi.png');
        $fontPath = public_path('fonts/arial.ttf');
        $outputPath = public_path('images/generated_thumoi.png');

        $image = Image::make($baseImagePath);
        $image->text($username, $image->width() / 2, 170, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(40);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('top');
        });

        // Lưu ảnh vào thư mục tạm
        $image->save($outputPath);

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

