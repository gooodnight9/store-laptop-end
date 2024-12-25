<!DOCTYPE html>
<html lang="vi" xmlns="⁦http://www.w3.org/1999/html⁩">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="/css/user/SanPham.css">
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

        <div class="account dropdown">
            <button id="button-account" class="dropdown-toggle">
                <img src="/images/anhdaidin.png" alt="Tài khoản" />
            </button>
            <span>Tài khoản</span>
            <ul class="dropdown-menu">
                <li><button onclick="window.location.href='/dnkh'">Đăng nhập</button></li>
                <li><button onclick="window.location.href='/dkkh'">Đăng ký</button></li>
                <li><button>Đăng xuất</button></li>
            </ul>
        </div>
        <script>
            // Thêm/xóa lớp 'show' khi nhấn vào biểu tượng tài khoản
            document.getElementById("button-account").addEventListener("click", function(event) {
                event.stopPropagation(); // Ngăn chặn sự kiện lan ra ngoài
                const accountDropdown = this.closest(".dropdown");
                accountDropdown.classList.toggle("show");
            });

            // Đóng dropdown khi nhấn ra ngoài
            document.addEventListener("click", function() {
                const dropdowns = document.querySelectorAll(".dropdown");
                dropdowns.forEach((dropdown) => dropdown.classList.remove("show"));
            });
        </script>
    </header>

    <div class="breadcrumb">
        <span>Menu</span> > <strong>Laptop</strong>
    </div>

    <main>
        <section class="container">
            <div class="content-box">
                <aside class="filters">
                    <div class="filter-group">
                        <h3>Khoảng giá</h3>
                        <input type="text" name="" id=""> -
                        <input type="text" name="" id="">
                    </div>

                    <div class="filter-group">
                        <h3>Thương hiệu</h3>
                        <ul>
                            <li><input type="checkbox"> ASUS</li>
                            <li><input type="checkbox"> Acer</li>
                            <li><input type="checkbox"> Dell</li>
                            <li><input type="checkbox"> Lenovo</li>
                            <li class="more"><a href="#">Xem thêm</a></li>
                        </ul>

                        <h3>Series Laptop</h3>
                        <ul>
                            <li><input type="checkbox"> 14/15 Series</li>
                            <li><input type="checkbox"> Aorus</li>
                            <li><input type="checkbox"> Aspire</li>
                            <li class="more"><a href="#">Xem thêm</a></li>
                        </ul>

                        <h4>Series CPU</h4>
                        <ul>
                            <li><input type="checkbox"> Core 5</li>
                            <li><input type="checkbox"> Core 7</li>
                            <li class="more"><a href="#">Xem thêm</a></li>
                        </ul>

                        <h3>Nhu cầu</h3>
                        <ul>
                            <li><input type="checkbox"> Văn phòng</li>
                            <li><input type="checkbox"> Gaming</li>
                            <li><input type="checkbox"> Học sinh, sinh viên</li>
                            <li><input type="checkbox"> Đồ họa</li>
                            <li class="more"><a href="#">Xem thêm</a></li>
                        </ul>

                        <h4>Kích thước</h4>
                        <ul>
                            <li><input type="checkbox"> 13.3"</li>
                            <li><input type="checkbox"> 13.4"</li>
                            <li><input type="checkbox"> 15.6"</li>
                            <li class="more"><a href="#">Xem thêm</a></li>
                        </ul>
                    </div>
                </aside>


                <section class="product-grid">
                    <!-- Placeholder for product cards -->
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                    <div class="product-item"></div>
                </section>
            </div>
        </section>
        <div class="pagination">
            <button class="prev" disabled>&lt;</button>
            <button class="page-number active">1</button>
            <button class="page-number">2</button>
            <button class="page-number">3</button>
            <button class="page-number">4</button>
            <button class="page-number">5</button>
            <button class="page-number">6</button>
            <button class="next">&gt;</button>
        </div>
        <script>
            const pagination = document.querySelector('.pagination');
            const pageNumbers = pagination.querySelectorAll('.page-number');

            pageNumbers.forEach(page => {
                page.addEventListener('click', () => {
                    // Xóa lớp active khỏi tất cả các nút
                    pageNumbers.forEach(p => p.classList.remove('active'));
                    // Thêm lớp active vào nút được nhấn
                    page.classList.add('active');
                });
            });
        </script>


        <!-- FAQ Section -->
        <section class="faq-news">
            <div class="faq">
                <h2>CÂU HỎI THƯỜNG GẶP</h2>
                <div class="faq-item">abc <span>&gt;</span></div>
                <div class="faq-item">abc <span>&gt;</span></div>
                <div class="faq-item">abc <span>&gt;</span></div>
                <div class="faq-item">abc <span>&gt;</span></div>
            </div>
            <div class="news">
                <h2>Tin tức về sản phẩm</h2>
                <div class="news-placeholder"></div>
            </div>
        </section>

        <section class="q-and-a">
            <h2>Hỏi và đáp</h2>
            <div class="qa-placeholder"></div>
        </section>
    </main>

    <footer>
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
                    <img src="/images/cachthucthanhtoan.png" alt="Payment" class="payment-image" />
                </p>
            </div>
        </div>

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