<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>About Section</h1>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if ($about) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?= esc($about['title']) ?></h5>
            <p class="card-text"><?= esc($about['description']) ?></p>
            <?php if ($about['image']) : ?>
                <img src="<?= base_url('uploads/about/' . $about['image']) ?>" alt="About Image" class="img-fluid mb-3">
            <?php endif; ?>
            <a href="<?= site_url('admin/about/edit/' . $about['id']) ?>" class="btn btn-primary">Edit</a>
            <a href="<?= site_url('admin/about/delete/' . $about['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
        </div>
    </div>
<?php else : ?>
    <p>No about section found.</p>
    <a href="<?= site_url('admin/about/create') ?>" class="btn btn-primary">Create About Section</a>
<?php endif; ?>
<?= $this->endSection() ?>