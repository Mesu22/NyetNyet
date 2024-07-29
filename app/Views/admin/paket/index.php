<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>


<h2>Daftar Paket Spesial</h2>
<a href="<?= site_url('admin/paket/create') ?>" class="btn btn-primary mb-3">Tambah Paket</a>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pakets as $paket) : ?>
                <tr>
                    <td><?= esc($paket['nama']) ?></td>
                    <td><?= esc($paket['deskripsi']) ?></td>
                    <td>Rp <?= number_format($paket['harga'], 0, ',', '.') ?></td>
                    <td>
                        <a href="<?= site_url('admin/paket/edit/' . $paket['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= site_url('admin/paket/delete/' . $paket['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>