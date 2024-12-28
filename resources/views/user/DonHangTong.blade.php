<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng 2</title>
    <link rel="stylesheet" href="./css/user/DonHangTong.css">
</head>

<body>
    <header class="home-page">
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

    <!-- Sidebar and Main Content -->
    <div class="main-container">
        <aside class="sidebar">
            <img src="{{ asset('images/profile-placeholder.png') }}" alt="Profile">
            <ul>
                <li>
                    <span>Thông tin tài khoản</span>
                </li>
                <li class="active">
                    <span>Đơn mua</span>
                </li>
                <li>
                    <span>Thông báo</span>
                </li>
                <li>
                    <span>Hỗ trợ</span>
                </li>
            </ul>
        </aside>

        <main class="content">
            <div class="tabs">
                <div id="tab1" class="active" onclick="changeTab('tab1')">Chờ thanh toán</div>
                <div id="tab2" onclick="changeTab('tab2')">Vận chuyển</div>
                <div id="tab3" onclick="changeTab('tab3')">Chờ giao hàng</div>
                <div id="tab4" onclick="changeTab('tab4')">Hoàn thành</div>
                <div id="tab5" onclick="changeTab('tab5')">Đã hủy</div>
            </div>

            <!-- Nội dung Chờ thanh toán -->
            <div id="content1" class="order-list active">
                <div class="order-item">
                    <div class="product-row">
                        <div class="product-column">Sản phẩm</div>
                        <div class="product-info">Tên sản phẩm</div>
                        <div class="product-price">Giá</div>
                    </div>

                    <div class="order-actions">
                        <button>Liên hệ người bán</button>
                        <button>Hủy đơn hàng</button>
                    </div>
                </div>
            </div>

            <!-- Nội dung Vận chuyển -->
            <div id="content2" class="order-list">
                <div class="order-item">
                    <div class="product-row">
                        <div class="product-column">Sản phẩm</div>
                        <div class="product-info">Tên sản phẩm</div>
                        <div class="product-price">Giá</div>
                    </div>
                    <div style="margin-top: 50px;">
                        <span style="font-style: italic; color: gray; font-size:13px">Đơn hàng của bạn sẽ chuẩn bị và chuyển đi</span>
                    </div>

                    <div class="order-actions">
                        <button>Liên hệ người bán</button>
                        <button>Hủy đơn hàng</button>
                    </div>
                </div>
            </div>

            <!-- Nội dung Chờ giao hàng -->
            <div id="content3" class="order-list">
                <div class="order-item">
                    <div class="product-row">
                        <div class="product-column">Sản phẩm</div>
                        <div class="product-info">Tên sản phẩm</div>
                        <div class="product-price">Giá</div>
                    </div>
                    <div style="margin-top: 50px;">
                        <span style="font-style: italic; color: gray; font-size:13px">Vui lòng chỉ nhấn "Đã nhận hàng" khi đơn hàng đã được giao đến bạn và sản phẩm không có vấn đề gì</span>
                    </div>

                    <div class="order-actions">
                        <button>Đã nhận hàng</button>
                        <button>Xác nhận hủy</button>
                        <button>Liên hệ người bán</button>

                    </div>
                </div>
            </div>

            <!-- Nội dung Hoàn thành -->
            <div id="content4" class="order-list">
                <div class="order-item">
                    <div class="product-row">
                        <div class="product-column">Sản phẩm</div>
                        <div class="product-info">Tên sản phẩm</div>
                        <div class="product-price">Giá</div>
                    </div>
                    <div style="margin-top: 50px;">
                        <span style="font-style: italic; color: gray; font-size:13px">Vui lòng đánh giá sản phẩm</span>
                    </div>
                    <div class="order-actions">
                        <button>Đánh giá sản phầm</button>
                        <button>Yêu cầu trả hàng</button>
                        <button>Mua lại</button>
                    </div>
                </div>
            </div>

            <!-- Nội dung Đã hủy -->
            <div id="content5" class="order-list">
                <div class="order-item">
                    <div class="product-row">
                        <div class="product-column">Sản phẩm</div>
                        <div class="product-info">Tên sản phẩm</div>
                        <div class="product-price">Giá</div>
                    </div>
                    <div style="margin-top: 50px;">
                        <span style="font-style: italic; color: gray; font-size:13px">Đã hủy bởi bạn</span>
                    </div>
                    <div class="order-actions">
                        <button>Liên hệ người bán</button>
                        <button>Mua lại</button>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <footer></footer>

    <script>
        function changeTab(tabId) {
            // Tắt hết tất cả các tab và nội dung
            const tabs = document.querySelectorAll('.tabs div');
            const contents = document.querySelectorAll('.order-list');

            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));

            // Bật tab và nội dung được chọn
            document.getElementById(tabId).classList.add('active');
            const contentId = 'content' + tabId.charAt(3);
            document.getElementById(contentId).classList.add('active');
        }
    </script>
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