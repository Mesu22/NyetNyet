<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Create Hero Section</h1>

<?php if (session()->has('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/hero-section/store') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <div class="mb-3">
        <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
        <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" required>
    </div>
    <div class="mb-3">
        <label for="whatsapp_message" class="form-label">WhatsApp Message</label>
        <textarea class="form-control" id="whatsapp_message" name="whatsapp_message" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
<?= $this->endSection() ?>