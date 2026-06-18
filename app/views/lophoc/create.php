<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PMNM_68PM3_TrangAGia_0009068/app/views/lophoc/create.css">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <h1><?= $title ?></h1>

    <form action="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc/<?= $action ?>" method="POST">
        
        <div class="form-group">
            <label>Tên lớp</label>
            <input type="text" name="ten_lop" value="<?= $lophoc['ten_lop'] ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label>Sĩ số</label>
            <input type="number" name="si_so" value="<?= $lophoc['si_so'] ?? '' ?>" required>
        </div>

        <button type="submit">
            <?= $action == "store" ? "Thêm lớp học" : "Cập nhật lớp" ?>
        </button>

    </form>

    <a class="back" href="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc">
        ← Quay lại danh sách
    </a>
</div>
</body>
</html>