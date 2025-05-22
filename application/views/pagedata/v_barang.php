<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta dan Bootstrap CSS -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>

<div class="container py-4">
    <h2 class="mb-4 text-primary">
        <i class="bi bi-box-seam me-2"></i>Daftar Semua Barang
    </h2>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php if (!empty($mhs)): ?>
            <?php foreach ($mhs as $item): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= base_url(!empty($item->gambar_barang) ? 'uploadsgambar/' . $item->gambar_barang : 'gambar/default1.jpg') ?>"
                            class="card-img-top p-3"
                            alt="<?= htmlspecialchars($item->nama_barang ?? 'Default image') ?>"
                            style="height: 140px; object-fit: contain;">

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
        <?php else: ?>
            <div class="alert alert-warning col-12">
                <i class="bi bi-exclamation-triangle"></i> Tidak ada data produk yang tersedia.
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function addToOrder(id, nama, harga, gambarUrl) {
        console.log(`Tambahkan ke pesanan: ${nama} - Rp${harga}`);
        // Tambahkan logika tambah ke order sesuai kebutuhan
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
