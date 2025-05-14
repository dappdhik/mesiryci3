<h1 class="m-2">Semua data yang ada ditampilkan disini</h1>

<div class="container-row d-flex flex-row flex-nowrap overflow-auto">
    <?php if(isset($mhs) && !empty($mhs)): ?>
        <?php foreach($mhs as $item): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <?php if (!empty($item->gambar_barang)): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($item->gambar_barang) ?>"
                             class="card-img-top p-3"
                             alt="<?= htmlspecialchars($item->nama_barang) ?>"
                             style="height: 120px; object-fit: cover;">
                    <?php else: ?>
                        <img src="<?= base_url('gambar/default.jpg') ?>"
                             class="card-img-top p-3"
                             alt="Default image"
                             style="height: 120px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h5>
                        <p class="card-text">Rp <?= number_format($item->harga, 0, ',', '.') ?></p>
                        <p class="card-text">Stok: <?= $item->stok ?></p>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin/delete/'.$item->id_barang) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus <?= htmlspecialchars($item->nama_barang) ?>?')">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                            <a href="<?= base_url('admin/tampiledit/'.$item->id_barang) ?>" 
                               class="btn btn-secondary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/detail/'.$item->id_barang) ?>" 
                               class="btn btn-info btn-sm">
                                <i class="bi bi-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning col-12">
            Tidak ada data produk yang tersedia.
        </div>
    <?php endif; ?>
</div>