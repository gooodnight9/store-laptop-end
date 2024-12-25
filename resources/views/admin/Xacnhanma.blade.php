<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Email</title>
    <link rel="stylesheet" href="/css/admin/Xacnhanma.css">
</head>
<body>
    <div class="email-container">
        <h2>Xác nhận mã</h2>
      <div class="ktra">
        <p>
          <em>Kiểm tra email và nhập mã xác nhận</em>
        </p>
      </div>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Mã xác nhận</label>
                <input type="email" id="email" name="email" placeholder="Nhận mã" required>
            </div>
            <button type="submit" class="btn-submit">Xác nhận</button>
        </form>
        <div class="separator"></div>
      <div class="dn">
        <p> Chưa nhận được mã? </p>
      </div>
        <a href="#" class="back-link">Gửi lại mã</a>
    </div>
</body>
</html>
