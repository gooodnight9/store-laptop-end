<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ Hàng</title>
  <link rel="stylesheet" href="/css/user/GioHang.css">
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
        window.location.href = '/giohang';
      });
    </script>
    <div class="account dropdown">
      <button id="button-account" class="dropdown-toggle">
        <img src="/images/anhdaidin.png" alt="Tài khoản" />
      </button>
      <span>Tài khoản</span>

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
    <span>Trang chủ</span> > <span>Giỏ hàng</span>
  </div>


  <main>
    <div class="container">
      <div class="content">
        <div class="header">
          <div class="product-info">Sản phẩm</div>
          <div class="chat-shop">
            <button>Chat</button>
            <button>Xem Shop</button>
          </div>
          <div class="price" style="margin-left: 170px;">Đơn giá</div>
          <div class="quantity" style="margin-left: 40px;">Số lượng</div>
          <div class="total-price" style="margin-left: 40px;">Thành tiền</div>
          <div class="remove">Thao tác</div>
        </div>

        <div id="cart-items-container"></div> <!-- Giỏ hàng sẽ được điền ở đây -->

      </div>

      <div class="summary-container">
        <div class="summary">
          <div class="a">Khuyến mãi</div>
        </div>
        <div class="summary">
          <div class="a"> Thanh toán</div>
          <div class="total" id="total">Tổng tạm tính: 0</div>
          <div class="total" id="total-price">Thành tiền: 0</div>
          <a href="/payment-step1" class="continue">TIẾP TỤC</a>
          <script>
            document.querySelector('.continue').addEventListener('click', function(event) {
              event.preventDefault(); // Ngừng hành động mặc định của liên kết
              // Hàm để lấy giá trị cookie
              function getCookie(name) {
                let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? match[2] : null; // Trả về giá trị cookie hoặc null nếu không tìm thấy
              }
              const yourToken = getCookie('auth_token');

              if (!yourToken) {
                alert('Không tìm thấy token đăng nhập!');
                return;
              }
              // Gọi API để lấy dữ liệu giỏ hàng và lưu vào localStorage
              fetch('http://localhost:8000/api/giohangs', {
                  method: 'GET',
                  headers: {
                    'Authorization': `Bearer ${yourToken}`, // Thêm token vào header
                  }
                })
                .then(response => response.json())
                .then(data => {
                  // Lưu giỏ hàng vào localStorage mà không tính tổng tiền
                  localStorage.setItem('cartItems', JSON.stringify(data));

                  // Bạn có thể thực hiện thêm hành động trước khi chuyển hướng
                  console.log('Dữ liệu giỏ hàng đã được lưu.');

                  // Sau khi gọi API và lưu xong, chuyển hướng đến trang thanh toán
                  window.location.href = this.href; // Chuyển hướng đến /payment-step1
                })
                .catch(error => {
                  console.error('Có lỗi khi gọi API:', error);
                });
            });
          </script>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Hàm để lấy giá trị cookie
    function getCookie(name) {
      let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
      return match ? match[2] : null; // Trả về giá trị cookie hoặc null nếu không tìm thấy
    }

    // Hàm để lấy dữ liệu giỏ hàng từ API
    function fetchCartData() {
      const yourToken = getCookie('auth_token'); // Lấy token từ cookie

      if (!yourToken) {
        alert('Không tìm thấy token đăng nhập!');
        console.log('Không có token. Đăng xuất không thành công.');
        return;
      }

      fetch('http://localhost:8000/api/giohangs', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${yourToken}`, // Thêm token vào header
          }
        })
        .then(response => response.json())
        .then(data => {
          const cartItemsContainer = document.getElementById("cart-items-container");
          let totalAmount = 0;

          // Xóa các sản phẩm cũ trước khi thêm sản phẩm mới vào
          cartItemsContainer.innerHTML = '';

          data.forEach(item => {
            // Tạo HTML cho từng sản phẩm
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('product');
            itemDiv.id = `product-${item.magh}`; // Sử dụng magh thay vì masp

            itemDiv.innerHTML = `
            <div class="checkbox">
              <input type="checkbox">
            </div>
            <div class="product-info">
              <div class="product-name">${item.tensanpham}</div>
            </div>
            <div class="price">${item.giaban.toLocaleString()}</div>
            <div class="quantity">
              <input type="number" id="quantity-${item.magh}" value="${item.soluong}" min="1"> 
            </div>
            <div class="total-price" id="total-price-${item.magh}">${(item.giaban * item.soluong).toLocaleString()}</div>
            <div class="remove">
              <button id="delete-${item.magh}" onclick="removeItem(${item.magh})">Xóa</button>
            </div>
          `;

            // Thêm phần tử vào giỏ hàng
            cartItemsContainer.appendChild(itemDiv);

            // Cộng dồn tổng tiền
            totalAmount += item.giaban * item.soluong;

            // Lắng nghe sự thay đổi của số lượng
            const quantityInput = document.getElementById(`quantity-${item.magh}`);
            quantityInput.addEventListener('input', function() {
              let currentValue = parseInt(this.value);

              // Kiểm tra nếu người dùng nhập số lượng hợp lệ
              if (currentValue < 1) {
                this.value = 1; // Đảm bảo số lượng không nhỏ hơn 1
                currentValue = 1; // Đặt lại giá trị của currentValue thành 1
              }

              // Tính lại tổng tiền
              updateTotalAmount(item.magh, item.giaban, currentValue);
            });
          });


          // Hiển thị tổng tiền
          document.getElementById('total').textContent = `Tổng tạm tính: ${totalAmount.toLocaleString()}`;
          document.getElementById('total-price').textContent = `Thành tiền: ${totalAmount.toLocaleString()}`;
        })
        .catch(error => {
          console.error('Error fetching cart data:', error);
        });
    }

    // Hàm xóa sản phẩm khỏi giỏ hàng
    function removeItem(magh) {
      const yourToken = getCookie('auth_token');

      if (!yourToken) {
        alert('Không tìm thấy token đăng nhập!');
        return;
      }

      fetch(`http://localhost:8000/api/giohang/${magh}/delete`, { // Sử dụng magh để xóa sản phẩm
          method: 'DELETE',
          headers: {
            'Authorization': `Bearer ${yourToken}`
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data) {
            alert('Sản phẩm đã được xóa khỏi giỏ hàng');
            document.getElementById(`product-${magh}`).remove(); // Xóa sản phẩm khỏi DOM
            updateTotalAmountDisplay(); // Cập nhật lại tổng tiền sau khi xóa

          } else {
            console.log('magh' + magh);
            console.log('Không thể xóa sản phẩm khỏi giỏ hàng');
          }
        })
        .catch(error => {
          console.error('Lỗi khi xóa sản phẩm:', error);
        });
    }

    // Hàm tính lại tổng tiền sau khi thay đổi số lượng
    function updateTotalAmount(magh, giaban, newQuantity) {
      // Tìm sản phẩm trong DOM
      const totalPriceElement = document.getElementById(`total-price-${magh}`);

      // Cập nhật giá trị mới cho sản phẩm
      const newTotalPrice = giaban * newQuantity;
      if (!isNaN(newTotalPrice)) {
        totalPriceElement.textContent = newTotalPrice.toLocaleString();
      }

      // Tính lại tổng tiền
      totalAmount = 0;
      const allTotalPriceElements = document.querySelectorAll('.total-price');
      allTotalPriceElements.forEach(item => {
        const price = parseInt(item.textContent.replace(/,/g, ''));
        if (!isNaN(price)) {
          totalAmount += price; // Cộng dồn tất cả các giá trị tổng tiền
        }
      });

      // Cập nhật lại tổng tiền
      updateTotalAmountDisplay();
    }

    // Hàm cập nhật lại hiển thị tổng tiền
    function updateTotalAmountDisplay() {
      if (!isNaN(totalAmount)) {
        // Cập nhật hiển thị tổng tiền trên giao diện
        document.getElementById('total').textContent = `Tổng tạm tính: ${totalAmount.toLocaleString()}`;
        document.getElementById('total-price').textContent = `Thành tiền: ${totalAmount.toLocaleString()}`;

        // Lưu tổng tiền vào localStorage
        localStorage.setItem('totalAmount', totalAmount.toLocaleString());
        localStorage.setItem('totalPrice', totalAmount.toLocaleString());
      } else {
        document.getElementById('total').textContent = 'Tổng tạm tính: 0';
        document.getElementById('total-price').textContent = 'Thành tiền: 0';

        // Lưu tổng tiền là 0 vào localStorage
        localStorage.setItem('totalAmount', '0');
        localStorage.setItem('totalPrice', '0');
      }
    }


    // Gọi hàm khi trang được tải
    window.onload = fetchCartData;
  </script>




  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h4>VỀ NOVALAP</h4>
        <ul>
          <li>Giới thiệu</li>
          <li>Tuyển dụng</li>
          <li>Hệ thống cửa hàng</li>
          <li>Trung tâm bảo hành</li>
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