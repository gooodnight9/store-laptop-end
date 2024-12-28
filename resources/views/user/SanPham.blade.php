<!DOCTYPE html>
<html lang="vi" xmlns="⁦http://www.w3.org/1999/html⁩">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="/css/user/SanPham.css">
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

        <div class="account dropdown">
            <button id="button-account" class="dropdown-toggle">
                <img src="/images/anhdaidin.png" alt="Tài khoản" />
            </button>
            <span>Tài khoản</span>
            <ul class="dropdown-menu">
                <li><button onclick="window.location.href='/dnkh'">Đăng nhập</button></li>
                <li><button onclick="window.location.href='/dkkh'">Đăng ký</button></li>
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
        <span>Menu</span> > <strong>Laptop</strong>
    </div>

    <main>
        <section class="container">
            <div class="content-box">
                <aside class="filters">
                    <!-- Khoảng giá -->
                    <div class="filter-group">
                        <h3>Khoảng giá</h3>
                        <input type="text" placeholder="Giá tối thiểu">
                        <input type="text" placeholder="Giá tối đa">
                    </div>

                    <!-- Thương hiệu -->
                    <div class="filter-group">
                        <h3>Thương hiệu</h3>
                        <select>
                            <option value="">Chọn thương hiệu</option>
                            <option value="asus">ASUS</option>
                            <option value="acer">Acer</option>
                            <option value="dell">Dell</option>
                            <option value="lenovo">Lenovo</option>
                            <option value="apple">Apple</option>
                            <option value="hp">HP</option>
                            <option value="msi">MSI</option>
                            <option value="microsoft">Microsoft</option>
                            <option value="toshiba">Toshiba</option>
                            <option value="huawei">Huawei</option>
                            <option value="xiaomi">Xiaomi</option>
                            <option value="vero">Vero</option>
                            <option value="razer">Razer</option>
                            <option value="mediacom">Mediacom</option>
                            <option value="samsung">Samsung</option>
                            <option value="google">Google</option>
                            <option value="fujitsu">Fujitsu</option>
                            <option value="lg">LG</option>
                            <option value="chuwi">Chuwi</option>
                        </select>
                    </div>


                    <!-- Series Laptop -->
                    <div class="filter-group">
                        <h3>Loại Laptop</h3>
                        <ul>
                            <li><label><input type="radio" name="laptop-series" value="ultrabook"> Ultrabook</label></li>
                            <li><label><input type="radio" name="laptop-series" value="notebook"> Notebook</label></li>
                            <li><label><input type="radio" name="laptop-series" value="netbook"> Netbook</label></li>
                            <li><label><input type="radio" name="laptop-series" value="gaming"> Gaming</label></li>
                            <li><label><input type="radio" name="laptop-series" value="2-in-1-convertible"> 2 in 1 Convertible</label></li>
                            <li><label><input type="radio" name="laptop-series" value="workstation"> Workstation</label></li>
                        </ul>
                    </div>


                    <!-- Series CPU -->
                    <div class="filter-group">
                        <h4>Series CPU</h4>
                        <ul>
                            <li><label><input type="checkbox" value="Intel Core i5">Intel Core i5</label></li>
                            <li><label><input type="checkbox" value="Intel Core i7">Intel Core i7</label></li>
                            <li><label><input type="checkbox" value="AMD">AMD</label></li>
                        </ul>
                    </div>

                    <!-- Nhu cầu -->
                    <div class="filter-group">
                        <h3>Nhu cầu</h3>
                        <ul>
                            <li><label><input type="radio" name="purpose" value="van-phong"> Văn phòng</label></li>
                            <li><label><input type="radio" name="purpose" value="gaming"> Gaming</label></li>
                            <li><label><input type="radio" name="purpose" value="hoc-sinh-sinh-vien"> Học sinh, sinh viên</label></li>
                            <li><label><input type="radio" name="purpose" value="do-hoa"> Đồ họa</label></li>
                        </ul>
                    </div>

                    <!-- Kích thước -->
                    <div class="filter-group">
                        <h4>Kích thước</h4>
                        <input type="number" name="" id="" min=10.1 max=17>
                    </div>

                    <button type="button" id="loc">Tìm kiếm</button>
                </aside>
            </div>

            </aside>


            <section class="product-grid">
                <!-- Placeholder for product cards -->
            </section>
            </div>
        </section>
        <div class="pagination">
            <button class="prev" id="prev-page" disabled>&lt;</button>
            <button class="page-number active" data-page="1">1</button>
            <button class="page-number" data-page="2">2</button>
            <button class="page-number" data-page="3">3</button>
            <button class="page-number" data-page="4">4</button>
            <button class="page-number" data-page="5">5</button>
            <button class="page-number" data-page="6">6</button>
            <button class="next" id="next-page">&gt;</button>
        </div>

        <script>
            let currentPage = 1; // Trang hiện tại

            // Hàm lấy các giá trị lọc
            function getFilterValues() {
                const minPrice = document.querySelector('input[placeholder="Giá tối thiểu"]').value || 0;
                const maxPrice = document.querySelector('input[placeholder="Giá tối đa"]').value || 1000000000000;
                const company = document.querySelector('select').value || '%';

                // Lấy giá trị của typename, nếu không có lựa chọn thì gán là '%'
                const typename = document.querySelector('input[name="laptop-series"]:checked') ?
                    document.querySelector('input[name="laptop-series"]:checked').value :
                    '%';

                const cpu = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'))
                    .map(checkbox => checkbox.value)
                    .join(',') || '%';
                const inches = document.querySelector('input[type="number"]').value || 0;

                // In ra các giá trị kiểm tra

                return {
                    minPrice,
                    maxPrice,
                    company,
                    typename,
                    cpu,
                    inches
                };

            }
            // Lắng nghe sự kiện click vào nút tìm kiếm
            document.getElementById('loc').addEventListener('click', function() {
                const filters = getFilterValues(); // Lấy các giá trị lọc
                currentPage = 1; // Reset về trang đầu tiên khi lọc lại
                loadProducts(currentPage, filters); // Gọi hàm loadProducts với các giá trị lọc
            });

            function loadProducts(page, filters = {}) {

                // Cập nhật filters nếu chưa có giá trị
                const defaultFilters = {
                    minPrice: 0,
                    maxPrice: 1000000000,
                    company: '%',
                    typename: '%',
                    cpu: '%',
                    inches: 0
                };

                // Kết hợp filters truyền vào và các giá trị mặc định
                const finalFilters = {
                    ...defaultFilters,
                    ...filters
                };

                const url = 'http://localhost:8000/api/sanphams'; // URL API

                // Cập nhật finalFilters để thêm các tham số phân trang
                const queryParams = new URLSearchParams(finalFilters);
                queryParams.append('page', page);
                queryParams.append('perPage', 12); // Số sản phẩm trên mỗi trang

                // In ra URL để kiểm tra
                console.log('Loading products with query:', queryParams.toString());

                // In ra URL đầy đủ để kiểm tra
                const fullUrl = `${url}?${queryParams.toString()}`;
                console.log('Full URL with query parameters:', fullUrl); // Log ra URL đầy đủ
                // Gửi yêu cầu GET với query params
                fetch(`${url}?${queryParams.toString()}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('API response data:', data);
                        const productGrid = document.querySelector('.product-grid');
                        productGrid.innerHTML = ''; // Xóa sản phẩm cũ trước khi tải sản phẩm mới

                        data.forEach(product => {
                            const productItem = document.createElement('div');
                            productItem.classList.add('product-item');
                            // Thêm sự kiện click để lưu data-masp
                            productItem.addEventListener('click', () => {
                                localStorage.setItem('selectedMasp', product.masp);
                                // Điều hướng sang trang khác nếu cần
                                window.location.href = '/product-detail';
                            });
                            const image = document.createElement('img');
                            image.src = product.url_hinh || "/images/laptop1.png";
                            image.onerror = function() {
                                image.src = "/images/laptop1.png";
                            };
                            image.alt = product.tensanpham;

                            const productName = document.createElement('h4');
                            productName.textContent = product.tensanpham;

                            const productprice = document.createElement('b');
                            productprice.textContent = product.giaban + " $";

                            const productDescription = document.createElement('p');
                            productDescription.textContent = 'Mô tả sản phẩm';

                            productItem.appendChild(image);
                            productItem.appendChild(productName);
                            productItem.appendChild(productprice);
                            productItem.appendChild(productDescription);
                            productGrid.appendChild(productItem);
                        });

                        updatePagination(page, data.length); // Cập nhật phân trang
                    })
                    .catch(error => {
                        console.error('Lỗi khi lấy dữ liệu từ API:', error);
                    });
            }

            function updatePagination(page, totalItems) {
                // Cập nhật trang hiện tại
                const pageNumbers = document.querySelectorAll('.page-number');
                pageNumbers.forEach(button => {
                    button.classList.remove('active');
                    if (parseInt(button.dataset.page) === page) {
                        button.classList.add('active');
                    }
                });

                // Cập nhật nút "prev" và "next"
                const prevButton = document.getElementById('prev-page');
                const nextButton = document.getElementById('next-page');

                prevButton.disabled = page === 1;
                nextButton.disabled = page * 10 >= totalItems; // Giả sử mỗi trang có 10 sản phẩm

                // Cập nhật trạng thái của các nút phân trang (prev, next)
                prevButton.onclick = function() {
                    if (page > 1) {
                        loadProducts(page - 1);
                    }
                };
                nextButton.onclick = function() {
                    if (page * 10 < totalItems) {
                        loadProducts(page + 1);
                    }
                };
            }

            // Lắng nghe sự kiện click vào các trang phân trang
            document.querySelectorAll('.page-number').forEach(button => {
                button.addEventListener('click', function() {
                    const page = parseInt(this.dataset.page);
                    currentPage = page;
                    loadProducts(page);
                });
            });

            // Tải sản phẩm cho trang đầu tiên khi load trang
            loadProducts(currentPage);
        </script>





        <!-- FAQ Section -->
        <section class="faq-news">
            <div class="faq">
                <h2>CÂU HỎI THƯỜNG GẶP</h2>
                <div class="faq-item">abc <span>&gt;</span></div>
                <div class="faq-item">abc <span>&gt;</span></div>
                <div class="faq-item">abc <span>&gt;</span></div>
                <div class="faq-item">abc <span>&gt;</span></div>
            </div>
            <div class="news">
                <h2>Tin tức về sản phẩm</h2>
                <div class="news-placeholder"></div>
            </div>
        </section>

        <section class="q-and-a">
            <h2>Hỏi và đáp</h2>
            <div class="qa-placeholder"></div>
        </section>
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
                    <img src="/images/cachthucthanhtoan.png" alt="Payment" class="payment-image" />
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