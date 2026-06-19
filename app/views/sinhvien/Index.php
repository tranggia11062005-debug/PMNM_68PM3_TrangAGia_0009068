<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Quản lý sinh viên" ?></title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f6f9;
        }

       .container{
    width:95%;
    margin:20px auto;
}

        h1{
            text-align:center;
            color:#333;
            margin-bottom:30px;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
            flex-wrap:wrap;
            gap:15px;
        }

        .search-box{
            display:flex;
            gap:10px;
        }

        .search-box input{
            width:300px;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .search-box button{
            padding:10px 18px;
            background:#0d6efd;
            color:#fff;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        .search-box button:hover{
            background:#0b5ed7;
        }

        .btn-add{
            padding:10px 18px;
            background:#198754;
            color:#fff;
            text-decoration:none;
            border-radius:5px;
        }

        .btn-add:hover{
            background:#157347;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:#fff;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        table thead{
            background:#0d6efd;
            color:#fff;
        }

        table th,
        table td{
            padding:14px;
            border:1px solid #ddd;
            text-align:center;
        }

        table tbody tr:hover{
            background:#f5f5f5;
        }

        .btn-edit{
            background:#ffc107;
            color:#000;
            padding:6px 12px;
            border-radius:5px;
            text-decoration:none;
        }

        .btn-delete{
            background:#dc3545;
            color:#fff;
            padding:6px 12px;
            border-radius:5px;
            text-decoration:none;
            margin-left:5px;
        }

        .btn-edit:hover{
            background:#e0a800;
        }

        .btn-delete:hover{
            background:#bb2d3b;
        }

        .pagination{
            margin-top:30px;
            text-align:center;
        }

        .pagination a{
            display:inline-block;
            padding:10px 15px;
            margin:0 5px;
            border:1px solid #0d6efd;
            color:#0d6efd;
            text-decoration:none;
            border-radius:5px;
        }

        .pagination a:hover{
            background:#0d6efd;
            color:#fff;
        }

        .success{
            background:#d1e7dd;
            color:#0f5132;
            padding:15px;
            border-radius:5px;
            margin-bottom:20px;
        }

        .error{
            background:#f8d7da;
            color:#842029;
            padding:15px;
            border-radius:5px;
            margin-bottom:20px;
        }
        .btn-reset{
    padding:10px 18px;
    background:#6c757d;
    color:white;
    text-decoration:none;
    border-radius:6px;
    transition:.3s;
}

.btn-reset:hover{
    background:#5a6268;
}
        
    </style>

</head>

<body>

<div class="container">

    <h1>Quản lý sinh viên</h1>

    <?php if(isset($_SESSION['success'])): ?>

        <div class="success">
            <?= $_SESSION['success']; ?>
        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>


    <?php if(isset($_SESSION['error'])): ?>

        <div class="error">
            <?= $_SESSION['error']; ?>
        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>


    <div class="top">

        <form class="search-box" method="GET">

            <input
                type="text"
                name="search"
                placeholder="Tìm kiếm sinh viên..."
                value="<?= htmlspecialchars($search ?? '') ?>">

            <button type="submit">
                Tìm kiếm
            </button>
            <a href="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien"
       class="btn-reset">
        Reset
    </a>

        </form>

        <a class="btn-add"
           href="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien/create">
            + Thêm sinh viên
        </a>

    </div>


    <table>

        <thead>

        <tr>
            <th>ID</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Lớp</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Giới tính</th>
            <th>Hành động</th>
        </tr>

        </thead>

        <tbody>

        <?php if(empty($sinhviens)): ?>

            <tr>

                <td colspan="8">

                    Không có dữ liệu sinh viên.

                </td>

            </tr>

        <?php else: ?>

            <?php foreach($sinhviens as $index => $sv): ?>

                <tr>

                    <td><?= $sv['id'] ?></td>

                    <td><?= $sv['ma_sv'] ?></td>

                    <td><?= $sv['ho_ten'] ?></td>

                    <td><?= htmlspecialchars($sv['ten_lop'] ?? 'Chưa có lớp') ?></td>

                    <td><?= $sv['ngay_sinh'] ?></td>

                    <td><?= $sv['dia_chi'] ?></td>

                    <td><?= $sv['gioi_tinh'] ?></td>

                    <td>

                        <a class="btn-edit"
                           href="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien/edit/<?= $sv['id'] ?>">
                            Sửa
                        </a>

                        <a class="btn-delete"
                           href="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien/delete/<?= $sv['id'] ?>"
                           onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                            Xóa
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

        </tbody>

    </table>

    <div class="pagination">

        <?php for($i=1;$i<=$totalPages;$i++): ?>

            <a href="?page=<?= $i ?>&search=<?= urlencode($search ?? '') ?>">
                <?= $i ?>
            </a>

        <?php endfor; ?>

    </div>

</div>

</body>

</html>