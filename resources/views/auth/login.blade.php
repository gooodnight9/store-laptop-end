<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NovaLap | Đăng nhập</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Nova</b>Lap</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">ĐĂNG NHẬP</p>

        <form id="login-form" action="/home" method="post">
          @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control" placeholder="Mật khẩu" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- Thông báo lỗi -->
          <div id="error-message" style="color: red; display: none;"></div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Nhớ mật khẩu
                </label>
              </div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngừng hành động mặc định của form

        // Lấy giá trị của email và mật khẩu từ các trường nhập
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Gửi yêu cầu POST đến API login
        fetch('http://localhost:8000/api/loginAdmin', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              email: email,
              password: password
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.message === 'Mã OTP đã được gửi đến email của bạn') {
              localStorage.setItem('email', email);
              localStorage.setItem('password', password);
              window.location.href = '/otp';
            } else {
              // Hiển thị thông báo lỗi nếu đăng nhập thất bại
              const errorMessage = document.getElementById('error-message');
              errorMessage.textContent = data.message;
              errorMessage.style.display = 'block';
            }
          })
          .catch(error => {
            console.error('Error:', error);
            const errorMessage = document.getElementById('error-message');
            errorMessage.textContent = 'Đã có lỗi xảy ra. Vui lòng thử lại.';
            errorMessage.style.display = 'block';
          });
      });
    });
  </script>

  <!-- /.social-auth-links -->

  <p class="mb-1">
    <a href="/quenmatkhau">Quên mật khẩu</a>
  </p>
  </div>
  <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('/dist/js/adminlte.min.js')}}"></script>

</body>

</html>