<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Sản Phẩm</title>
  <link rel="stylesheet" href="/css/user/ChiTietSanPham.css">
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
    <span>Trang chủ</span> > <span>Sản phẩm</span> > <strong>Chi tiết sản phẩm</strong>
  </div>

  <main>
    <div class="product-container">
      <div class="product-image">
        <img src="/images/product-placeholder.png" alt="Hình sản phẩm" />
        <div class="image-thumbnails">
          <img src="/images/product-thumbnail1.png" alt="Thumbnail 1" />
          <img src="/images/product-thumbnail2.png" alt="Thumbnail 2" />
          <img src="/images/product-thumbnail3.png" alt="Thumbnail 3" />
        </div>
      </div>

      <div class="product-details">
        <h1 class="product-title">Laptop A...</h1>

        <div class="product-options">
          <div class="product-variants">
            <button>AAAA 16GB-512GB</button>
            <button>AAAA 16GB-512GB</button>
          </div>

          <div class="product-colors">
            <span>Chọn màu sản phẩm:</span>
            <button class="color-option">Đen</button>
            <button class="color-option">Trắng</button>
          </div>
        </div>

        <div class="product-price">
          <span>23.000.000đ</span>
        </div>

        <div class="promotions">
          <h4>Khuyến mãi</h4>
          <ul>
            <li>ABS</li>
            <li>ABS</li>
            <li>ABS</li>
            <li>ABS</li>
          </ul>
        </div>

        <div class="action-buttons">
          <button class="buy-now">Mua ngay</button>
          <button class="add-to-cart">Thêm vào giỏ</button>
        </div>

        <div class="product-guarantees">
          <h4>NovaLap cam kết</h4>
          <ul>
            <li>Hỗ trợ đổi trả 12 tháng (miễn phí tháng đầu)</li>
            <li>Bảo hành chính hãng laptop 1 năm tại các chi nhánh</li>
            <li>Bộ sản phẩm gồm: Sách hướng dẫn, Sạc Laptop</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="product-description">
      <h2>Mô tả sản phẩm</h2>
      <p>[Chi tiết mô tả sản phẩm sẽ được cập nhật ở đây]</p>
    </div>

    <div class="product-reviews">
      <h2>Đánh giá & Nhận xét</h2>
      <div class="rating-summary">
        <span>0.0/5</span>
        <div class="stars">
          ★★★★★
        </div>
        <p>0 đánh giá</p>
      </div>
      <button class="write-review">Đánh giá ngay</button>
    </div>

    <div class="product-qa">
      <h2>Hỏi và đáp</h2>
      <div class="qa-section">
        [Nội dung hỏi đáp sản phẩm sẽ hiển thị tại đây]
      </div>
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