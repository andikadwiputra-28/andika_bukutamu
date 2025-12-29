<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User Terdaftar</title>
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
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .no-data {
            text-align: center;
            padding: 40px;
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

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .total {
            text-align: right;
            margin-top: 15px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data User Terdaftar</h2>

        <div class="card">
            <?php
            $file = 'data_users.txt';

            if (file_exists($file) && filesize($file) > 0) {
                $users = file($file, FILE_IGNORE_NEW_LINES);
                $total = count($users);

                echo '<table>';
                echo '<tr>';
                echo '<th>No</th>';
                echo '<th>Nama</th>';
                echo '<th>Email</th>';
                echo '<th>Password</th>';
                echo '<th>Tanggal Daftar</th>';
                echo '</tr>';

                $no = 1;
                foreach ($users as $user) {
                    $data = explode('|', $user);
                    if (count($data) >= 4) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . htmlspecialchars($data[0]) . '</td>';
                        echo '<td>' . htmlspecialchars($data[1]) . '</td>';
                        echo '<td>' . str_repeat('*', strlen($data[2])) . '</td>';
                        echo '<td>' . htmlspecialchars($data[3]) . '</td>';
                        echo '</tr>';
                    }
                }

                echo '</table>';
                echo '<p class="total">Total: ' . $total . ' user terdaftar</p>';
            } else {
                echo '<div class="no-data">';
                echo '<p>Belum ada user yang terdaftar.</p>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="btn-container">
            <a href="pendaftaran.php" class="btn btn-success">Daftar Baru</a>
            <a href="projek11/login.php" class="btn btn-primary">Login</a>
        </div>
    </div>
</body>

</html>