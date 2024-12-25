<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông Tin Tài Khoản</title>
  <link rel="stylesheet" href="/css/user/ThongTinTaiKhoan.css">
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

    <div class="side-menu">
      <ul>
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ</a></li>
      </ul>
    </div>

    <script>
      const buttonMenu = document.getElementById("button-menu");
      const sideMenu = document.querySelector(".side-menu");
      buttonMenu.addEventListener("click", () => {
        sideMenu.classList.toggle("active");
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
    <span>Trang chủ</span> > <span>Tài khoản</span> > <strong>Thông Tin Tài Khoản</strong>
  </div>

  <main>
    <div class="account-container">
      <h2>Thông Tin Tài Khoản</h2>
      <div class="underline"></div>
      <form action="#" method="POST">
        <div class="form-group">
          <label for="full-name">Họ và Tên</label>
          <input type="text" id="full-name" placeholder="Họ và Tên" value="Nguyễn Văn A" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Email" value="email@example.com">
          <a href="#" class="change-link">Thay đổi</a>
        </div>

        <div class="form-group">
          <label for="phone">Số Điện Thoại</label>
          <input type="tel" id="phone" placeholder="Số điện thoại" value="0123456789">
          <a href="#" class="change-link">Thay đổi</a>
        </div>

        <div class="form-group">
          <label for="birthdate">Ngày Sinh</label>
          <input type="date" id="birthdate" value="1990-01-01">
          <a href="#" class="change-link">Thay đổi</a>
        </div>

        <div class="form-group">
          <label for="sex">Giới tính</label>
          <select id="sex">
            <option value="Nam" selected>Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác">Khác</option>
          </select>
        </div>

        <div class="form-group">
          <label for="address">Địa Chỉ</label>
          <textarea id="address" placeholder="Địa chỉ" rows="3">123 Đường ABC, Phường DEF, Thành phố GHI</textarea>
        </div>

        <button type="submit">Lưu</button>
      </form>

      <h3>Thay Đổi Mật Khẩu</h3>
      <div class="underline"></div>
      <form action="#" method="POST">
        <div class="form-group">
          <label for="current-password">Mật Khẩu Hiện Tại</label>
          <input type="password" id="current-password" placeholder="Mật khẩu hiện tại" required>
        </div>

        <div class="form-group">
          <label for="new-password">Mật Khẩu Mới</label>
          <input type="password" id="new-password" placeholder="Mật khẩu mới" required>
        </div>

        <div class="form-group">
          <label for="confirm-password">Xác Nhận Mật Khẩu Mới</label>
          <input type="password" id="confirm-password" placeholder="Xác nhận mật khẩu mới" required>
        </div>

        <button type="submit">Đổi Mật Khẩu</button>
      </form>
    </div>
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
          <img src="/images/cachthucthanhtoan.png" alt="Payment" class="shipping-image1" />
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