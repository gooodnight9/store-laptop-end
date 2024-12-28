<?php

namespace  App\Business\SanPhamBiz;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Sql Nhan Vien Business
 * 
 */
class SqlSanPham
{

    public function createSanPham(Request $request)
    {
        // Lấy thông tin từ request
        $data = $request->input('data');

        // Kiểm tra nếu $data là chuỗi JSON và giải mã chuỗi JSON
        if (is_string($data)) {
            // Giải mã JSON thành mảng
            $data = json_decode($data, true);

            // Kiểm tra nếu giải mã JSON thất bại
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error("Invalid JSON format: " . json_last_error_msg());
                return response()->json(['error' => 'Invalid JSON format'], 400); // Trả về lỗi 400 nếu không phải JSON hợp lệ
            }
        }

        // Kiểm tra nếu $data là mảng
        if (!is_array($data)) {
            Log::error("Invalid data format: Expected array, got " . gettype($data));
            return response()->json(['error' => 'Invalid data format'], 400); // Trả về lỗi 400 nếu không phải là mảng
        }

        // Loại bỏ các giá trị null để tránh lỗi SQL
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        // Kiểm tra nếu mảng filteredData không có dữ liệu sau khi loại bỏ null
        if (empty($filteredData)) {
            Log::error("No valid data after filtering null values");
            return response()->json(['error' => 'No valid data provided'], 400); // Trả về lỗi 400 nếu không có dữ liệu hợp lệ
        }

        // Tạo danh sách cột và giá trị cho câu lệnh SQL
        $columns = implode(', ', array_keys($filteredData));
        $placeholders = implode(', ', array_map(fn($key) => ":$key", array_keys($filteredData)));

        // Câu lệnh SQL
        $query = "INSERT INTO sanpham ($columns) VALUES ($placeholders)";

        // Thực thi câu lệnh SQL
        try {
            DB::insert($query, $filteredData);
            // Lấy ID của bản ghi vừa thêm vào
            $lastInsertId = DB::getPdo()->lastInsertId();

            // Trả về ID của sản phẩm mới tạo
            return response()->json(['id' => $lastInsertId], 201); // Trả về mã 201 khi tạo thành công
        } catch (\Exception $e) {
            Log::error("Error creating product: " . $e->getMessage()); // Ghi log nếu xảy ra lỗi
            // Trả về mã lỗi 500 cùng với thông tin chi tiết lỗi
            return response()->json([
                'error' => 'Error creating product',
                'message' => $e->getMessage()
            ], 500);
        }
    }



    //Get All NhanVien
    public function getAllSanPham(Request $request): array
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 12);

        // Tính toán offset dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;

        // Lấy các tham số lọc từ request
        $tensanpham = $request->input('tensanpham', '%');
        $company = $request->input('company', '%'); // Mặc định là tìm tất cả
        $typename = $request->input('typename', '%');
        $cpu = $request->input('cpu', '%');
        $ram = $request->input('ram', '%');
        $minPrice = $request->input('minPrice', 0); // Mặc định giá tối thiểu là 0
        $maxPrice = $request->input('maxPrice', PHP_INT_MAX); // Giá tối đa không giới hạn
        $inches = $request->input('inches', 0.0);
        // Query
        $query =
            "SELECT * " .
            "FROM sanpham s " .
            "JOIN hinhanh_sanpham h ON s.masp = h.masp " .
            "WHERE LOWER(Commpany) LIKE CONCAT('%', LOWER(:company), '%') " .
            "AND LOWER(typename) LIKE CONCAT('%', LOWER(:typename), '%') " .
            "AND LOWER(tensanpham) LIKE CONCAT('%', LOWER(:tensanpham), '%') " .
            "AND LOWER(cpu) LIKE CONCAT('%', LOWER(:cpu), '%') " .
            "AND LOWER(ram) LIKE CONCAT('%', LOWER(:ram), '%') " .
            "AND inches >= :inches " .
            "AND giaban BETWEEN :minPrice AND :maxPrice " .
            "ORDER BY giaban " .
            "LIMIT :offset, :perPage";

        // Thực thi câu lệnh SQL với các tham số
        $SanPhams = DB::select($query, [
            'company' => $company,
            'typename' => $typename,
            'cpu' => $cpu,
            'ram' => $ram,
            'inches' => $inches,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'offset' => $offset,
            'perPage' => $perPage,
            'tensanpham' => $tensanpham,
        ]);

        return $SanPhams;
    }

    // Cập nhật thông tin sản phẩm
    public function updateSanPham(Request $request, $masp): bool
    {
        // Lấy thông tin cần cập nhật từ request
        $data = [
            'tensanpham' => $request->input('tensanpham'),
            'Commpany' => $request->input('Commpany'),
            'typename' => $request->input('typename'),
            'inches' => $request->input('inches'),
            'sreenresolution' => $request->input('sreenresolution'),
            'cpu' => $request->input('cpu'),
            'ram' => $request->input('ram'),
            'memory' => $request->input('memory'),
            'gpu' => $request->input('gpu'),
            'Weight' => $request->input('Weight'),
            'giaban' => $request->input('giaban'),
            'mota' => $request->input('mota'),
            'makm' => $request->input('makm'),
        ];

        // Loại bỏ các giá trị null để tránh lỗi SQL
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        // Tạo câu lệnh SQL động
        $setClause = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($filteredData)));

        // Câu lệnh SQL
        $query = "UPDATE sanpham SET $setClause WHERE masp = :masp";

        // Thêm `masp` vào tham số
        $filteredData['masp'] = $masp;

        // Thực thi câu lệnh
        $affectedRows = DB::update($query, $filteredData);

        return $affectedRows > 0;
    }



    // Xóa sản phẩm theo mã sản phẩm
    public function deleteSanPham($masp): bool
    {
        // Câu lệnh SQL xóa sản phẩm
        $query = "DELETE FROM sanpham WHERE masp = :masp";

        // Thực thi câu lệnh SQL
        try {
            DB::delete($query, ['masp' => $masp]);
            return true; // Trả về true nếu xóa thành công
        } catch (\Exception $e) {
            Log::error("Error deleting product: " . $e->getMessage()); // Ghi log nếu xảy ra lỗi
            return false; // Trả về false nếu xảy ra lỗi
        }
    }

    public function getTopRatedSanPham(Request $request): array
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 5);

        // Tính toán offset dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;

        // Query
        $query =
            "SELECT s.Commpany, h.url_hinh " .
            "FROM sanpham s " .
            "LEFT JOIN danhgia d ON s.masp = d.masp " .
            "JOIN hinhanh_sanpham h ON s.masp = h.masp " .
            "GROUP BY s.masp, s.Commpany, h.url_hinh " .
            "ORDER BY AVG(d.diemdanhgia) DESC " .
            "LIMIT :offset, :perPage ";

        // Thực thi câu lệnh SQL với các tham số
        $TopRatedSanPhams = DB::select($query, [
            'offset' => $offset,
            'perPage' => $perPage,
        ]);

        return $TopRatedSanPhams;
    }


    public function getTopPromoSanPham(Request $request): array
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 5);

        // Tính toán offset dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;

        // Query
        $query =
            "SELECT s.Commpany, h.url_hinh " .
            "FROM sanpham s " .
            "JOIN hinhanh_sanpham h ON s.masp = h.masp " .
            "ORDER BY makm DESC " .
            "LIMIT :offset, :perPage ";

        // Thực thi câu lệnh SQL với các tham số
        $TopRatedSanPhams = DB::select($query, [
            'offset' => $offset,
            'perPage' => $perPage,
        ]);

        return $TopRatedSanPhams;
    }


    public function getTopSalesSanPham(Request $request): array
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 5);

        // Tính toán offset dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;

        // Query
        $query =
            "SELECT s.Commpany, h.url_hinh " .
            "FROM sanpham s " .
            "JOIN hinhanh_sanpham h ON s.masp = h.masp " .
            "LEFT JOIN ctdh ON s.masp = ctdh.masp " .
            "GROUP BY s.masp, s.Commpany, h.url_hinh " .
            "ORDER BY SUM(ctdh.soluong) DESC " .
            "LIMIT :offset, :perPage ";

        // Thực thi câu lệnh SQL với các tham số
        $TopRatedSanPhams = DB::select($query, [
            'offset' => $offset,
            'perPage' => $perPage,
        ]);

        return $TopRatedSanPhams;
    }

    public function getSanPham(Request $request)
    {
        $masp = $request->input('masp', 1);
        // Query
        $query =
            "SELECT * " .
            "FROM sanpham s " .
            "JOIN hinhanh_sanpham h ON s.masp = h.masp " .
            "LEFT JOIN khuyenmai km ON s.makm = km.makm " .
            "LEFT JOIN ctsp ct ON s.masp = ct.masp " .
            "WHERE s.masp = :masp;";

        $sanpham = DB::select($query, [
            'masp' => $masp,
        ]);
        if (!$sanpham) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }


        return $sanpham;
    }
}
