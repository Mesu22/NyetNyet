<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Clients</h1>
<a href="<?= site_url('admin/clients/create') ?>" class="btn btn-primary mb-3">Add New Client</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $client['id'] ?></td>
                <td><?= $client['name'] ?></td>
                <td><img src="<?= base_url('uploads/clients/' . $client['image']) ?>" alt="<?= $client['name'] ?>" width="100"></td>
                <td>
                    <a href="<?= site_url('admin/clients/edit/' . $client['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('admin/clients/delete/' . $client['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>