<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php if (isset($mhs) && !empty($mhs)): ?>
        <?php foreach ($mhs as $item): ?>
            <div class="col">
                <div class="card h-100 shadow-sm" id="allCard-<?= $item->id_barang ?>">
                    <?php if (!empty($item->gambar_barang)): ?>
                        <img src="<?= base_url('uploadsgambar/'), $item->gambar_barang ?>"
                            class="card-img-top p-3 "
                            alt="<?= htmlspecialchars($item->nama_barang) ?>"
                            style="height: 120px; object-fit: contain;">
                    <?php else: ?>
                        <img src="<?= base_url('gambar/default1.jpg') ?>"
                            class="card-img-top p-3"
                            alt="Default image"
                            style="height: 120px; object-fit: contain;">

                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title"><?= htmlspecialchars($item->nama_barang) ?></h6>
                        <p class="card-text text-success fw-bold">Rp <?= number_format($item->harga, 0, ',', '.') ?></p>
                        <div class="mt-auto">

                            <button class="btn btn-sm btn-primary"
                                onclick="addToOrder(
            <?= $item->id_barang ?>, 
            '<?= htmlspecialchars($item->nama_barang) ?>', 
            <?= $item->harga ?>, 
            '<?= base_url('uploadsgambar/' . $item->gambar_barang) ?>'
        )">
                                Pilih
                            </button>
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
    function updateQuantity(btn, change) {
        const input = btn.closest('.input-group').querySelector('.quantity-input');
        let newVal = parseInt(input.value) + change;
        if (newVal < 0) newVal = 0;
        input.value = newVal;
    }
</script>