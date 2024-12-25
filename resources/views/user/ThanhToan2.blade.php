<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thanh Toán</title>
    <link rel="stylesheet" href="/css/user/ThanhToan2.css">

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

        <div class="account">
            <button id="button-account">
                <img src="/images/anhdaidin.png" alt="Tài khoản" />
            </button>
            <span>Tài khoản</span>
        </div>

    </header>
    <div class="breadcrumb">
        <span>Trang chủ > <strong>Thanh toán</strong>
    </div>

    <div class="container">
        <div class="main-content">
            <div class="tabs">
                <button class="active1">Nhận hàng tại nhà</button>
                <button class="active2">Nhận hàng tại điểm</button>
            </div>
            <div class="form-section">
            <h3>Chọn khu vực nhận hàng</h3>
            <div class="form-group">
                <label for="area">Khu vực</label>
                <select id="area">
                    <option>Thành phố Hồ Chí Minh</option>
                </select>
            </div>
        </div>

            <h2>Thông tin nhận hàng</h2>
            <form>
                <div class="form-group">
                    <label for="name">Họ tên *</label>
                    <input type="text" id="name" placeholder="Vui lòng nhập tên người nhận" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại *</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="notes">Ghi chú cho đơn hàng</label>
                    <textarea id="notes" placeholder="Vui lòng nhập ghi chú"></textarea>
                </div>
                <div class="form-group method-payment">
                    <h2>Phương thức thanh toán</h2>
                    <div class="payment-options">
                        <div class="payment-method">
                            <button id="vnpay-payment">
                                <img src="/images/vnpay-logo.jpg" alt="VNPAY">
                                <span>VNPAY</span>
                            </button>
                        </div>
                        <div class="payment-method">
                            <button id="momo-payment">
                                <img src="/images/MOMO.jpg" alt="MOMO">
                                <span>MOMO</span>
                            </button>
                        </div>
                        <div class="payment-method">
                            <button id="pay-cash">
                                <span>Thanh toán tiền mặt</span>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div class="sidebar">
            <div class="order-summary">
                <h3>THANH TOÁN</h3>
                <p>Tổng tạm tính: <b>0₫</b></p>
                <p>Phí vận chuyển: <b>Miễn phí</b></p>
                <p>Thành tiền: <b>0₫</b></p>
            </div>

            <a href="#" class="btn">Thanh toán</a>
        </div>
    </div>
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
                <p>Website NovaLap.vn thuộc quyền sở hữu của Công ty Thương Mại - Dịch Vụ NovaLap và được phát triển bởi Teko.
                </p>
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