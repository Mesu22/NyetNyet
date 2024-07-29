<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Add New Client</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/clients/store') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Client</button>
</form>
<?= $this->endSection() ?>