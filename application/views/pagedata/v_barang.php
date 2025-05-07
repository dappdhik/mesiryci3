<?php
// Debug data (optional - can be removed in production)
// print_r($mhs);
?>
<!-- card start -->
<div class="container row">
    <h3>All Data Produk</h3>
    
    <?php if(isset($mhs) && is_array($mhs) && !empty($mhs)): ?>
        <!-- Dynamic Cards from Database -->
        <?php foreach($mhs as $item): ?>
            <div class="card m-2" style="width: 10rem;">
                <img src="<?= base_url('gambar/') . ($item->gambar ?? 'default.jpg') ?>" class="card-img-top" alt="<?= htmlspecialchars($item->nama_barang ?? 'Produk') ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($item->nama_barang ?? 'Nama Barang') ?></h5>
                    <p class="card-text">Rp <?= number_format($item->harga ?? 0, 0, ',', '.') ?></p>
                    <a href="#" class="btn btn-primary btn-sm">Pilih</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning col-12">
            Tidak ada data barang yang tersedia
        </div>
    <?php endif; ?>

    <!-- Static Example Card -->
    <div class="card m-2" style="width: 10rem;">
        <img src="<?= base_url('gambar/miegoreng.jpeg') ?>" class="card-img-top" alt="Mie Goreng">
        <div class="card-body">
            <h5 class="card-title">Mie Goreng</h5>
            <p class="card-text">Rp 10.000</p>
            <a href="#" class="btn btn-primary btn-sm">Pilih</a>
        </div>
    </div>
</div>

<!-- Optional JavaScript for quantity control -->
<script>
function updateQuantity(btn, change) {
    const input = btn.parentElement.querySelector('input[type="number"]');
    let newVal = parseInt(input.value) + change;
    if (newVal < 0) newVal = 0;
    input.value = newVal;
}
</script>