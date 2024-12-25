<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin đơn hàng</title>
    <link rel="stylesheet" href="/css/QLDonHang/SuaDonHang.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Sửa thông tin đơn hàng</h1>
            <button class="close-btn">✖</button>
        </div>

        <!-- Thông tin khách hàng -->
        <div class="section">
            <div class="box">
              <h2 style="color: #28a745;">Thông tin khách hàng</h2>
              <div class="form-grid">
                <!-- Thông tin khách hàng -->
                <div class="form-group">
                  <label for="name">Họ tên</label>
                  <input type="text" id="name" placeholder="Họ tên">
                </div>
                <div class="form-group">
                  <label for="phone">SĐT</label>
                  <input type="text" id="phone" placeholder="Nhập SĐT">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" placeholder="Email (không bắt buộc)">
                </div>
                <div class="form-group">
                  <label for="notes">Ghi chú</label>
                  <textarea id="notes" placeholder="Ghi chú"></textarea>
                </div>
                <!-- Địa chỉ nhận hàng -->
                <div class="form-group">
                  <label>Địa chỉ nhận hàng</label>
                  <div class="address-select">
                    <select>
                      <option>Chọn tỉnh</option>
                    </select>
                    <select>
                      <option>Chọn huyện</option>
                    </select>
                    <select>
                      <option>Chọn xã</option>
                    </select>
                  </div>
                  <input type="text" placeholder="Địa chỉ cụ thể">
                </div>
                <!-- Thời gian -->
                <div class="form-group">
                  <label>Thời gian</label>
                  <div class="time-group">
                    <input type="date" value="2020-12-12">
                    <input type="time" value="12:00">
                  </div>
                </div>
              </div>
            </div>
          </div>
          

        <!-- Thông tin sản phẩm -->
        <div class="section">
    <div class="box">
        <h2 style="color: #28a745;">Thông tin sản phẩm</h2>
        <!-- Thanh tìm kiếm -->
        <input type="text" class="search" placeholder="Tìm kiếm...">
        
        <!-- Bảng sản phẩm -->
        <div class="product-table">
            <!-- Tiêu đề các cột -->
            <div class="product-header">
                <span class="product-title">Sản phẩm</span>
                <span class="product-quantity">Số lượng</span>
                <span class="product-warranty">Bảo hành</span>
                <span class="product-price">Đơn giá</span>
                <span class="product-total">Tổng tiền</span>
            </div>
            
            <!-- Dòng dữ liệu sản phẩm -->
            <div class="product-row">
                <span class="product-title">
                    ASUS Zenbook 14 OLED UX3402... 
                    <br>
                    Intel i5-1251 | 16GB RAM | 512GB SSD
                </span>
                <span class="product-quantity">
                    <input type="number" value="1">
                </span>
                <span class="product-warranty">
                    <select>
                        <option>12 tháng</option>
                    </select>
                </span>
                <span class="product-price">24.900.000đ</span>
                <span class="product-total">24.900.000đ</span>
                <!-- Nút xóa nhỏ phía sau tổng tiền -->
                <div class="delete-wrapper">
                    <button class="delete-btn">Xóa</button>
                </div>
            </div>


        </div>
    </div>
</div>


        <!-- Chọn phương thức nhận hàng -->
        <div class="section delivery-method">
            <label class="section-label">Chọn phương thức nhận hàng</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="delivery"> 
                    Giao tận nơi
                </label>
                <label>
                    <input type="radio" name="delivery" checked> 
                    Nhận tại cửa hàng
                </label>
            </div>
            <select>
                <option>Chọn cửa hàng</option>
            </select>
            <div>
                <label class="section-label">Nhập mã giảm giá</label>
                <div>
                    <input type="text" placeholder="Nhập mã giảm giá" class="discount-code">
                </div>
            </div>
        </div>
        

        <!-- Tổng cộng -->
        <div class="total-section">
    <!-- Tổng cộng -->
    <div class="total-info">
        <span class="total-label">Tổng cộng:</span>
        <span class="total-value">24.900.000đ</span>
    </div>
    
    <!-- Điểm tích lũy -->
    <div class="reward-info">
        <span class="reward-label">Điểm tích lũy:</span>
        <span class="reward-value">1.200 điểm</span>
    </div>
    
    <!-- Nút hành động -->
    <div class="action-buttons">
        <button class="cancel-button">Hủy</button>
        <button class="submit-button">Tạo đơn hàng</button>
    </div>
</div>
    </div>
</body>
</html>
