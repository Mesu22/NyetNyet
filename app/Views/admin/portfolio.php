<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Manage Menu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/managemenu.css') ?>">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            background: #f4f4f9;
            color: #333;
        }
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
            color: #2c3e50;
        }
        .admin-menu {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .alert {
            padding: 15px;
            background-color: #4caf50;
            color: white;
            margin-bottom: 20px;
        }
        .portfolio-list {
            overflow-x: auto;
        }
        .portfolio-table {
            width: 100%;
            border-collapse: collapse;
        }
        .portfolio-table th,
        .portfolio-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .portfolio-table th {
            background-color: #3498db;
            color: white;
        }
        .portfolio-table img {
            max-width: 100px;
            height: auto;
        }
        .action-btn {
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .action-btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .admin-menu {
                flex-direction: column;
                align-items: center;
            }
            .admin-menu a {
                margin-bottom: 10px;
            }
            .portfolio-table img {
                max-width: 70px;
            }
            .portfolio-table th,
            .portfolio-table td {
                padding: 8px;
            }
            .action-btn {
                margin-bottom: 5px;
            }
        }

        @media (max-width: 480px) {
            .admin-menu {
                flex-direction: column;
                align-items: center;
            }
            .admin-menu a {
                margin-bottom: 10px;
                font-size: 14px;
            }
            .portfolio-table img {
                max-width: 50px;
            }
            .portfolio-table th,
            .portfolio-table td {
                padding: 5px;
            }
            .action-btn {
                padding: 5px;
                margin-bottom: 5px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Manage Menu</h1>
        <div class="admin-menu">
            <a href="<?= base_url('admin') ?>" class="btn btn-primary">Back to Admin Panel</a>
            <a href="<?= base_url('admin/portfolio/create') ?>" class="btn btn-primary">Add New Item</a>
        </div>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
        <div class="portfolio-list">
            <table class="portfolio-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($portfolios as $portfolio): ?>
                        <tr>
                            <td><?= $portfolio['id'] ?></td>
                            <td><?= $portfolio['title'] ?></td>
                            <td><?= $portfolio['category'] ?></td>
                            <td><img src="<?= base_url('assets/img/Menu/' . $portfolio['image']) ?>" class="portfolio-image"></td>
                            <td>
                                <a href="<?= base_url('admin/portfolio/edit/' . $portfolio['id']) ?>" class="action-btn">Edit</a>
                                <a href="<?= base_url('admin/portfolio/delete/' . $portfolio['id']) ?>" class="action-btn" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
