<!DOCTYPE html>
<html lang="en">
<style>
  /* CSS cho bảng */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table th,
  table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }

  table th {
    background-color: #f4f4f4;
    font-weight: bold;
  }

  /* CSS cho hình ảnh trong bảng */
  table td img {
    max-width: 100px;
    height: auto;
    border-radius: 8px;
    /* Bo tròn góc hình ảnh */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Hiệu ứng đổ bóng */
  }

  /* CSS cho input */
  table td input[type="text"],
  table td input[type="number"] {
    width: 80%;
    /* Giới hạn chiều rộng input */
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-align: center;
  }

  /* CSS cho button */
  table td button {
    padding: 5px 10px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  /* Màu sắc nút lưu */
  table td button.btn-success {
    background-color: #28a745;
    color: #fff;
  }

  table td button.btn-success:hover {
    background-color: #218838;
  }
</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NovaLap | Sản phẩm</title>
  <!-- Thêm CSS của DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <!-- DataTables responsive CSS -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- DataTables Buttons CSS -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="home" class="nav-link">Sản phẩm</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->



        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NovaLap</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Trang chủ
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="order" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Đơn hàng

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Hóa đơn

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="product" class="nav-link">
                <i class="nav-icon fas fa-laptop"></i>
                <p>
                  Sản phẩm

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="customer" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Khách hàng

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="employee" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Nhân viên

                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-retweet"></i>
                <p>
                  Giao dịch
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nhập hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Chuyển kho</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                  Kho hàng

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="discount" class="nav-link">
                <i class="nav-icon fas fa-percent"></i>
                <p>
                  Khuyến mại

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-code-branch"></i>
                <p>
                  Chi nhánh

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="account" class="nav-link">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Tài khoản

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
              </a>
            </li>


        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Sản phẩm</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Quản lý sản phẩm</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="row mb-3">
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="filterEngine" placeholder="Tìm kiếm">
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-success" id="searchBtn">Tìm kiếm</button>
                    </div>
                    <div class="col-md-3 offset-md-3 text-right">
                      <button class="btn btn-success" onclick="openProductModal()">Thêm mới</button>
                    </div>
                  </div>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Hình ảnh</th>
                        <th>Mã sản phẩm</th>
                        <th>Sản phẩm</th>
                        <th>Giá vốn</th>
                        <th>Giá bán</th>
                        <th>Tồn kho</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody id="productTableBody">
                      <!-- Các dòng sẽ được thêm vào đây qua JavaScript -->
                    </tbody>
                  </table>

                  <script>
                    document.getElementById('searchBtn').addEventListener('click', function() {
                      // Lấy giá trị từ ô nhập liệu
                      const tensanpham = document.getElementById('filterEngine').value;

                      // Kiểm tra nếu có giá trị tìm kiếm
                      if (tensanpham) {
                        console.log('Đang tìm kiếm với từ khóa:', tensanpham);

                        // Hàm để lấy dữ liệu từ API và cập nhật bảng
                        async function fetchProductData() {
                          try {
                            const response = await fetch(`http://localhost:8000/api/sanphams?tensanpham=${tensanpham}`); // Thay đổi URL API của bạn để chấp nhận tham số tìm kiếm
                            const products = await response.json(); // Dữ liệu trả về từ API (dưới dạng JSON)

                            // Gọi hàm cập nhật bảng với dữ liệu
                            updateProductTable(products);
                          } catch (error) {
                            console.error('Lỗi khi lấy dữ liệu:', error);
                          }
                        }

                        fetchProductData();
                      } else {

                        console.log('Vui lòng nhập từ khóa tìm kiếm!');
                      }
                    });
                  </script>
                  <script>
                    // Hàm để lấy dữ liệu từ API và cập nhật bảng
                    async function fetchProductData() {
                      try {
                        const response = await fetch('http://localhost:8000/api/sanphams'); // Thay đổi URL API của bạn
                        const products = await response.json(); // Dữ liệu trả về từ API (dưới dạng JSON)

                        // Gọi hàm cập nhật bảng với dữ liệu
                        updateProductTable(products);
                      } catch (error) {
                        console.error('Lỗi khi lấy dữ liệu:', error);
                      }
                    }

                    // Hàm cập nhật bảng với dữ liệu sản phẩm
                    function updateProductTable(products) {
                      const tableBody = document.getElementById('productTableBody'); // Lấy tbody của bảng
                      tableBody.innerHTML = ''; // Xóa dữ liệu cũ trong bảng

                      // Lấy giá trị tìm kiếm từ ô nhập liệu
                      const filterValue = document.getElementById('filterEngine').value.toLowerCase();

                      // Duyệt qua từng sản phẩm và thêm vào bảng
                      products.forEach(product => {
                        // Kiểm tra nếu tên sản phẩm hoặc mã sản phẩm khớp với từ khóa tìm kiếm
                        if (product.tensanpham.toLowerCase().includes(filterValue) || product.masp.toLowerCase().includes(filterValue)) {
                          const row = document.createElement('tr'); // Tạo một dòng mới

                          // Thêm các cột với khả năng chỉnh sửa
                          row.innerHTML = `
          <td>
            <img src="${product.url_hinh}" alt="Hình ảnh sản phẩm" class="img-thumbnail" style="max-width: 100px;">
          </td>
          <td>${product.masp}</td>
          <td><input type="text" value="${product.tensanpham}" data-id="${product.masp}" data-field="tensanpham"></td>
          <td><input type="number" value="${(product.giaban * 1.5).toFixed(2)}" data-id="${product.masp}" data-field="giavon"></td>
          <td><input type="number" value="${product.giaban.toFixed(2)}" data-id="${product.masp}" data-field="giaban"></td>
          <td><input type="number" value="10" data-id="${product.masp}" data-field="tonkho"></td>
          <td>
            <button class="btn btn-success btn-sm" onclick="saveProduct(${product.masp})">Lưu</button>
          </td>
        `;

                          // Thêm dòng vào bảng
                          tableBody.appendChild(row);
                        }
                      });
                    }

                    // Hàm lưu dữ liệu chỉnh sửa
                    async function saveProduct(masp) {
                      const inputs = document.querySelectorAll(`input[data-id="${masp}"]`);
                      const updatedData = {};

                      // Lấy dữ liệu từ các input
                      inputs.forEach(input => {
                        const field = input.dataset.field;
                        updatedData[field] = input.value;
                      });

                      // Gửi dữ liệu chỉnh sửa đến API
                      try {
                        const response = await fetch(`http://localhost:8000/api/sanphams/${masp}`, {
                          method: 'PUT', // Hoặc PATCH tùy theo API của bạn
                          headers: {
                            'Content-Type': 'application/json',
                          },
                          body: JSON.stringify(updatedData),
                        });

                        if (response.ok) {
                          alert('Cập nhật thành công!');
                          fetchProductData(); // Tải lại dữ liệu
                        } else {
                          console.error('Lỗi khi cập nhật sản phẩm:', response.statusText);
                        }
                      } catch (error) {
                        console.error('Lỗi khi gửi yêu cầu cập nhật:', error);
                      }
                    }


                    // Gọi hàm để bắt đầu lấy dữ liệu
                    fetchProductData();
                  </script>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2024 <a href="https://adminlte.io">NovaLap</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">

      </div>
    </footer>
    <!-- Modal Thêm sản phẩm mới -->
    <!-- Modal Thêm/Sửa sản phẩm -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addProductModalLabel">Thông tin sản phẩm mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addProductForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tensanpham">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tensanpham" placeholder="Nhập tên sản phẩm">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="company">Công ty</label>
                    <input type="text" class="form-control" id="company" placeholder="Nhập tên công ty">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="typename">Loại sản phẩm</label>
                    <select class="form-control" id="typename">
                      <option value="">Đẹp</option>
                      <option value="">Xấu</option>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inches">Kích thước màn hình</label>
                    <input type="number" class="form-control" id="inches" placeholder="Nhập kích thước màn hình">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sreenresolution">Độ phân giải màn hình</label>
                    <input type="text" class="form-control" id="sreenresolution" placeholder="Nhập độ phân giải màn hình">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpu">CPU</label>
                    <input type="text" class="form-control" id="cpu" placeholder="Nhập CPU">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ram">RAM</label>
                    <input type="text" class="form-control" id="ram" placeholder="Nhập dung lượng RAM">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="memory">Bộ nhớ</label>
                    <input type="text" class="form-control" id="memory" placeholder="Nhập bộ nhớ">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gpu">GPU</label>
                    <input type="text" class="form-control" id="gpu" placeholder="Nhập GPU">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="weight">Cân nặng</label>
                    <input type="text" class="form-control" id="weight" placeholder="Nhập cân nặng">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="giaban">Giá bán</label>
                    <input type="number" class="form-control" id="giaban" placeholder="Nhập giá bán">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <textarea class="form-control" id="mota" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="productImage">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="productImage" accept="image/*" onchange="previewImage(event)">
                <div class="mt-2">
                  <img id="productImagePreview" src="#" alt="Xem trước ảnh" style="max-width: 100%; max-height: 200px; display: none;">
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button id="ThemSanPham" type="button" class="btn btn-primary" id="saveProductBtn">Lưu sản phẩm</button>

            <script>
              document.getElementById('ThemSanPham').addEventListener('click', function() {
                // Lấy các giá trị từ form
                const tensanpham = document.getElementById('tensanpham').value;
                const company = document.getElementById('company').value;
                const typename = document.getElementById('typename').value;
                const inches = document.getElementById('inches').value;
                const sreenresolution = document.getElementById('sreenresolution').value;
                const cpu = document.getElementById('cpu').value;
                const ram = document.getElementById('ram').value;
                const memory = document.getElementById('memory').value;
                const gpu = document.getElementById('gpu').value;
                const weight = document.getElementById('weight').value;
                const giaban = document.getElementById('giaban').value;
                const mota = document.getElementById('mota').value;
                const productImage = document.getElementById('productImage').files[0];



                // Tạo FormData để gửi dữ liệu
                const formData = new FormData();
                formData.append('data', JSON.stringify({
                  tensanpham: tensanpham,
                  commpany: company,
                  typename: typename,
                  inches: inches,
                  sreenresolution: sreenresolution,
                  cpu: cpu,
                  ram: ram,
                  memory: memory,
                  gpu: gpu,
                  weight: weight,
                  giaban: giaban,
                  mota: mota
                }));

                // Nếu có ảnh sản phẩm, thêm vào FormData
                if (productImage) {
                  formData.append('image', productImage); // Trường image chứa file ảnh
                }

                function getCookie(name) {
                  let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                  return match ? match[2] : null; // Trả về giá trị cookie hoặc null nếu không tìm thấy
                }
                const yourToken = getCookie('auth_token');

                if (!yourToken) {
                  alert('Không tìm thấy token đăng nhập!');
                  return;
                }

                // Gửi request đến API
                fetch('http://localhost:8000/api/sanpham/create', {
                    method: 'POST',
                    body: formData,
                    headers: {
                      'Authorization': `Bearer ${yourToken}`, // Thêm token vào header
                    }
                  })
                  .then(response => response.json())
                  .then(data => {
                    if (data.id) {
                      alert('Sản phẩm đã được thêm thành công với mã sản phẩm: ' + data.id);
                    } else {
                      alert('Có lỗi xảy ra khi thêm sản phẩm!');
                    }
                  })
                  .catch(error => {
                    console.error('Lỗi:', error);
                    alert('Đã có lỗi xảy ra khi gửi yêu cầu!');
                  });
              });
            </script>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal xóa sản phẩm mới -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteConfirmModalLabel">Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Bạn có chắc chắn muốn xóa sản phẩm này không?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

  <!-- Sparkline -->
  <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>

  <!-- JQVMap -->
  <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

  <!-- jQuery Knob Chart -->
  <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

  <!-- daterangepicker -->
  <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

  <!-- Summernote -->
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

  <!-- overlayScrollbars -->
  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.js')}}"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

  <script>
    // Mở modal: Thêm mới hoặc Sửa sản phẩm
    function openProductModal(product = null) {
      if (product) {
        // Sửa sản phẩm: Điền thông tin vào form
        document.getElementById('tensanpham').value = product.name;
        document.getElementById('company').value = product.company;
        document.getElementById('typename').value = product.type;
        document.getElementById('inches').value = product.screenSize;
        document.getElementById('sreenresolution').value = product.screenResolution;
        document.getElementById('cpu').value = product.cpu;
        document.getElementById('ram').value = product.ram;
        document.getElementById('memory').value = product.memory;
        document.getElementById('gpu').value = product.gpu;
        document.getElementById('weight').value = product.weight;
        document.getElementById('giaban').value = product.price;
        document.getElementById('mota').value = product.description;
        document.getElementById('promo').value = product.promo;

        // Cập nhật giao diện modal
        document.getElementById('addProductModalLabel').innerText = 'Sửa sản phẩm';
        document.getElementById('saveProductBtn').innerText = 'Cập nhật sản phẩm';

        // Gán hàm `updateProduct` khi nhấn nút Lưu
        document.getElementById('saveProductBtn').setAttribute('onclick', `updateProduct(${product.id})`);
      } else {
        // Thêm mới sản phẩm: Làm trống form
        document.getElementById('addProductForm').reset();

        // Cập nhật giao diện modal
        document.getElementById('addProductModalLabel').innerText = 'Thêm sản phẩm mới';
        // document.getElementById('saveProductBtn').innerText = 'Lưu sản phẩm';

        // Gán hàm `saveProduct` khi nhấn nút Lưu
        //  document.getElementById('saveProductBtn').setAttribute('onclick', 'saveProduct()');
      }

      // Mở modal
      $('#addProductModal').modal('show');
    }



    // Cập nhật sản phẩm đã có
    function updateProduct(id) {
      const productData = collectFormData();
      console.log('Đang cập nhật sản phẩm ID:', id, 'Với dữ liệu:', productData);
      // Gửi yêu cầu cập nhật sản phẩm đến backend
      $('#addProductModal').modal('hide');
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('ThemSanPham').addEventListener('click', function(event) {
        event.preventDefault(); // Ngừng hành động mặc định của form

        // Kiểm tra xem tất cả các trường nhập có hợp lệ không
        const productData = {
          tensanpham: document.getElementById('tensanpham').value,
          Commpany: document.getElementById('company').value,
          typename: document.getElementById('typename').value,
          inches: document.getElementById('inches').value,
          sreenresolution: document.getElementById('sreenresolution').value,
          cpu: document.getElementById('cpu').value,
          ram: document.getElementById('ram').value,
          memory: document.getElementById('memory').value,
          gpu: document.getElementById('gpu').value,
          Weight: document.getElementById('weight').value,
          giaban: document.getElementById('giaban').value,
          mota: document.getElementById('mota').value
        };

        // Lấy tệp ảnh từ input file
        const imageFile = document.getElementById('image').files[0];
        if (!imageFile) {
          alert('Vui lòng chọn một tệp ảnh');
          return;
        }

        // Tạo một FormData object
        const formData = new FormData();
        formData.append('data', JSON.stringify(productData)); // Thêm dữ liệu JSON
        formData.append('image', imageFile); // Thêm tệp ảnh

        // Gửi yêu cầu POST
        fetch('http://localhost:8000/api/sanphams', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            console.log('Phản hồi từ server:', data);
            if (data.success) {
              alert('Sản phẩm đã được thêm thành công!');
            } else {
              alert('Có lỗi xảy ra: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi khi gửi yêu cầu.');
          });
      });
    });



    function saveProduct() {
      const productData = collectFormData();
      console.log('Dữ liệu sản phẩm:', JSON.stringify(productData, null, 2));
      // Thực hiện thêm xử lý lưu hoặc gửi dữ liệu ở đây
    }
    let productToDelete = null;

    // Mở modal xác nhận xóa
    function confirmDeleteProduct(productId) {
      productToDelete = productId; // Lưu ID sản phẩm cần xóa
      $('#deleteConfirmModal').modal('show'); // Hiển thị modal xác nhận
    }

    // Xóa sản phẩm
    function deleteProduct() {
      if (productToDelete) {
        console.log('Đang xóa sản phẩm ID:', productToDelete);

        // Xóa sản phẩm trên giao diện
        const row = document.querySelector(`#productTable tr[data-id="${productToDelete}"]`);
        if (row) row.remove();

        // Thực hiện yêu cầu xóa sản phẩm trên backend (tùy thuộc vào ứng dụng của bạn)
        // Ví dụ: Gửi API xóa sản phẩm

        // Ẩn modal xác nhận
        $('#deleteConfirmModal').modal('hide');
        productToDelete = null; // Reset trạng thái
      }
    }

    // Gán sự kiện cho nút Xóa trong modal
    document.getElementById('confirmDeleteBtn').addEventListener('click', deleteProduct);

    //hình ảnh
    // Hàm hiển thị ảnh xem trước
    function previewImage(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const preview = document.getElementById('productImagePreview');
          preview.src = e.target.result; // Gán ảnh vào thẻ <img>
          preview.style.display = 'block'; // Hiển thị ảnh
        };
        reader.readAsDataURL(file); // Đọc file dưới dạng URL
      }
    }
  </script>




  <form id="logout-form" action="" method="POST" class="d-none">
    @csrf
  </form>

</body>

</html>