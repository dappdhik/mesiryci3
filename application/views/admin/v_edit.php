<h2 class="p-2">Edit Data Barang</h2>

<?php echo form_open_multipart('admin/update_barang/'.$barang->id_barang) ?>
<div class="container p-3">
    <div class="form-group mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" 
            value="<?= set_value('nama_barang', $barang->nama_barang) ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" id="stok" 
            value="<?= set_value('stok', $barang->stok) ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" id="harga" 
            value="<?= set_value('harga', $barang->harga) ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" required>
            <option value="makanan" <?= $barang->kategori == 'makanan' ? 'selected' : '' ?>>Makanan</option>
            <option value="minuman" <?= $barang->kategori == 'minuman' ? 'selected' : '' ?>>Minuman</option>
        </select>
    </div>
    
    <div class="form-group mb-3">
    <label for="gambar" class="form-label">Gambar Barang</label>

    <?php if (!empty($barang->gambar_barang)): ?>
        <div class="mb-2">
            <img src="<?= base_url('uploadsgambar/' . $barang->gambar_barang) ?>" 
                alt="Gambar Barang" 
            style="width: 100px; max-height: 100px;" 
                class="img-thumbnail">

            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="hapus_gambar" id="hapus_gambar" value="1">
                <label class="form-check-label" for="hapus_gambar">
                    Hapus gambar saat disimpan
                </label>
            </div>
        </div>
    <?php endif; ?>

    <input type="file" class="form-control" name="gambar" id="gambar">
</div>
    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
</div>

    
    <button type="submit" class="btn btn-primary mt-4">
        <i class="bi bi-save"></i> Simpan Perubahan
    </button>
    <a href="<?= base_url('admin') ?>" class="btn btn-secondary mt-4 ms-2">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>
<?php echo form_close() ?>