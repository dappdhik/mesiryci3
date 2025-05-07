<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container row">
    <h3 class="mb-4">
        <i class="bi bi-cup-hot"></i> Daftar Minuman
    </h3>
    
    <?php if(isset($minuman) && !empty($minuman)): ?>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach($minuman as $item): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <!-- Gambar Produk -->
                        <img src="<?= base_url('gambar/').($item->gambar ?? 'default-drink.jpg') ?>" 
                             class="card-img-top p-3" 
                             alt="<?= htmlspecialchars($item->nama_barang) ?>"
                             style="height: 180px; object-fit: contain;">
                        
                        <div class="card-body d-flex flex-column">
                            <!-- Nama dan Harga -->
                            <h5 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h5>
                            <p class="text-success fw-bold">
                                Rp <?= number_format($item->harga, 0, ',', '.') ?>
                            </p>
                            
                            <!-- Tombol Quantity -->
                            <div class="mt-auto">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary" 
                                            type="button" 
                                            onclick="updateQuantity(this, -1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" 
                                           class="form-control text-center" 
                                           value="0" min="0" readonly>
                                    <button class="btn btn-outline-secondary" 
                                            type="button" 
                                            onclick="updateQuantity(this, 1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <button class="btn btn-primary w-100">
                                    <i class="bi bi-cart-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Tidak ada minuman yang tersedia saat ini
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function updateQuantity(btn, change) {
    const input = btn.closest('.input-group').querySelector('input');
    let newVal = parseInt(input.value) + change;
    input.value = newVal < 0 ? 0 : newVal;
}
</script>