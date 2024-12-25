<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết đơn hàng</title>
  <link rel="stylesheet" href="/css/QLDonHang/ChiTietDonHang.css">
</head>

<body>
  <div class="order-modal">
    <div class="order-modal-content">
      <span class="close-btn">&times;</span>
      <h2>CHI TIẾT ĐƠN HÀNG <span class="order-id">(302012)</span></h2>

      <!-- Dòng tiêu đề -->
      <div class="header-row">
        <span class="header-product">Danh sách sản phẩm</span>
        <span class="header-quantity">Số lượng</span>
        <span class="header-price">Giá</span>
      </div>

      <!-- Danh sách sản phẩm -->
      <div class="product-list">
        <div class="product-item">
          <img src="laptop.png" alt="ASUS Zenbook" class="product-img">
          <div class="product-info">
            <p>ASUS Zenbook 14 OLED UX3405MA-PP151W: Ultra 5-125H | 16GB RAM | 512GB SSD | Intel Arc Graphics | 14 inch 3K OLED | Windows 11 | Xanh</p>
          </div>
          <div class="product-quantity">
            <input type="number" value="1" min="1">
          </div>
          <div class="product-price">24.900.000đ</div>
        </div>

        <div class="product-item">
          <img src="mouse.png" alt="Chuột Microsoft" class="product-img">
          <div class="product-info">
            <p>Chuột Microsoft Bluetooth Mouse 2020</p>
          </div>
          <div class="product-quantity">
            <input type="number" value="1" min="1">
          </div>
          <div class="product-price">500.000đ</div>
        </div>
      </div>

      <!-- Nút hành động -->
      <div class="action-buttons">
        <button class="cancel-btn">Hủy</button>
        <button class="save-btn">Lưu</button>
      </div>
      <script>
        // Giả lập dữ liệu đơn hàng
        // const orderData = {
        //   id: 302012,
        //   products: [{
        //       name: "ASUS Zenbook 14 OLED UX3405MA-PP151W",
        //       image: "laptop.png",
        //       quantity: 1,
        //       price: 24900000
        //     },
        //     {
        //       name: "Chuột Microsoft Bluetooth Mouse 2020",
        //       image: "mouse.png",
        //       quantity: 2,
        //       price: 500000
        //     }
        //   ]
        // };

        // Hiển thị thông tin đơn hàng
        const orderIdElement = document.getElementById("order-id");
        const productListElement = document.getElementById("product-list");

        orderIdElement.textContent = orderData.id; // Hiển thị ID đơn hàng

        // Lặp qua các sản phẩm trong đơn hàng và hiển thị chúng
        orderData.products.forEach(product => {
          const productItem = document.createElement("div");
          productItem.classList.add("product-item");

          productItem.innerHTML = `
        <img src="/images/${product.image}" alt="${product.name}" class="product-img">
        <div class="product-info">
          <p>${product.name}</p>
        </div>
        <div class="product-quantity">
          <input type="number" value="${product.quantity}" min="1" readonly>
        </div>
        <div class="product-price">${product.price.toLocaleString()}đ</div>
      `;

          productListElement.appendChild(productItem);
        });
      </script>
    </div>
  </div>
</body>

</html>