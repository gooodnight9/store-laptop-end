<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="/css/user/TrangChu.css">
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
        <li><a href="/product-list">Sản phẩm</a></li>
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
    <script>
      document.getElementById('button-cart').addEventListener('click', function() {
        window.location.href = '/order'; // Chuyển hướng đến route xác nhận hủy đơn
      });
    </script>
    <div class="account dropdown">
      <button id="button-account" class="dropdown-toggle">
        <img src="/images/anhdaidin.png" alt="Tài khoản" />
      </button>
      <span>Tài khoản</span>
      <ul class="dropdown-menu">
        <li><a href="/dnkh">Đăng nhập</a></li>
        <li><a href="/dkkh">Đăng ký</a></li>
        <li><a href="/dnkh" id="logout-button">Đăng xuất</a></li>

        <script>
          document.getElementById('logout-button').addEventListener('click', function(event) {
            event.preventDefault(); // Ngừng hành động mặc định của liên kết (không chuyển hướng)

            const token = getCookie('auth_token'); // Lấy token từ cookie
            console.log('Token lấy từ cookie:', token); // Log token từ cookie

            if (!token) {
              alert('Không tìm thấy token đăng nhập!');
              console.log('Không có token. Đăng xuất không thành công.');
              return;
            }

            fetch('http://localhost:8000/api/logout', {
                method: 'DELETE',
                headers: {
                  'Content-Type': 'application/json',
                  'Authorization': `Bearer ${token}`, // Sử dụng token từ cookie
                },
                credentials: 'include', // Gửi cookie kèm theo yêu cầu nếu cần
              })
              .then(response => {
                console.log('Đã nhận được phản hồi từ API:', response); // Log phản hồi từ API
                if (!response.ok) {
                  console.error('Lỗi trong phản hồi:', response); // Log lỗi nếu response không ok
                  throw new Error('Có lỗi xảy ra khi đăng xuất!');
                }
                return response.json();
              })
              .then(data => {
                console.log('Dữ liệu từ API:', data); // Log dữ liệu trả về từ API
                console.log(data.message); // Thông báo thành công

                // Xóa token khỏi cookie
                document.cookie = 'auth_token=; path=/; max-age=0';
                console.log('Đã xóa token khỏi cookie.');

                // Chuyển hướng đến trang đăng nhập
                window.location.href = '/dnkh';
                console.log('Chuyển hướng đến trang đăng nhập.');
              })
              .catch(error => {
                console.error('Lỗi khi đăng xuất:', error); // Log lỗi nếu có
                alert('Không thể đăng xuất. Vui lòng thử lại!');
              });
          });
        </script>
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

      function getCookie(name) {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
          const cookie = cookies[i].trim();
          if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
          }
        }
        return null; // Trả về null nếu cookie không tồn tại
      }
    </script>

  </header>
  <!-- Banner -->
  <div class="banner">
    <img src="/images/banner1.png" alt="Black Friday Banner">
  </div>

  <!-- Laptop Bán Yêu Thích -->
  <div class="section">
    <h2 class="section-title">Laptop Bán Yêu Thích</h2>
    <div class="product-list" id="product-list">
      <script>
        // Hàm để tạo phần tử sản phẩm và thêm vào danh sách
        function loadTopRatedSanPham() {
          fetch(`http://localhost:8000/api/user/sanphamsTopRated`)
            .then(response => response.json())
            .then(data => {
              const productList = document.getElementById("product-list");

              // Duyệt qua dữ liệu và tạo các phần tử sản phẩm
              data.forEach(product => {
                // Tạo div.productu7u7
                const productDiv = document.createElement("div");
                productDiv.classList.add("product");

                // Tạo và thêm hình ảnh
                const img = document.createElement("img");
                img.src = product.url_hinh || "/images/laptop1.png"; // Đặt ảnh mặc định nếu không có url_hinh

                img.onerror = function() {
                  // Nếu hình ảnh không tồn tại hoặc không thể tải được, thay thế bằng ảnh mặc định
                  img.src = "/images/laptop1.png";
                };

                img.alt = product.Commpany;
                productDiv.appendChild(img);

                // Tạo và thêm tên sản phẩm
                const p = document.createElement("p");
                p.textContent = product.Commpany;
                productDiv.appendChild(p);

                // Thêm sản phẩm vào danh sách
                productList.appendChild(productDiv);
              });
            })
            .catch(error => {
              console.error("Lỗi khi lấy dữ liệu:", error);
            });

          fetch(`http://localhost:8000/api/user/sanphamsPromo`)
            .then(response => response.json())
            .then(data => {
              const productList = document.getElementById("placeholder-grid");

              // Duyệt qua dữ liệu và tạo các phần tử sản phẩm
              data.forEach(product => {
                // Tạo div.productu7u7
                const productDiv = document.createElement("div");
                productDiv.classList.add("product");

                // Tạo và thêm hình ảnh
                const img = document.createElement("img");
                img.src = product.url_hinh || "/images/laptop1.png"; // Đặt ảnh mặc định nếu không có url_hinh

                img.onerror = function() {
                  // Nếu hình ảnh không tồn tại hoặc không thể tải được, thay thế bằng ảnh mặc định
                  img.src = "/images/laptop1.png";
                };

                img.alt = product.Commpany;
                productDiv.appendChild(img);

                // Tạo và thêm tên sản phẩm
                const p = document.createElement("p");
                p.textContent = product.Commpany;
                productDiv.appendChild(p);

                // Thêm sản phẩm vào danh sách
                productList.appendChild(productDiv);
              });
            })
            .catch(error => {
              console.error("Lỗi khi lấy dữ liệu:", error);
            });

          fetch(`http://localhost:8000/api/user/sanphamSales`)
            .then(response => response.json())
            .then(data => {
              const productList = document.getElementById("placeholder-grid1");

              // Duyệt qua dữ liệu và tạo các phần tử sản phẩm
              data.forEach(product => {
                // Tạo div.productu7u7
                const productDiv = document.createElement("div");
                productDiv.classList.add("product");

                // Tạo và thêm hình ảnh
                const img = document.createElement("img");
                img.src = product.url_hinh || "/images/laptop1.png"; // Đặt ảnh mặc định nếu không có url_hinh

                img.onerror = function() {
                  // Nếu hình ảnh không tồn tại hoặc không thể tải được, thay thế bằng ảnh mặc định
                  img.src = "/images/laptop1.png";
                };

                img.alt = product.Commpany;
                productDiv.appendChild(img);

                // Tạo và thêm tên sản phẩm
                const p = document.createElement("p");
                p.textContent = product.Commpany;
                productDiv.appendChild(p);

                // Thêm sản phẩm vào danh sách
                productList.appendChild(productDiv);
              });
            })
            .catch(error => {
              console.error("Lỗi khi lấy dữ liệu:", error);
            });
        }

        // Gọi hàm khi trang được tải
        document.addEventListener("DOMContentLoaded", function() {
          loadTopRatedSanPham();
        });
      </script>
    </div>
  </div>
  </div>

  <!-- Placeholder Section -->
  <div class="section">
    <h2 class="section-title">Mặt Hàng Ưu Đãi</h2>
    <div class="placeholder-grid" id="placeholder-grid">
    </div>
  </div>

  <!-- Top Sản Phẩm Bán Chạy -->
  <div class="section">
    <h2 class="section-title">Top Sản Phẩm Bán Chạy</h2>
    <div class="placeholder-grid1" id="placeholder-grid1">
    </div>
    <a href="/product-list" class="view-more">Xem tất cả</a>
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