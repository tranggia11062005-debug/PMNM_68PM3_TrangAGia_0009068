<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h3>Đăng nhập</h3>
                </div>

                <div class="card-body">

                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <form action="/PMNM_68PM3_TrangAGia_0009068/public/Auth/login" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Tài khoản</label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                value="<?= $_POST['username'] ?? '' ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Đăng nhập
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>