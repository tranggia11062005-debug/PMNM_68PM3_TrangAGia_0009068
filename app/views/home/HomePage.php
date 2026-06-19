<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Chủ</title>
    <style>
        .menu-container {
        display: flex;
        gap: 20px;
        margin-top: 30px;
        }

        .menu-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 80px;
            background-color: #f8f9fa;
            border: 2px solid #0d6efd;
            border-radius: 12px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .menu-card:hover {
            background-color: #0d6efd;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(13, 110, 253, 0.3);
        }

        .menu-card span {
            margin-top: 10px;
        }
        main {
                text-align: center;
                padding: 50px 20px;
            }

            h1 {
                color: #333;
                font-size: 2.5em;
            }
        </style>
    </head>
<body>
    <main>
        <h1>Chào mừng đến hệ thống quản lý sinh viên!</h1>
    </main>
     <div class="menu-container">
    <a href="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc" class="menu-card">
        <i class="fas fa-school"></i> <span>Quản lý lớp học</span>
    </a>
    <a href="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien" class="menu-card">
        <i class="fas fa-user-graduate"></i>
        <span>Quản lý sinh viên</span>
    </a>
</div>
</body>
</html>