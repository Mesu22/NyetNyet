<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4 bg-light">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h2 class="mb-0 text-center">Edit Paket Spesial</h2>
                </div>
                <div class="card-body p-5">
                    <form action="<?= site_url('admin/paket/update/' . $paket['id']) ?>" method="post" class="needs-validation" novalidate>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-bold">Nama Paket</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-lg" value="<?= $paket['nama'] ?>" required>
                                <div class="invalid-feedback">Nama paket harus diisi.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="harga" class="form-label fw-bold">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">Rp</span>
                                    <input type="number" name="harga" id="harga" class="form-control form-control-lg" value="<?= $paket['harga'] ?>" required>
                                </div>
                                <div class="invalid-feedback">Harga harus diisi.</div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required><?= $paket['deskripsi'] ?></textarea>
                            <div class="invalid-feedback">Deskripsi harus diisi.</div>
                        </div>
                        <div class="mb-4">
                            <label for="isi_paket" class="form-label fw-bold">Isi Paket</label>
                            <textarea name="isi_paket" id="isi_paket" class="form-control" rows="5" required><?= $paket['isi_paket'] ?></textarea>
                            <div class="invalid-feedback">Isi paket harus diisi.</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('admin/paket') ?>" class="btn btn-outline-secondary btn-lg px-4">Batal</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4">Update Paket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<?= $this->endSection() ?>