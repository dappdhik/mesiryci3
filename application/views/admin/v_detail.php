
<h2 class="p-2">Detail data</h2>
<div class="card">
<div class="container p-3">

<p>Nama barang : <?php echo $barang->nama_barang?></p>
<p>Stok barang : <?php echo $barang->stok?></p>
<p>Harga : Rp <?php echo number_format($barang->harga,2, ",", ".") ?></p>
<p>Tanggal ditambahkan :</p>


<img src="<?= base_url('gambar/default1.jpg') ?>"
                             class="card-img-top p-3 rounded"
                             alt="Default image"
                             style="width: 250px; object-fit: cover;">

<!-- <img src="<= base_url('gambar')?>/nasigoreng.jpeg" alt="gambar data" class="rounded"></div></div> -->