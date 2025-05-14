<h2 class="p-2">Inputan data</h2>

<?php echo form_open_multipart('barang/inputb')?>
<div class="container p-3">
    <div class="form-group mb-3">
        <label for="nama" class="m-2">Nama barang</label>
        <input type="text" class="form-control" name="nama" id="nama" required>
    </div>
    <div class="form-group mb-3">
        <label for="harga" class="m-2">Harga</label>
        <input type="number" class="form-control" name="harga" id="harga" required>
    </div>
    <div class="form-group mb-3">
        <label for="stok" class="m-2">Stok</label>
        <input type="number" class="form-control" name="stok" id="stok" required>
    </div>
    <div class="form-group mb-3">
        <label for="kategori" class="m-2">Kategori</label>
        <select name="kategori" id="kategori" class="form-select form-control" required>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="gambar" class="m-2">Upload Gambar</label>
        <input type="file" class="form-control" name="gambar" id="gambar">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Kirim</button>
</div>
<?php echo form_close()?>