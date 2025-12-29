<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
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
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 40px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .link {
            text-align: center;
            margin-top: 15px;
            color: #666;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="proses_login.php" method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="link">Belum punya akun? <a href="pendaftaran.php">Daftar disini</a></p>
        <p class="link"><a href="lihat.php">Lihat Data User</a></p>
    </div>

    <script>
        function togglePassword() {
            var pass = document.getElementById('password');
            var icon = document.querySelector('.toggle-password');
            if (pass.type === 'password') {
                pass.type = 'text';
                icon.textContent = '<';
            } else {
                pass.type = 'password';
                icon.textContent = '👁';
            }
        }
    </script>
</body>

</html>