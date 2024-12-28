<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Mã OTP</title>
    <link rel="stylesheet" href="/css/user/MaOTP.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Thêm sự kiện cho nút xác nhận OTP
            document.querySelector('.btn').addEventListener('click', function() {
                let otp = '';
                const otpInputs = document.querySelectorAll('.otp-input');

                // Lấy giá trị OTP từ các input và kiểm tra tính hợp lệ
                otpInputs.forEach(input => {
                    otp += input.value;
                });

                if (otp.length !== 6 || !/^\d{6}$/.test(otp)) {
                    alert('Vui lòng nhập đầy đủ mã OTP gồm 6 chữ số');
                    return;
                }

                const email = localStorage.getItem('email');

                fetch('http://localhost:8000/api/verifyOtp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            email: email,
                            otp: otp
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Đăng nhập thành công!') {
                            const token = data.token;
                            document.cookie = `auth_token=${token}; path=/; max-age=${60 * 60}; secure; samesite=strict`;
                            window.location.href = '/home';
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Có lỗi xảy ra:', error);
                        alert('Xác thực OTP thất bại!');
                    });
            });

            // Xử lý sự kiện gửi lại OTP
            document.querySelector('.resend-link').addEventListener('click', function(e) {
                e.preventDefault();
                const email = localStorage.getItem('email');
                const password = localStorage.getItem('password');

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
                        if (data.message === 'Mã OTP đã được gửi lại!') {
                            alert('Mã OTP mới đã được gửi đến điện thoại của bạn.');
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Có lỗi xảy ra khi gửi lại OTP:', error);
                        alert('Có lỗi xảy ra khi gửi lại mã OTP.');
                    });
            });
        });
    </script>
</head>

<body>
    <div class="otp-container">
        <h2>Xác minh OTP</h2>
        <p>Vui lòng nhập mã OTP gồm 6 chữ số được gửi đến email của bạn.</p>
        <div class="otp-input-group">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
        </div>
        <button class="btn">Xác nhận</button>
        <a class="resend-link" href="#">Gửi lại mã OTP</a>
    </div>
</body>

</html>