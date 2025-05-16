
<h2 class="p-2">Detail data</h2>
<div class="card">
<div class="container p-3">

<p>Nama barang : <?php echo $barang->nama_barang?></p>
<p>Stok barang : <?php echo $barang->stok?></p>
<p>Harga : Rp <?php echo number_format($barang->harga,2, ",", ".") ?></p>
<p>Tanggal ditambahkan :</p>

<?php if (!empty($barang->gambar_barang)): ?>
                        <img src="<?= base_url('uploadsgambar/'),$barang->gambar_barang ?>"
                             class="card-img-top p-3 rounded"
                             alt="<?= htmlspecialchars($barang->nama_barang) ?>"
                             style="width: 250px; object-fit: cover;">
                    <?php else: ?>
                        <img src="<?= base_url('gambar/default1.jpg') ?>"
                             class="card-img-top p-3 rounded"
                             alt="Default image"
                             style="width: 250px; object-fit: cover;">
                             <br>
                            <span class="text-muted m-2" style="font-size: 0.75rem;">Gambar tidak ada</span>
                    <?php endif; ?>
<br>
                             <a href="<?= base_url('admin') ?>" class="btn btn-secondary mt-4 ms-2">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
<!-- <img src="<= base_url('gambar')?>/nasigoreng.jpeg" alt="gambar data" class="rounded"></div></div> -->