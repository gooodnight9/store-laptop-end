<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Ký</title>
  <link rel="stylesheet" href="/css/user/DKKH.css">
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
        <li><a href="/trangchu">Trang chủ</a></li>
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
    <span>Trang chủ</span> > <span>Tài khoản</span> > <strong>Đăng ký</strong>
  </div>
  <main>
    <div class="register-container">
      <div class="form-section">
        <h2>Đăng ký</h2>
        <div class="underline"></div>
        <form action="#" method="POST" id="signupForm">
          <input type="text" placeholder="Họ & Tên đệm" id="fullName" required>
          <input type="text" id="dob" placeholder="Ngày sinh (dd/mm/yyyy)" oninput="convertDate(this)" required>

          <input type="tel" placeholder="Điện thoại" id="phone" required>
          <input type="email" placeholder="Email" id="email" required>
          <input type="password" placeholder="Mật khẩu" id="password" required>

          <script>
            function convertDate(input) {
              // Loại bỏ tất cả các ký tự không phải là số (bao gồm cả ký tự có dấu)
              let value = input.value.replace(/[^0-9]/g, '');

              if (value.length <= 2) {
                input.value = value; // Chỉ có ngày
              } else if (value.length <= 4) {
                input.value = value.slice(0, 2) + '/' + value.slice(2); // Thêm dấu '/' sau ngày
              } else if (value.length <= 6) {
                input.value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4); // Thêm dấu '/' sau tháng
              } else {
                input.value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8); // Thêm dấu '/' sau năm
              }

              // Kiểm tra định dạng dd/mm/yyyy
              const regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
              const match = input.value.match(regex);

              if (match) {
                // Nếu chuỗi đúng định dạng, chuyển sang yyyy/mm/dd
                const day = match[1];
                const month = match[2];
                const year = match[3];

                // Định dạng lại thành yyyy/mm/dd
                input.value = `${year}/${month}/${day}`;
              }

              // Xử lý gửi form và lấy dữ liệu dưới dạng JSON
              document.getElementById('signupForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Ngừng gửi form mặc định

                // Lấy dữ liệu từ form
                const formData = {
                  hovaten: document.getElementById('fullName').value,
                  ngaysinh: document.getElementById('dob').value,
                  sodienthoai: document.getElementById('phone').value,
                  email: document.getElementById('email').value,
                  password: document.getElementById('password').value
                };

                // Gửi dữ liệu dưới dạng JSON
                fetch('http://localhost:8000/api/registerKH', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                  })
                  .then(response => response.json())
                  .then(data => {
                    alert('Đăng ký thành công:', data);
                    window.location.href = '/dnkh';
                  })
                  .catch(error => {
                    alert('Lỗi khi đăng ký:', error);
                  });
              });
            }
          </script>
          <button type="submit">ĐĂNG KÝ</button>
        </form>
        <p style="font-style: italic; font-weight: lighter;">Hoặc đăng ký qua:</p>
        <div class="social-login">
          <button class="facebook">Facebook</button>
          <button class="google">Google</button>
        </div>
      </div>
      <div class="benefits-section">
        <h2>Quyền lợi đăng ký</h2>
        <div class="underline"></div>
        <p class="benefits-text">Bằng việc tạo tài khoản bạn có thể mua sắm nhanh hơn, theo dõi trạng thái đơn hàng, và
          theo dõi đơn hàng mà bạn đã đặt.</p>
      </div>
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