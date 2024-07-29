<!-- Edit paket form -->
<h1>Edit Paket</h1>
<form action="<?= site_url('admin/paket/update/'.$paket['id']) ?>" method="post">
    <div class="form-group">
        <label for="nama">Nama Paket</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= $paket['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= $paket['deskripsi'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control" value="<?= $paket['harga'] ?>" required>
    </div>
    <div class="form-group">
        <label for="isi_paket">Isi Paket</label>
        <textarea name="isi_paket" id="isi_paket" class="form-control" required><?= $paket['isi_paket'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>