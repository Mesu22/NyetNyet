<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Hero Sections</h1>
<a href="<?= site_url('admin/hero-section/create') ?>" class="btn btn-primary mb-3">Create New Hero Section</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>WhatsApp Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hero_sections as $hero_section): ?>
            <tr>
                <td><?= $hero_section['id'] ?></td>
                <td><?= $hero_section['title'] ?></td>
                <td><img src="<?= base_url('uploads/hero/' . $hero_section['image']) ?>" width="100"></td>
                <td><?= $hero_section['whatsapp_number'] ?></td>
                <td>
                    <a href="<?= site_url('admin/hero-section/edit/' . $hero_section['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('admin/hero-section/delete/' . $hero_section['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
