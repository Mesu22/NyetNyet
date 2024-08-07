<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1>Edit Service</h1>

<form action="<?= site_url('admin/services/update/' . $service['id']) ?>" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $service['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required><?= $service['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>