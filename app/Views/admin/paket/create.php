<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4 bg-gradient-light">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="mb-0 text-center">Tambah Paket Spesial Baru</h2>
                </div>
                <div class="card-body p-4">
                    <form action="<?= site_url('admin/paket/store') ?>" method="post" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Paket</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-lg" required>
                                <div class="invalid-feedback">
                                    Nama paket harus diisi.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">Rp</span>
                                    <input type="number" name="harga" id="harga" class="form-control form-control-lg" required>
                                    <div class="invalid-feedback">
                                        Harga harus diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Deskripsi harus diisi.
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="isi_paket" class="form-label">Isi Paket</label>
                            <textarea name="isi_paket" id="isi_paket" class="form-control" rows="5" required></textarea>
                            <div class="invalid-feedback">
                                Isi paket harus diisi.
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('admin/paket') ?>" class="btn btn-outline-secondary btn-lg px-4">Batal</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4">Simpan Paket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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