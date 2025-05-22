<div class="p-3 bg-white rounded shadow-sm">
    <h4 class="fw-bold mb-3">Riwayat Penjualan</h4>

    <?php if (!empty($penjualan)) : ?>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penjualan as $p) : ?>
                        <tr>
                            <td><?= $p->id_penjualan ?></td>
                            <td><?= date('d/m/Y', strtotime($p->tanggal_penjualan)) ?></td>
                            <td>Rp <?= number_format($p->total, 0, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('penjualan/detail/' . $p->id_penjualan) ?>" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-triangle"></i> Belum ada data penjualan.
        </div>
    <?php endif; ?>
</div>