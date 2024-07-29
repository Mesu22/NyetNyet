<!-- Create new paket form -->
<h1>Tambah Paket Baru</h1>
<form action="<?= site_url('admin/paket/store') ?>" method="post">
    <div class="form-group">
        <label for="nama">Nama Paket</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="isi_paket">Isi Paket</label>
        <textarea name="isi_paket" id="isi_paket" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>