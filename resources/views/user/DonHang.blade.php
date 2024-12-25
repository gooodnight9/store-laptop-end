<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Đơn Hàng</title>
  <link rel="stylesheet" href="/css/user/donhang.css">
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
    <span>Trang chủ</span> > <span>Tài khoản</span> > <strong>Đơn hàng</strong>
  </div>

  <main>
    <div class="order-status">
      <button class="status-button active">Chờ thanh toán</button>
      <button class="status-button">Vận chuyển</button>
      <button class="status-button">Chờ giao hàng</button>
      <button class="status-button">Hoàn thành</button>
      <button class="status-button">Đã hủy</button>
    </div>

    <div class="order-container">
      <aside class="sidebar">
        <h3>Hồ sơ của Nguyễn Văn A</h3>
        <ul>
          <li><a href="#">Thông tin tài khoản</a></li>
          <li><a href="#">Đơn mua</a></li>
          <li><a href="#">Thông báo</a></li>
          <li><a href="#">Hỗ trợ</a></li>
        </ul>
      </aside>

      <section class="order-list">
        <div class="order-item">
          <div class="product-info">
            <img src="/images/product1.png" alt="Sản phẩm">
            <div class="product-details">
              <h4>Tên sản phẩm</h4>
              <p>Giá: 500,000 VND</p>
            </div>
          </div>
          <div class="order-status">
            <span>Chờ giao hàng</span>
          </div>
          <div class="order-actions">
            <button>Đã nhận hàng</button>
            <button>Xác nhận hàng</button>
            <button>Liên hệ người bán</button>
          </div>
        </div>
        <p class="note">Vui lòng chỉ nhấn "Đã nhận hàng" khi đơn hàng đã được giao đến bạn và sản phẩm không có vấn đề gì.</p>
    </div>
    </div>

    <div class="order-item">
      <div class="product-info">
        <img src="/images/product2.png" alt="Sản phẩm">
        <div class="product-details">
          <h4>Tên sản phẩm khác</h4>
          <p>Giá: 1,200,000 VND</p>
        </div>
      </div>
      <div class="order-status">
        <span>Đã nhận hàng</span>
      </div>
      <div class="order-actions">
        <button>Yêu cầu trả hàng / Hoàn tiền</button>
        <button>Liên hệ người bán</button>
      </div>
    </div>
    <p class="note">Vui lòng chỉ nhấn "Đã nhận hàng" khi đơn hàng đã được giao đến bạn và sản phẩm không có vấn đề gì.</p>
    </div>
    </div>
    </section>
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