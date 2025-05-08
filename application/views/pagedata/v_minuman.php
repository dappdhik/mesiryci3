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
                    <div class="card h-100 shadow-sm" id="drinkCard-<?= $item->id_barang ?>" data-item-id="<?= $item->id_barang ?>">
                        <?php if (!empty($item->gambar_barang)): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($item->gambar_barang) ?>"
                                 class="card-img-top p-3"
                                 alt="<?= htmlspecialchars($item->nama_barang) ?>"
                                 style="height: 180px; object-fit: contain;">
                        <?php else: ?>
                            <img src="<?= base_url('gambar/default-drink.jpg') ?>"
                                 class="card-img-top p-3"
                                 alt="Default drink image"
                                 style="height: 180px; object-fit: contain;">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h5>
                            <p class="text-success fw-bold">
                                Rp <?= number_format($item->harga, 0, ',', '.') ?>
                            </p>

                            <div class="mt-auto">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary"
                                            type="button"
                                            onclick="updateQuantity(this, -1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number"
                                           class="form-control text-center quantity-input"
                                           value="0" min="0" readonly>
                                    <button class="btn btn-outline-secondary"
                                            type="button"
                                            onclick="updateQuantity(this, 1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <button class="btn btn-primary w-100"
                                        onclick="addToOrder(<?= $item->id_barang ?>, '<?= htmlspecialchars($item->nama_barang) ?>', <?= $item->harga ?>, 'data:image/jpeg;base64,<?= base64_encode($item->gambar_barang) ?>')">
                                    <i class="bi bi-cart-plus"></i> Pilih
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
    const input = btn.closest('.input-group').querySelector('.quantity-input');
    let newVal = parseInt(input.value) + change;
    input.value = newVal < 0 ? 0 : newVal;
}
</script>