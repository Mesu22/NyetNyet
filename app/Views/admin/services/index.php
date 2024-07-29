<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Services</h1>
<a href="<?= site_url('admin/services/create') ?>" class="btn btn-primary mb-3">Add New Service</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><i class="<?= $service['icon'] ?>"></i></td>
                <td><?= $service['title'] ?></td>
                <td><?= $service['description'] ?></td>
                <td>
                    <a href="<?= site_url('admin/services/edit/' . $service['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('admin/services/delete/' . $service['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>