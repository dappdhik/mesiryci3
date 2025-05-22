<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container py-4">
    <h2 class="mb-4 text-primary">
        <i class="bi bi-cup-straw me-2"></i>Daftar Minuman
    </h2>

    <?php if (isset($minuman) && !empty($minuman)): ?>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($minuman as $item): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($item->gambar_barang)): ?>
                            <img src="<?= base_url('uploadsgambar/' . $item->gambar_barang) ?>"
                                class="card-img-top p-3"
                                alt="<?= htmlspecialchars($item->nama_barang) ?>"
                                style="height: 140px; object-fit: contain;">
                        <?php else: ?>
                            <img src="<?= base_url('gambar/default1.jpg') ?>"
                                class="card-img-top p-3"
                                alt="Default drink image"
                                style="height: 140px; object-fit: contain;">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h5>
                            <p class="card-text text-success fw-bold mb-1">Rp <?= number_format((int)$item->harga, 0, ',', '.') ?></p>
                            <p class="text-muted small mb-3">Stok: <?= $item->stok ?></p>

                            <div class="mt-auto">
                                <?php if ($item->stok > 0): ?>
                                    <button class="btn btn-sm btn-primary w-100"
                                        onclick="addToOrder(
                                            <?= $item->id_barang ?>,
                                            '<?= htmlspecialchars($item->nama_barang) ?>',
                                            <?= (int)$item->harga ?>,
                                            '<?= base_url('uploadsgambar/' . $item->gambar_barang) ?>'
                                        )">
                                        Pilih
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-secondary w-100" disabled>Habis</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i> Tidak ada minuman yang tersedia.
        </div>
    <?php endif; ?>
</div>
