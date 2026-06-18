<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PMNM_68PM3_TrangAGia_0009068/app/views/home/register.css">
    <title>Document</title>
</head>
<body>
    <div class="auth-container">
    <h1>Đăng ký tài khoản</h1>
    
    <form action="/PMNM_68PM3_TrangAGia_0009068/public/Auth/handleRegister" method="POST">
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="full_name" required>
        </div>
        
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Đăng ký</button>
        
        <div class="auth-link">
            <span>Đã có tài khoản? </span>
            <a href="/PMNM_68PM3_TrangAGia_0009068/public/Auth/login">Đăng nhập</a>
        </div>
    </form>
</div>
</body>
</html>