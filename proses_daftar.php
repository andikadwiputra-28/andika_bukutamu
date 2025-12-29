<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
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
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #28a745;
            margin-bottom: 20px;
        }

        .data-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #eee;
        }

        .data-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .data-item:last-child {
            border-bottom: none;
        }

        .data-label {
            font-weight: bold;
            color: #333;
        }

        .data-value {
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            margin: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pendaftaran Berhasil!</h2>

        <?php
        $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $tanggal = date('Y-m-d H:i:s');

        // Simpan data ke file
        if (!empty($nama) && !empty($email) && !empty($password)) {
            $data = $nama . "|" . $email . "|" . $password . "|" . $tanggal . "\n";
            file_put_contents('data_users.txt', $data, FILE_APPEND);
        }

        echo '<div class="data-card">';
        echo '<div class="data-item"><span class="data-label">Nama</span><span class="data-value">' . $nama . '</span></div>';
        echo '<div class="data-item"><span class="data-label">Email</span><span class="data-value">' . $email . '</span></div>';
        echo '<div class="data-item"><span class="data-label">Password</span><span class="data-value">' . str_repeat('*', strlen($password)) . '</span></div>';
        echo '</div>';
        ?>

        <a href="pendaftaran.php" class="btn btn-primary">Daftar Lagi</a>
        <a href="login.php" class="btn btn-success">Login</a>
        <a href="lihat.php" class="btn btn-info">Lihat Data</a>
    </div>
</body>

</html>