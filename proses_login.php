<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }

        .success h2 {
            color: #28a745;
        }

        .failed h2 {
            color: #dc3545;
        }

        h2 {
            margin-bottom: 15px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            margin: 5px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $login_berhasil = false;
    $file = 'data_users.txt';
    if (file_exists($file)) {
        $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            $data = explode('|', $user);
            if (count($data) >= 3 && $data[0] == $nama && $data[2] == $password) {
                $login_berhasil = true;
                break;
            }
        }
    }

    if ($login_berhasil) {
        echo '<div class="container success">';
        echo '<h2>Login Berhasil!</h2>';
        echo '<p>Selamat datang, <strong>' . htmlspecialchars($nama) . '</strong>!</p>';
        echo '<a href="login.php" class="btn btn-success">Kembali</a>';
        echo '<a href="lihat.php" class="btn btn-primary">Lihat Data</a>';
        echo '</div>';
    } else {
        echo '<div class="container failed">';
        echo '<h2>Login Gagal!</h2>';
        echo '<p>Nama atau password salah.<br>Pastikan Anda sudah mendaftar terlebih dahulu.</p>';
        echo '<a href="login.php" class="btn btn-danger">Coba Lagi</a>';
        echo '<a href="pendaftaran.php" class="btn btn-primary">Daftar</a>';
        echo '<a href="login.php" class="btn btn-success">Kembali</a>';
        echo '</div>';
    }
    ?>
</body>

</html>