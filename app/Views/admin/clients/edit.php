<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Edit Client</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/clients/update/' . $client['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $client['name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file">
        <small class="form-text text-muted">Leave empty to keep the current image</small>
    </div>
    <img src="<?= base_url('uploads/clients/' . $client['image']) ?>" alt="<?= $client['name'] ?>" width="100" class="mb-3">
    <br>
    <button type="submit" class="btn btn-primary">Update Client</button>
</form>
<?= $this->endSection() ?>