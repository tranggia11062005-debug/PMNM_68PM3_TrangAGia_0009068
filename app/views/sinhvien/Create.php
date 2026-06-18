<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
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
            width:500px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        h1{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
        }

        input[type=text],
        input[type=date]{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:15px;
        }

        input:focus{
            outline:none;
            border:1px solid #0d6efd;
        }

        .gender{
            display:flex;
            gap:20px;
            margin-top:8px;
        }

        .gender label{
            font-weight:normal;
        }

        button{
            width:100%;
            padding:12px;
            background:#0d6efd;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#0b5ed7;
        }

        .back{
            display:block;
            text-align:center;
            margin-top:15px;
            text-decoration:none;
            color:#0d6efd;
        }

        .back:hover{
            text-decoration:underline;
        }
    </style>

</head>

<body>

<div class="container">

    <h1><?= $title ?></h1>

   <form action="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien/<?= $action ?>" method="POST">

        <div class="form-group">
            <label>Mã sinh viên</label>
            <input
type="text"
name="ma_sv"
value="<?= $sinhvien['ma_sv'] ?? '' ?>"
required>
        </div>

        <div class="form-group">
            <label>Họ tên</label>
            <input
type="text"
name="ho_ten"
value="<?= $sinhvien['ho_ten'] ?? '' ?>"
required>
        </div>

        <div class="form-group">
            <label>Giới tính</label>

            <div class="gender">

                <label>
    <input
        type="radio"
        name="gioi_tinh"
        value="Nam"
        <?= (!isset($sinhvien) || ($sinhvien['gioi_tinh'] ?? '') == 'Nam') ? 'checked' : '' ?>>
    Nam
</label>

<label>
    <input
        type="radio"
        name="gioi_tinh"
        value="Nữ"
        <?= (($sinhvien['gioi_tinh'] ?? '') == 'Nữ') ? 'checked' : '' ?>>
    Nữ
</label>

            </div>

        </div>

        <div class="form-group">
            <label>Ngày sinh</label>

            <input
type="date"
name="ngay_sinh"
value="<?= $sinhvien['ngay_sinh'] ?? '' ?>"
required>

        </div>

        <div class="form-group">
            <label>Địa chỉ</label>

            <input
type="text"
name="dia_chi"
value="<?= $sinhvien['dia_chi'] ?? '' ?>"
required>

        </div>

        <div class="form-group">
    <label>Lớp</label>
    <select name="lop_id" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
        <option value="">-- Chọn lớp --</option>
        <?php foreach($lops as $lop): ?>
            <option value="<?= $lop['id'] ?>" 
                <?= (isset($sinhvien) && $sinhvien['lop_id'] == $lop['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($lop['ten_lop']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

      <button type="submit">
    <?= $action == "store" ? "Thêm sinh viên" : "Cập nhật" ?>
</button>

    </form>

    <a class="back"
       href="/PMNM_68PM3_TrangAGia_0009068/public/SinhVien">
        ← Quay lại danh sách
    </a>

</div>

</body>
</html>