<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/css/admin/DNadmin.css">

</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                <div class="show-password">
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Xem mật khẩu</label>
                </div>
            </div>
            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>
        <a href="#" class="forgot-password">Quên mật khẩu?</a>
    </div>
</body>
</html>
