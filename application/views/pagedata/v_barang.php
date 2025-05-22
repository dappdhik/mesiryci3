<!DOCTYPE html>
<html lang="en">
<head>
    ...
</head>
<body>
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php if (!empty($mhs)): ?>
        <?php foreach ($mhs as $item): ?>
            <div class="col">
                <div class="card h-100 shadow-sm" id="allCard-<?= $item->id_barang ?>">
                <img src="<?= base_url(!empty($item->gambar_barang) ? 'uploadsgambar/' . $item->gambar_barang : 'gambar/default1.jpg') ?>"
                        class="card-img-top p-3"
                        alt="<?= htmlspecialchars($item->nama_barang ?? 'Default image') ?>"
                        style="height: 120px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h6>
                        <p class="card-text text-success fw-bold">Rp <?= number_format((int)$item->harga, 0, ',', '.') ?></p>
                        <div class="mt-auto">
                            <button class="btn btn-sm btn-primary"
                                onclick="addToOrder(
                                    <?= $item->id_barang ?>,
                                    '<?= htmlspecialchars($item->nama_barang) ?>',
                                    <?= (int)$item->harga ?>,
                                    '<?= base_url('uploadsgambar/' . $item->gambar_barang) ?>'
                                )">Pilih</button>
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

<script>
    function addToOrder(id, nama, harga, gambarUrl) {
        console.log(`Tambahkan ke pesanan: ${nama} - Rp${harga}`);
        
    }
</script>
</body>
</html>
