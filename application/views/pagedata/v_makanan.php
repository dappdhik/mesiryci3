<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container row">
    <h3>Daftar Makanan</h3>

    <?php if (isset($makanan) && !empty($makanan)): ?>
        <?php foreach ($makanan as $item): ?>
            <div class="card m-2" style="width: 12rem;" id="foodCard-<?= $item->id_barang ?>" data-item-id="<?= $item->id_barang ?>">
                <?php if (!empty($item->gambar_barang)): ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($item->gambar_barang) ?>"
                         class="card-img-top p-2"
                         alt="<?= htmlspecialchars($item->nama_barang) ?>"
                         style="height: 120px; object-fit: cover;">
                <?php else: ?>
                    <img src="<?= base_url('gambar/default-food.jpg') ?>"
                         class="card-img-top p-2"
                         alt="Default food image"
                         style="height: 120px; object-fit: cover;">
                <?php endif; ?>

                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h5>
                    <p class="card-text">
                        Rp <?= number_format($item->harga, 0, ',', '.') ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group">
                            <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" class="form-control form-control-sm text-center"
                                   value="0" min="0" style="width: 40px;" readonly>
                            <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(this, 1)">+</button>
                        </div> -->
                        <button class="btn btn-sm btn-primary"
                                onclick="addToOrder(<?= $item->id_barang ?>, '<?= htmlspecialchars($item->nama_barang) ?>', <?= $item->harga ?>, 'data:image/jpeg;base64,<?= base64_encode($item->gambar_barang) ?>')">
                            Pilih
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i> Tidak ada makanan yang tersedia
        </div>
    <?php endif; ?>
</div>

<script>
    function updateQuantity(btn, change) {
        const input = btn.parentElement.querySelector('input[type="number"]');
        let newVal = parseInt(input.value) + change;
        input.value = newVal < 0 ? 0 : newVal;
    }
</script>