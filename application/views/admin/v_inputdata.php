<h2 class="p-2">Inputan data</h2>

<?php echo form_open('barang/inputb')?>
<div class="container p-3" style="">
    <div class="form-group ">
        <label for="" class="m-2">Nama barang</label>
    <input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
    <label for="" class="m-2">Harga</label>
    <input type="text" class="form-control" name="harga">
</div>
<div class="form-group">
    <label for="" class="m-2">Stok</label>
    <input type="text" class="form-control" name="stok">
</div>
<div class="form-group">
    <label for="" class="m-2">Kategori</label>
    <select name="kategori" id="" class="form-selected form-control">
        <option value="makanan">Makanan</option>
        <option value="minuman">Minuman</option>
    </select>
</div>
<div class="form-group">
    <label for="" class="m-2">Upload</label>
    <input type="file" class="form-control" name="gambar">
</div>
<button type="submit" class="btn btn-primary mt-4">Kirim</button></div>
<?php echo form_close()?>
<!-- <div class="form-floating mb-3">
    <input type="text" id="floatingInput"  class="form-control">
    <label for="floatingInput" class="">Nama barang</label>
</div> -->