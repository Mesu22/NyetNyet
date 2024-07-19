<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/create.css') ?>">
    <style>
        .preview-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Add New Menu</h1>
        <div class="admin-menu">
            <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-back">Back to Manage Menu</a>
        </div>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="error">
                <?= session()->getFlashdata('errors'); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('admin/portfolio/store') ?>" method="post" enctype="multipart/form-data" class="portfolio-form">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" value="<?= old('title') ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" placeholder="Enter the category" value="<?= old('category') ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required onchange="previewImage(this);">
                <img id="image-preview" class="preview-image" src="#" alt="Preview Image" style="display: none;">
            </div>
            <button type="submit" class="btn btn-submit">Add</button>
        </form>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
