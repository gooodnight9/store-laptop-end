<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" href="/css/user/DNKH.css">
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngừng hành động mặc định của form

        // Lấy giá trị của email và mật khẩu từ các trường nhập
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Gửi yêu cầu POST đến API login
        fetch('http://localhost:8000/api/login', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              email: email,
              password: password
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.message === 'Mã OTP đã được gửi đến email của bạn (khách hàng)') {
              localStorage.setItem('email', email);
              localStorage.setItem('password', password);
              window.location.href = '/maotp';
            } else {
              // Hiển thị thông báo lỗi nếu đăng nhập thất bại
              const errorMessage = document.getElementById('error-message');
              errorMessage.textContent = data.message;
              errorMessage.style.display = 'block';
            }
          })
          .catch(error => {
            console.error('Error:', error);
            const errorMessage = document.getElementById('error-message');
            errorMessage.textContent = 'Đã có lỗi xảy ra. Vui lòng thử lại.';
            errorMessage.style.display = 'block';
          });
      });
    });
  </script>

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
    <span>Trang chủ</span> > <span>Tài khoản</span> > <strong>Đăng nhập</strong>
  </div>
  <main>
    <div class="register-container">
      <div class="form-section">
        <h2>Đăng nhập</h2>
        <div class="underline"></div>
        <form id="login-form">
          <input type="email" id="email" placeholder="Email" required>
          <input type="password" id="password" placeholder="Mật khẩu" required>
          <button type="submit">ĐĂNG NHẬP</button>
        </form>

        <!-- Phần OTP (ẩn ban đầu) -->
        <div id="otp-section" style="display: none;">
          <h2>Xác minh OTP</h2>
          <p>Vui lòng nhập mã OTP gồm 6 chữ số được gửi đến số điện thoại của bạn.</p>
          <div class="otp-input-group">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
          </div>
          <button class="btn">Xác nhận</button>
          <a class="resend-link" href="#">Gửi lại mã OTP</a>
        </div>

        <p style="font-style: italic; font-weight: lighter;">Hoặc đăng nhập qua:</p>
        <div class="social-login">
          <button class="facebook">Facebook</button>
          <button class="google">Google</button>
        </div>
      </div>
      <div class="benefits-section">
        <h2>Quyền lợi đăng nhập</h2>
        <div class="underline"></div>
        <p class="benefits-text">Bằng việc tạo tài khoản bạn có thể mua sắm nhanh hơn, theo dõi trạng thái đơn hàng, và theo dõi đơn hàng mà bạn đã đặt.</p>
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