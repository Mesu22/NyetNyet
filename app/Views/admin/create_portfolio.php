<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu Item</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .admin-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 500px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #bdc3c7;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
        }
        input[type="file"] {
            border: none;
            padding: 10px 0;
        }
        .submit-btn {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #27ae60;
        }
        .icon-input {
            position: relative;
        }
        .icon-input i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
        }
        .icon-input input,
        .icon-input select {
            padding-left: 40px;
        }
        /* Mengurangi panjang box menu name */
        #title {
            max-width: 300px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1><i class="fas fa-plus-circle"></i> Add New Menu Item</h1>
        <form action="<?= base_url('admin/menu/store') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Menu Name</label>
                <div class="icon-input">
                    <i class="fas fa-utensils"></i>
                    <input type="text" id="title" name="title" required placeholder="Enter menu name">
                </div>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <div class="icon-input">
                    <i class="fas fa-list-alt"></i>
                    <select id="category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Sayuran">Sayuran</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div class="icon-input">
                    <i class="fas fa-image"></i>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <button type="submit" class="submit-btn"><i class="fas fa-plus"></i> Add Item</button>
        </form>
    </div>
</body>
</html>