<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            background: #f0f2f5;
            color: #333;
        }

        .admin-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            max-width: 1400px;
            margin: 0 auto;
            height: 100vh;
            overflow: hidden;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .sidebar {
            background: #1d2d50;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 24px;
            margin: 0;
            padding: 20px;
            text-align: center;
            background: #1d2d50;
            color: white;
            letter-spacing: 2px;
            font-weight: 700;
            cursor: pointer;
            position: relative;
        }

        .dropdown-icon {
            font-size: 20px;
            position: absolute;
            right: 20px;
            top: 20px;
            transition: transform 0.3s;
        }

        .sidebar .menu {
            display: none;
            flex-direction: column;
            margin-top: 20px;
        }

        .sidebar .menu a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
            padding: 12px 20px;
            margin: 10px 0;
            width: 100%;
            text-align: center;
            border-radius: 4px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar .menu a:hover {
            background: #3498db;
            color: #ecf0f1;
        }

        .admin-content {
            padding: 40px;
            overflow-y: auto;
            background: #f0f2f5;
        }

        section {
            margin-bottom: 40px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #1d2d50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .settings-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .settings-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .settings-form input[type="text"],
        .settings-form input[type="email"],
        .settings-form input[type="password"],
        .settings-form input[type="file"],
        .settings-form select,
        .settings-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .settings-form input[type="text"]:focus,
        .settings-form input[type="email"]:focus,
        .settings-form input[type="password"]:focus,
        .settings-form input[type="file"]:focus,
        .settings-form select:focus,
        .settings-form textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        .settings-form .btn {
            display: block;
            width: 100%;
            padding: 14px;
            border: none;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .settings-form .btn:hover {
            background-color: #2980b9;
        }

        .back-to-menu {
            text-align: center;
            margin-top: 20px;
        }

        .back-to-menu a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            border: 2px solid #3498db;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background 0.3s, color 0.3s;
        }

        .back-to-menu a:hover {
            background: #3498db;
            color: white;
        }

        @media (max-width: 768px) {
            .admin-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                flex-direction: column;
                padding: 10px;
            }

            .sidebar .menu {
                display: flex;
            }

            .sidebar .menu a {
                margin: 5px 0;
                padding: 8px 12px;
                font-size: 14px;
            }

            .admin-content {
                padding: 20px;
            }

            h1 {
                font-size: 20px;
                padding: 10px;
            }

            .dropdown-icon {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .sidebar .menu a {
                font-size: 14px;
                padding: 8px;
            }

            h1 {
                font-size: 18px;
                padding: 10px;
            }

            .dropdown-icon {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <h1 id="dropdown-title">Admin Dashboard <span class="dropdown-icon">&#9660;</span></h1>
            <div class="menu">
                <a href="#users">Manage Users</a>
                <a href="<?= base_url('admin/portfolio') ?>">Manage Posts</a>
                <a href="#settings">Settings</a>
                <a href="<?= base_url('login/logout') ?>">Logout</a>
            </div>
        </div>
        <div class="admin-content">
            <section id="users">
                <h2>Manage Users</h2>
                <!-- Content for managing users -->
            </section>
            <section id="posts">
                <!-- Content for managing posts -->
            </section>
            <section id="settings">
                <h2>Settings</h2>
                <div class="settings-form">
                    <form method="post" action="<?= base_url('admin/save_settings') ?>">
                        <label for="site_title">Site Title</label>
                        <input type="text" id="site_title" name="site_title" value="Your Site Title">

                        <label for="site_email">Site Email</label>
                        <input type="email" id="site_email" name="site_email" value="admin@example.com">

                        <label for="site_logo">Site Logo</label>
                        <input type="file" id="site_logo" name="site_logo">

                        <label for="site_description">Site Description</label>
                        <textarea id="site_description" name="site_description" rows="4">Your site description goes here.</textarea>

                        <button type="submit" class="btn">Save Settings</button>
                    </form>
                </div>  
            </section>
        </div>
    </div>

    <script>
        document.getElementById('dropdown-title').addEventListener('click', function() {
            var menu = document.querySelector('.sidebar .menu');
            var icon = document.querySelector('.dropdown-icon');
            if (menu.style.display === 'flex') {
                menu.style.display = 'none';
                icon.innerHTML = '&#9660;'; // Down arrow
            } else {
                menu.style.display = 'flex';
                icon.innerHTML = '&#9650;'; // Up arrow
            }
        });
    </script>
</body>
</html>
