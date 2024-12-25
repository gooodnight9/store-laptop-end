<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="/css/user/Thongtintaikhoan1.css">
</head>

<body>
    <header class="home-page">
        <!-- Nút menu (ẩn thanh menu) -->
        <div class="menu-toggle">
            <button id="button-menu">
                <img src="/images/menu.png" alt="Menu" />
            </button>
        </div>

        <div class="logo">
            <img src="/images/logo3.png" alt="Logo" />
        </div>

        <div class="search-bar">
            <input type="text" id="search-bar-input" placeholder="Tìm kiếm sản phẩm..." />
            <button class="search-btn">
                <img src="/images/timkiem.png" alt="Tìm kiếm" />
            </button>
        </div>

        <!-- Thanh menu ẩn -->
        <div class="side-menu">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>

        <script>
            // Lấy phần tử menu và nút menu
            const buttonMenu = document.getElementById("button-menu");
            const sideMenu = document.querySelector(".side-menu");

            // Xử lý sự kiện click vào nút menu
            buttonMenu.addEventListener("click", () => {
                sideMenu.classList.toggle("active"); // Thêm hoặc xóa lớp "active"
            });
        </script>

        <div class="hotline">
            <img src="/images/daulau.png" alt="Hotline" />
            <span>Hotline: 1900 1555</span>
        </div>

        <div class="favorites">
            <img src="/images/taitym.png" alt="Yêu thích" />
            <span>Danh sách yêu thích (0)</span>
        </div>

        <div class="cart">
            <button id="button-cart">
                <img src="/images/giohang.png" alt="Giỏ hàng" />
            </button>
            <span>Giỏ hàng</span>
        </div>
        <!-- <script>
            document.getElementById('button-cart').addEventListener('click', function() {
                window.location.href = '{{ route("order.cancel") }}'; // Chuyển hướng đến route xác nhận hủy đơn
            });
        </script> -->
        <div class="account">
            <button id="button-account">
                <img src="/images/anhdaidin.png" alt="Tài khoản" />
            </button>
            <span>Tài khoản</span>
        </div>
    </header>
    <div class="breadcrumb">
        <span>Trang chủ</span> > <span>Tài khoản</span> > <strong>Thông tin tài khoản</strong>
    </div>
    <main>
        <div class="profile-container">
            <aside class="sidebar">
                <div class="avatar">
                    <div class="avatar-image"></div>
                    <p>Nguyễn Văn A</p>
                </div>
                <nav class="menu">
                    <a href="#" class="active">Thông tin tài khoản</a>
                    <a href="#">Đơn mua</a>
                    <a href="#">Thông báo</a>
                    <a href="#">Hỗ trợ</a>
                </nav>
            </aside>
            <main class="main-content">
                <h1>Thông tin tài khoản</h1>
                <form class="account-form">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" id="name" value="Nguyễn Văn A" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <input type="email" id="email" value="example@gmail.com" disabled>
                            <a href="#">Thay đổi</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <div class="input-group">
                            <input type="text" id="phone" value="0123456789" disabled>
                            <a href="#">Thay đổi</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <div class="radio-group">
                            <label><input type="radio" name="gender" checked> Nam</label>
                            <label><input type="radio" name="gender"> Nữ</label>
                            <label><input type="radio" name="gender"> Khác</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ngày sinh</label>
                        <div class="input-group">
                            <input type="text" id="birthday" value="01/01/1990" disabled>
                            <a href="#">Thay đổi</a>
                        </div>
                    </div>
                    <button type="submit" class="save-button">LƯU</button>
                </form>
            </main>
        </div>
    </main>

    <footer>
        <!-- Footer chính -->
        <div class="footer-container">
            <div class="footer-section">
                <h4>VỀ NOVALAP</h4>
                <ul>
                    <li>Giới thiệu</li>
                    <li>Tuyển dụng</li>
                    <li>Hệ thống cửa hàng</li>
                    <li>Trung tâm bảo hành</li>
                    <li>Hỏi đáp</li>
                    <li>Tin công nghệ</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>CHÍNH SÁCH</h4>
                <ul>
                    <li>Chính sách bảo hành</li>
                    <li>Chính sách thanh toán</li>
                    <li>Chính sách giao hàng</li>
                    <li>Chính sách đổi trả</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>TỔNG ĐÀI HỖ TRỢ</h4>
                <ul>
                    <li>Mua hàng: 1900 1234</li>
                    <li>Khiếu nại: 1900 1256</li>
                    <li>Bảo hành: 1900 1278</li>
                    <li>Chăm sóc: 1900 1280</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>ĐƠN VỊ VẬN CHUYỂN</h4>
                <p>
                    <img src="/images/donvivanchuyen.png" alt="Shipping" class="shipping-image" />
                </p>
                <h4>CÁCH THỨC THANH TOÁN</h4>
                <p>
                    <img src="/images/cachthucthanhtoan.png" alt="Payment" class="shipping-image1" />
                </p>
            </div>
        </div>

        <!-- Khung thông tin công ty -->
        <div class="company-info">
            <div class="left-section">
                <h4>CÔNG TY CỔ PHẦN THƯƠNG MẠI - DỊCH VỤ NOVALAP</h4>
                <p>© 1997 - 2000 Công ty Cổ phần Thương Mại - Dịch Vụ NovaLap</p>
                <p>Giấy chứng nhận đăng ký doanh nghiệp: 0123456781 do Sở KH-ĐT TP.HCM cấp lần đầu ngày 30 tháng 8 năm 2024.</p>
                <p>Website NovaLap.vn thuộc quyền sở hữu của Công ty Thương Mại - Dịch Vụ NovaLap và được phát triển bởi Teko.</p>
            </div>
            <div class="right-section">
                <h4>LIÊN HỆ</h4>
                <p><strong>Địa chỉ:</strong> Đường Hàn Thuyên, Khu phố 6, Phường Linh Trung, Thủ Đức, Hồ Chí Minh</p>
                <p><strong>Điện thoại:</strong> 0331234567</p>
                <p><strong>Email:</strong> cskh@novalap.com</p>
            </div>
        </div>
    </footer>
</body>

</html>