<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thanh Toán</title>
    <link rel="stylesheet" href="/css/user/ThanhToanTong.css">
    <style>
        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }
    </style>
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
        <span>Trang chủ > <strong>Thanh toán</strong></span>
    </div>

    <script>
        // Hàm để lấy giá trị cookie
        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null; // Trả về giá trị cookie hoặc null nếu không tìm thấy
        }

        const yourToken = getCookie('auth_token'); // Lấy token từ cookie


        if (!yourToken) {
            alert('Không tìm thấy token đăng nhập!');
            console.log('Không có token. Đăng xuất không thành công.');
        }

        // Gọi API để lấy thông tin người dùng
        fetch(`http://localhost:8000/api/nhanvien`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${yourToken}`, // Thêm token vào header
                }
            })
            .then(response => response.json())
            .then(data => {


                // Điền dữ liệu vào các trường trong form
                document.getElementById("name").value = data.hovaten || ''; // Họ tên
                document.getElementById("name-store").value = data.hovaten || ''; // Họ tên
                document.getElementById("email").value = data.email || ''; // Email
                // Khóa không cho nhập trường email
                document.getElementById("email").disabled = true; // Hoặc dùng readonly nếu muốn cho phép sao chép dữ liệu

                // Khóa không cho nhập trường name
                document.getElementById("name").disabled = true; // Hoặc dùng readonly nếu muốn cho phép sao chép dữ liệu
                document.getElementById("name-store").disabled = true;

                console.log('Dữ liệu đã được điền vào form:', data);
            })
            .catch(error => {
                console.error("Lỗi khi lấy dữ liệu:", error);
            });

        // Gọi hàm khi trang được tải
        document.addEventListener("DOMContentLoaded", function() {});
    </script>

    <div class="container">
        <div class="tabs">
            <button id="tab-home">Nhận hàng tại nhà</button>
            <button id="tab-store">Nhận hàng tại điểm</button>
        </div>

        <div id="home-form" class="form-section active">
            <h2>Thông tin nhận hàng tại nhà</h2>
            <form>
                <div class="form-group">
                    <label for="name" aria-disabled="true">Họ tên *</label>
                    <input type="text" id="name" placeholder="Vui lòng nhập tên người nhận" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại *</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ cụ thể *</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ cụ thể" required>
                </div>
                <div class="form-group method-payment">
                    <h2>Phương thức thanh toán</h2>
                    <div class="payment-options">
                        <div class="payment-method">
                            <button id="vnpay-payment">
                                <img src="/images/vnpay-logo.jpg" alt="VNPAY">
                                <span>VNPAY</span>
                            </button>
                            <script>
                                const vnpaypayment = document.getElementById('vnpay-payment');

                                // Lắng nghe sự kiện khi người dùng click vào nút thanh toán
                                vnpaypayment.addEventListener('click', function(event) {
                                    event.preventDefault(); // Ngừng hành động mặc định

                                    // Tạo đối tượng FormData và thêm dữ liệu
                                    const formData = new FormData();
                                    formData.append('amount', 200000);

                                    fetch('http://localhost:8000/api/vnpay/create', {
                                            method: 'POST',
                                            body: formData,
                                        })
                                        .then(response => response.text())
                                        .then(data => {
                                            if (data.startsWith('http')) {
                                                console.log('Server trả về URL:', data);
                                                window.location.href = data; // Chuyển hướng người dùng đến URL
                                            } else {
                                                try {
                                                    const jsonData = JSON.parse(data); // Phân tích JSON nếu có thể
                                                    console.log('Parsed JSON:', jsonData);
                                                } catch (error) {
                                                    console.error('Phản hồi không hợp lệ:', data);
                                                }
                                            }
                                        })
                                        .catch(error => console.error('Lỗi khi gửi yêu cầu:', error));
                                });
                            </script>


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

        <div id="store-form" class="form-section">
            <h2>Thông tin nhận hàng tại điểm</h2>
            <form>
                <div class="form-group">
                    <label for="area">Khu vực *</label>
                    <select id="area" required>
                        <option value="">Chọn khu vực</option>
                        <option value="HCM">Thành phố Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name-store">Họ tên *</label>
                    <input type="text" id="name-store" placeholder="Vui lòng nhập tên người nhận" required>
                </div>
                <div class="form-group">
                    <label for="phone-store">Số điện thoại *</label>
                    <input type="text" id="phone-store" placeholder="Nhập số điện thoại" required>
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
    </div>
    <script>
        const tabHome = document.getElementById('tab-home');
        const tabStore = document.getElementById('tab-store');

        tabHome.addEventListener('click', () => {
            homeForm.classList.add('active');
            storeForm.classList.remove('active');
        });

        tabStore.addEventListener('click', () => {
            storeForm.classList.add('active');
            homeForm.classList.remove('active');
        });
    </script>
    <br>
    <div class="container1">
        <div class="sidebar">
            <div class="order-summary">
                <h3>THANH TOÁN</h3>
                <p>Tổng tạm tính: <b id="total">0₫</b></p>
                <p>Phí vận chuyển: <b>Miễn phí</b></p>
                <p>Thành tiền: <b id="total-price">0₫</b></p>
                <script>
                    // Lấy giá trị từ localStorage
                    const totalAmount = localStorage.getItem('totalAmount') || '0'; // Dự phòng nếu không có giá trị
                    const totalPrice = localStorage.getItem('totalPrice') || '0'; // Dự phòng nếu không có giá trị

                    // Đảm bảo giá trị là một số và định dạng lại nếu cần
                    const formattedTotalAmount = parseFloat(totalAmount).toLocaleString();
                    const formattedTotalPrice = parseFloat(totalPrice).toLocaleString();

                    // Gắn giá trị vào các phần tử HTML
                    document.getElementById('total').textContent = `${formattedTotalAmount}₫`;
                    document.getElementById('total-price').textContent = `${formattedTotalPrice}₫`;
                </script>
            </div>
            <a href="#" class="btn">Thanh toán</a>
        </div>
    </div>
    <script>
        // Lấy phần tử button bằng ID
        const payCashButton = document.getElementById('pay-cash');
        const homeForm = document.getElementById('home-form'); // Đảm bảo homeForm đã được khai báo
        const storeForm = document.getElementById('store-form'); // Đảm bảo storeForm đã được khai báo

        // Lấy token từ cookie
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }


        // Kiểm tra nếu không có token
        if (!yourToken) {
            alert('Vui lòng đăng nhập để thực hiện chức năng này');
            window.location.href = '/dnkh'; // Đảm bảo đường dẫn hợp lệ
        }

        // Lắng nghe sự kiện khi người dùng click vào nút thanh toán
        payCashButton.addEventListener('click', function(event) {
            event.preventDefault(); // Ngừng hành động mặc định (ví dụ gửi form)

            // Tạo ngày đặt hàng hợp lệ
            const ngayDatHang = new Date().toISOString().split('T')[0]; // Lấy ngày hiện tại (yyyy-mm-dd)

            // Lấy giá trị từ các form
            const diaChiNhanHang = document.getElementById('address') ? document.getElementById('address').value : null;
            const soDienThoaiNhanHang = document.getElementById('phone') ? document.getElementById('phone').value : '';

            let trangThaiDonHang = "";
            let data = {};

            // Kiểm tra xem form nào đang được chọn để gửi dữ liệu tương ứng
            if (homeForm.classList.contains('active')) {
                trangThaiDonHang = "Đang tạo online";
                data = {
                    ngaydathang: ngayDatHang,
                    diachi: diaChiNhanHang,
                    sodienthoai: soDienThoaiNhanHang,
                    trangthai: trangThaiDonHang
                };
            } else if (storeForm.classList.contains('active')) {
                trangThaiDonHang = "Đơn hàng đang chờ tại cửa hàng";
                data = {
                    ngaydathang: ngayDatHang,
                    sodienthoainhanhang: soDienThoaiNhanHang,
                    trangthaidonhang: trangThaiDonHang
                };
            }

            console.log("Dữ liệu sẽ gửi đến API:", JSON.stringify(data, null, 2));

            // Gửi yêu cầu POST đến API
            fetch('http://localhost:8000/api/donhang/create', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${yourToken}` // Thêm token vào header
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json()) // Chuyển đổi response thành JSON
                .then(data => {
                    if (data) {
                        const donhangId = data.id; // Lấy mã đơn hàng từ API (giả sử API trả về đối tượng với ID là 'id')
                        console.log('Mã đơn hàng:', donhangId);
                        localStorage.setItem('donhang_id', donhangId);

                        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                        console.log("Sản phẩm trong giỏ hàng:", cartItems);

                        if (cartItems.length > 0) {
                            cartItems.forEach(item => {
                                const itemData = {
                                    madh: donhangId,
                                    masp: item.masp,
                                    soluong: item.soluong,
                                    mabh: item.mabh || null // Thêm voucher code nếu có
                                };

                                console.log("Dữ liệu cho CTDH:", JSON.stringify(itemData, null, 2));

                                fetch('http://localhost:8000/api/ctdh/create', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Authorization': `Bearer ${yourToken}`,
                                        },
                                        body: JSON.stringify(itemData),
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.message === 'CTDH được tạo thành công.') {
                                            console.log('CTDH được tạo thành công cho sản phẩm: ', item.tensanpham);
                                        } else {
                                            console.error('Lỗi khi tạo CTDH cho sản phẩm: ', item.tensanpham);
                                        }
                                    })
                                    .catch(error => console.error('Lỗi khi gửi yêu cầu:', error));
                            });

                            alert('Tạo đơn hàng thành công');
                            window.location.href = '/product-detail'; // Chuyển đến trang chi tiết sản phẩm
                        } else {
                            console.log('Giỏ hàng trống');
                        }
                    } else {
                        console.error('API trả về dữ liệu không hợp lệ.');
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi gửi yêu cầu:', error);
                });
        });
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