<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #c3cfe2, #f5f7fa);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .login-container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 500;
            color: #333;
        }

        .login-container label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            text-align: left;
            color: #666;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-container button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .error {
            background-color: #e74c3c;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .shortcut-link {
            text-align: center;
            margin-top: 20px;
        }

        .shortcut-link a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .shortcut-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Sign In</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('login/auth') ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign In</button>
        </form>
        
        <!-- Shortcut link to dashboard -->
        <div class="shortcut-link">
            <a href="<?= base_url('Beranda') ?>">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>
