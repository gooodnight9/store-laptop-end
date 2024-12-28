<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Sản Phẩm</title>
  <link rel="stylesheet" href="./css/user/ChiTietSanPham.css">
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

  <!-- Main Content -->
  <main class="container">

    <h1 class="product-title">Laptop A...</h1>

    <div class="top-section">

      <div class="image-gallery">
        <img src="" alt="Main Product Image">
        <div class="thumbnail-list">
          <img src="/images/laptop1.png" alt="Thumbnail 1">
        </div>
      </div>


      <div class="product-info">

        <div class="variants">
          <div class="variant-title">Chọn loại thông số</div>
          <div class="variant-options">
            <label><input type="radio" name="spec" value="16GB-512GB"> 16GB-512GB</label>
            <label><input type="radio" name="spec" value="32GB-1TB"> 32GB-1TB</label>
          </div>

          <div class="variant-title">Chọn màu sản phẩm</div>
          <div class="variant-options">
            <label><input type="radio" name="color" value="black"> Đen</label>
            <label><input type="radio" name="color" value="white"> Trắng</label>
          </div>
        </div>


        <div class="promotion-section">
          <h3>Khuyến mãi</h3>
          <ul>
          </ul>
        </div>



        <div class="action-buttons">
          <button onclick="window.location.href = '/giohang'">Mua ngay</button>
          <button class="add-to-cart" id="add-to-cart">Thêm vào giỏ hàng</button>
        </div>
      </div>

    </div>

    <div class="commitment-section">
      <h3>Cam kết của NovaLap</h3>
      <ul>
        <li>Hàng chính hãng, đảm bảo chất lượng</li>
        <li>Hỗ trợ đổi trả trong 7 ngày</li>
        <li>Giao hàng nhanh chóng</li>
      </ul>
    </div>

    <div class="description-details-section">
      <div class="descripwtion">
        <h2>Mô tả sản phẩm</h2>
        <p class="product-description"></p>
      </div>
      <div class="details">
        <h2>Thông tin chi tiết</h2>
      </div>

      <script>
        // URL của API
        const selectedMasp = localStorage.getItem('selectedMasp');
        const apiURL = `http://localhost:8000/api/sanpham?masp=${selectedMasp}`;
        console.log('masp ' + selectedMasp);
        console.log("API URL:", apiURL); // Lấy dữ liệu từ API

        fetch(apiURL)
          .then((response) => response.json())
          .then((data) => {
            const product = data[0]; // Lấy đối tượng sản phẩm đầu tiên trong mảng
            console.log("Tên sản phẩm:", product.tensanpham); // In tên sản phẩm ra console

            // Cập nhật tên sản phẩm
            document.querySelector(".product-title").textContent = product.tensanpham || "Tên sản phẩm";

            // Cập nhật hình ảnh chính
            const mainImage = document.querySelector(".image-gallery img");
            mainImage.src = product.url_hinh || "/images/laptop1.png";
            mainImage.alt = product.tensanpham || "Hình sản phẩm";

            // Cập nhật thông tin chi tiết sản phẩm
            const productInfo = document.querySelector(".product-info");
            const variantsContainer = productInfo.querySelector(".variants");

            // Chọn loại thông số (RAM và Bộ nhớ)
            variantsContainer.innerHTML = `
        <div class="variant-title">Chọn loại thông số</div>
        <div class="variant-options">
        </div>
        <div class="variant-title">Chọn màu sản phẩm</div>
        <div class="variant-options" id="color-options"></div>
        <div class="variant-title">Chọn dung lượng</div>
        <div class="variant-options" id="storage-options"></div>
      `;

            // Lọc các giá trị màu sắc và dung lượng từ dữ liệu
            const colorSet = new Set();
            const storageSet = new Set();

            data.forEach(item => {
              colorSet.add(item.mau);
              storageSet.add(item.dungluong);
            });

            // Thêm các lựa chọn màu sắc vào phần tử "color-options"
            const colorOptionsElement = document.getElementById("color-options");
            colorSet.forEach(color => {
              const colorLabel = document.createElement("label");
              colorLabel.innerHTML = `<input type="radio" name="color" value="${color}"> ${color}`;
              colorOptionsElement.appendChild(colorLabel);
            });

            // Thêm các lựa chọn dung lượng vào phần tử "storage-options"
            const storageOptionsElement = document.getElementById("storage-options");
            storageSet.forEach(storage => {
              const storageLabel = document.createElement("label");
              storageLabel.innerHTML = `<input type="radio" name="storage" value="${storage}">${storage} GB`;
              storageOptionsElement.appendChild(storageLabel);
            });

            // Cập nhật khuyến mãi
            const promotionsList = document.querySelector(".promotion-section ul");
            promotionsList.innerHTML = ""; // Xóa nội dung cũ (nếu có)

            if (product.loaikm && product.sotienkm) {
              const promotionItem = document.createElement("li");
              promotionItem.textContent = `Loại khuyến mãi: ${product.loaikm}, Số tiền khuyến mãi: ${product.sotienkm} VND`;
              promotionsList.appendChild(promotionItem);
            } else {
              const noPromotionItem = document.createElement("li");
              noPromotionItem.textContent = "Không có khuyến mãi";
              promotionsList.appendChild(noPromotionItem);
            }

            // Cập nhật mô tả sản phẩm
            const descriptionElement = document.querySelector(".product-description");
            descriptionElement.textContent = product.mota || "Mô tả sản phẩm không có sẵn.";

            // Cập nhật thông tin chi tiết
            const detailsElement = document.querySelector(".details");
            detailsElement.innerHTML = `
        <p>Company: ${product.Commpany}</p>
        <p>Type: ${product.typename}</p>
        <p>CPU: ${product.cpu}</p>
        <p>RAM: ${product.ram}</p>
        <p>Memory: ${product.memory}</p>
        <p>GPU: ${product.gpu}</p>
        <p>Weight: ${product.Weight}</p>
        <p>Screen: ${product.inches} inches, Resolution: ${product.sreenresolution}</p>
      `;
          })
          .catch((error) => console.error("Lỗi khi lấy dữ liệu từ API:", error));
      </script>

    </div>

    <script>
      function getCookie(name) {
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
          return match[2]; // Trả về giá trị của cookie
        }
        return null; // Nếu không tìm thấy cookie, trả về null
      }

      document.getElementById("add-to-cart").addEventListener("click", function(event) {
        event.stopPropagation();

        const masp = localStorage.getItem('selectedMasp');
        const yourToken = getCookie('auth_token'); // Lấy token từ cookie

        if (!yourToken) {
          alert('Vui lòng đăng nhập để thực hiện chức năng này');
          console.log('Không có token. Đăng xuất không thành công.');
          window.location.href = '/dnkh'; // Đảm bảo đường dẫn hợp lệ
          return;
        }

        const selectedColor = document.querySelector('input[name="color"]:checked');
        const selectedStorage = document.querySelector('input[name="storage"]:checked');

        if (selectedColor) {
          console.log("Màu đã chọn: " + selectedColor.value);
        } else {
          console.log("Chưa chọn màu.");
        }

        if (selectedStorage) {
          console.log("Dung lượng đã chọn: " + selectedStorage.value + " GB");
        } else {
          console.log("Chưa chọn dung lượng.");
        }

        const color = selectedColor ? selectedColor.value : null;
        const storage = selectedStorage ? selectedStorage.value : null;

        if (color && storage) {
          const url = `http://localhost:8000/api/ctsp/detail/${masp}/${color}/${storage}`;

          fetch(url)
            .then(response => response.json())
            .then(data => {
              if (data.message === 'Lấy chi tiết CTSP thành công.') {
                const ctsp = data.data.original.ctsp;
                localStorage.setItem('ctsp', JSON.stringify(ctsp));
                console.log('CTSP đã được lưu vào localStorage:', ctsp);

                // Gửi yêu cầu POST vào API giỏ hàng với CTSP đã lấy được
                fetch('http://localhost:8000/api/giohang/create', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'Authorization': `Bearer ${yourToken}` // Thêm token vào header
                    },
                    credentials: 'include',
                    body: JSON.stringify({
                      masp: masp,
                      mactsp: ctsp.mactsp || null, // Gửi mã CTSP (mactsp)
                    })
                  })
                  .then(response => response.json())
                  .then(cartData => {
                    if (cartData.original && cartData.original.message) {
                      alert('Thêm sản phẩm vào giỏ hàng thành công!');
                    } else {
                      alert('Thêm sản phẩm vào giỏ hàng thất bại: ' + cartData.message);
                    }
                  })
                  .catch(error => {
                    console.error('Error:', error);
                    alert('Đã có lỗi xảy ra. Vui lòng thử lại.');
                  });
              } else {
                console.log('Không lấy được chi tiết CTSP:', data.message);
                alert('Không lấy được chi tiết sản phẩm.');
              }
            })
            .catch(error => {
              console.log('Có lỗi xảy ra khi gọi API:', error);
              alert('Có lỗi xảy ra khi lấy chi tiết sản phẩm.');
            });
        } else {
          console.log("Vui lòng chọn màu và dung lượng.");
          alert("Vui lòng chọn màu và dung lượng.");
        }
      });
    </script>


    <div class="rating-section">
      <h2>Đánh giá & Nhận xét</h2>
      <div class="image-placeholder">Hình ảnh liên quan (nếu có)</div>
      <h3>Bạn đánh giá sao về sản phẩm này?</h3>
      <button class="rating-button">Đánh giá ngay</button>
    </div>

    <!-- Khung Hỏi và đáp -->
    <section class="q-and-a">
      <h2>Hỏi và đáp</h2>
      <div class="qa-placeholder"></div>
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