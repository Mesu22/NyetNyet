<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/edit.css') ?>">
</head>
<body>
    <div class="admin-container">
        <h1>Edit Menu</h1>
        <div class="admin-menu">
            <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-back">Back to Manage Menu</a>
        </div>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('errors'); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('admin/portfolio/update/' . $portfolio['id']) ?>" method="post" enctype="multipart/form-data" class="portfolio-form">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" value="<?= $portfolio['title'] ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" placeholder="Enter the category" value="<?= $portfolio['category'] ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-submit">Update</button>
        </form>
    </div>
</body>
</html>
