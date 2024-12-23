<?php
// Import file cấu hình
require_once 'config.php';

// Câu lệnh SQL lấy dữ liệu từ bảng SinhVien
$sql = "SELECT" .
    " MaSinhVien" .
    ", HoTen" .
    ", GioiTinh" .
    ", NgaySinh" .
    ", LopHoc" .
    ", DiaChi" .
    ", DiemTrungBinh" .
    " FROM SinhVien";

$result = $conn->query($sql);


// Kiểm tra và hiển thị dữ liệu
if ($result->num_rows > 0) {
    echo "<h2>Danh Sách Sinh Viên</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Mã Sinh Viên</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Lớp Học</th>
            <th>Địa Chỉ</th>
            <th>Điểm Trung Bình</th>
          </tr>";

    // Duyệt từng hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["MaSinhVien"] . "</td>
                <td>" . $row["HoTen"] . "</td>
                <td>" . $row["GioiTinh"] . "</td>
                <td>" . $row["NgaySinh"] . "</td>
                <td>" . $row["LopHoc"] . "</td>
                <td>" . $row["DiaChi"] . "</td>
                <td>" . $row["DiemTrungBinh"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Không có sinh viên nào.";
}

// Đóng kết nối
$conn->close();
