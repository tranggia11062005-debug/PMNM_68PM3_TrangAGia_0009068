<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1><?php echo $title; ?> </h1>
    <table>

        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
        </tr>
        <?php foreach ($sinhviens as $sv): ?>
            <tr>
                <td><?php echo $sv['id']; ?></td>
                <td><?php echo $sv['hoten']; ?></td>
                <td><?php echo $sv['gioitinh']; ?></td>
                <td><?php echo $sv['mssv']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

