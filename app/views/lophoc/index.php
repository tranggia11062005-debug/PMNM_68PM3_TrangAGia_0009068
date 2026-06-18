<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PMNM_68PM3_TrangAGia_0009068/app/views/lophoc/index.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Danh sách lớp học</h1>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="success"><?= $_SESSION['success']; ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div class="top">
        <form class="search-box" method="GET">
            <input type="text" name="search" placeholder="Nhập tên lớp học..." value="<?= htmlspecialchars($search ?? '') ?>">
            <button type="submit">Tìm kiếm</button>
            <a href="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc" class="btn-reset">Reset</a>
        </form>
        <div></div> <a class="btn-add" href="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc/create">+ Thêm lớp</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên lớp</th>
                <th>Sĩ số</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($lophocs)): ?>
                <tr><td colspan="4">Không có dữ liệu lớp học.</td></tr>
            <?php else: ?>
                <?php foreach($lophocs as $lop): ?>
                <tr>
                    <td><?= $lop['id'] ?></td>
                    <td><?= $lop['ten_lop'] ?></td>
                    <td><?= $lop['si_so'] ?></td>
                    <td>
                        <a class="btn-edit" href="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc/edit/<?= $lop['id'] ?>">Sửa</a>
                        <a class="btn-delete" href="/PMNM_68PM3_TrangAGia_0009068/public/LopHoc/delete/<?= $lop['id'] ?>" 
                           onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>