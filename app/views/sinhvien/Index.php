<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>

<style>
/* *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: Arial, Helvetica, sans-serif;
}

body{
background: #f4f6f9;
padding: 40px;
}

h1{
text-align: center;
margin-bottom: 30px;
color: #333;
} */

table{
width: 80%;
margin: auto;
border-collapse: collapse;
background: white;
box-shadow: 0 0 10px rgba(0,0,0,0.1);
border-radius: 10px;
overflow: hidden;
}

table th{
background: #007bff;
color: white;
padding: 15px;
text-align: center;
}

table td{
padding: 12px;
text-align: center;
border-bottom: 1px solid #ddd;
}

table tr:hover{
background: #f1f1f1;
transition: 0.3s;
}

table tr:last-child td{
border-bottom: none;
}

          .pagination {
            margin-top: 25px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 14px;
            margin: 0 4px;
            text-decoration: none;
            color: #4f46e5;
            background-color: white;
            border: 1px solid #4f46e5;
            border-radius: 6px;
            font-weight: 500;
        }

        .pagination a:hover {
            background-color: #4f46e5;
            color: white;
            transition: 0.2s;
        }
</style>
</head>

<body>

    <h1>Danh sách sinh viên</h1>
    <h1><?php echo $title; ?></h1>

<table>
<tr>
<th>ID</th>
<th>MSSV</th>
<th>Họ tên</th>
<th>Giới tính</th>
<th>Hành động</th>
</tr>

    <?php foreach ($sinhvien as $index => $sinhvien): ?>
    <?php foreach ($sinhvien as $sinhvien): ?>
<tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $sinhvien['ID']; ?></td>
            <td><?php echo $sinhvien['MSSV']; ?></td>
            <td><?php echo $sinhvien['Hoten']; ?></td>
            <td><?php echo $sinhvien['Gioitinh']; ?></td>
            <td>
                <a href="/sinhvien/edit/<?php echo $sinhvien['ID']; ?>" class="btn-edit">
                        Sửa
                </a>

                <a href="/sinhvien/delete/<?php echo $sinhvien['ID']; ?>" class="btn-delete"
                        onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                        Xóa
                </a>
            </td>
</tr>
<?php endforeach; ?>

</table>

    <div class="pagination">
        <?php
        $pagesize = 5;

        for ($i = 1; $i <= $totalPage; $i++) {
            $offset = ($i - 1) * $pagesize;

            echo "<a href='/sinhvien/index/$pagesize/$offset'>$i</a> ";
            
        }
        ?>
    </div>
</body>
</html>