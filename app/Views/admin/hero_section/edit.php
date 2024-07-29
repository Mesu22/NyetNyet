<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Edit Hero Section</h1>

<?php if (session()->has('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/hero-section/update/' . $hero_section['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $hero_section['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        <img src="<?= base_url('uploads/hero/' . $hero_section['image']) ?>" width="100" class="mt-2">
    </div>
    <div class="mb-3">
        <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
        <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="<?= $hero_section['whatsapp_number'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="whatsapp_message" class="form-label">WhatsApp Message</label>
        <textarea class="form-control" id="whatsapp_message" name="whatsapp_message" required><?= $hero_section['whatsapp_message'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>