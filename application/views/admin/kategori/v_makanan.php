<h1 class="m-3">Daftar Makanan</h1>

<div class="d-flex flex-wrap gap-3 p-3" style="max-height: 70vh; overflow-y: auto;">
    <?php if(isset($makanan) && !empty($makanan)): ?>
        <?php foreach($makanan as $item): ?>
        <div class="card shadow-sm" style="width: 16rem; flex-shrink: 0;">
            <?php if (!empty($item->gambar_barang)): ?>
                <img src="<?= base_url('uploadsgambar/' . $item->gambar_barang) ?>"
                     class="card-img-top"
                     alt="<?= htmlspecialchars($item->nama_barang) ?>"
                     style="height: 180px; object-fit: cover;">
            <?php else: ?>
                <img src="<?= base_url('gambar/default1.jpg') ?>"
                     class="card-img-top"
                     alt="Default image"
                     style="height: 180px; object-fit: cover;">
            <?php endif; ?>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h5>
                <p class="card-text mb-1">Rp <?= number_format($item->harga, 0, ',', '.') ?></p>
                <p class="card-text mb-3">Stok: <?= $item->stok ?></p>
                <div class="mt-auto d-flex justify-content-between">
                    <a href="<?= base_url('admin/delete/' . $item->id_barang) ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus <?= htmlspecialchars($item->nama_barang) ?>?')">
                        <i class="bi bi-trash"></i> Delete
                    </a>
                    <a href="<?= base_url('admin/tampiledit/' . $item->id_barang) ?>" 
                       class="btn btn-secondary btn-sm">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="<?= base_url('admin/detail/' . $item->id_barang) ?>" 
                       class="btn btn-info btn-sm">
                        <i class="bi bi-info-circle"></i> Detail
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning w-100 text-center">
            Tidak ada data makanan yang tersedia.
        </div>
    <?php endif; ?>
</div>
