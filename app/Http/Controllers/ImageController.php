<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\HinhanhSanpham;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function upload(Request $request, string $masp)
    {

        // Lấy file từ request
        $file = $request->file('image');

        // Tạo tên file ngẫu nhiên và thêm phần mở rộng
        $extension = $file->getClientOriginalExtension();
        Log::info("check file 1", ['extension' => $extension]);
        $filename = $masp . '.' . $extension;  // Thêm dấu chấm giữa mã sản phẩm bbvà phần mở rộng
        Log::info("check file 2", ['file name' => $filename]);

        // Upload file lên MinIO (S3 driver)
        try {


            Log::info('S3 Configuration', [
                'key' => config('filesystems.disks.minio.key'),
                'region' => config('filesystems.disks.minio.region'),
                'bucket' => config('filesystems.disks.minio.bucket'),
                'endpoint' => config('filesystems.disks.minio.endpoint'),
            ]);
            $result = Storage::disk('minio')->put($filename, file_get_contents($file));

            if ($result) {
                // Xây dựng URL của ảnh
                $url = 'http://localhost:9000' . '/image/' . $filename;
                Log::info("check file 3", ['URL' => $url]);
                return $url;
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Upload thất bại!', 'error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Upload thất bại!'], 500);
    }
}
