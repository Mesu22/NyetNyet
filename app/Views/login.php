<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            width: 90%;
            max-width: 420px;
            padding: 30px 20px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: all 0.4s ease;
            margin: 20px;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 600;
            color: #2575fc;
        }

        .login-container label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: left;
            color: #555;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #2575fc;
            box-shadow: 0 0 10px rgba(37, 117, 252, 0.3);
            outline: none;
        }

        .login-container button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background-color: #2575fc;
            color: white;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-container button:hover {
            background-color: #1a5fc8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .error {
            background-color: #ff4757;
            color: white;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-size: 14px;
        }

        .shortcut-link {
            text-align: center;
            margin-top: 20px;
        }

        .shortcut-link a {
            color: #2575fc;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .shortcut-link a:hover {
            color: #1a5fc8;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 20px 15px;
            }

            .login-container h1 {
                font-size: 24px;
            }

            .login-container input[type="text"],
            .login-container input[type="password"],
            .login-container button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Welcome Back</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('login/auth') ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required placeholder="Enter your username">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            <button type="submit">Sign In</button>
        </form>
        
        <div class="shortcut-link">
            <a href="<?= base_url('Beranda') ?>">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>
