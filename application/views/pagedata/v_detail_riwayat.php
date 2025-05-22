<div class="p-3 bg-white rounded shadow-sm">
    <h5>Detail Penjualan</h5>
    
    <?php if (!empty($detail)) : ?>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_keseluruhan = 0;
                    foreach ($detail as $d): 
                        // Hitung harga satuan dari subtotal dibagi qty
                        $harga_satuan = $d->qty > 0 ? $d->subtotal / $d->qty : 0;
                        $total_keseluruhan += $d->subtotal;
                    ?>
                        <tr>
                            <td><?= $d->nama_barang ?></td>
                            <td><?= $d->qty ?></td>
                            <td>Rp <?= number_format($harga_satuan, 0, ',', '.') ?></td>
                            <td>Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="table-active">
                        <th colspan="3" class="text-end">Total Keseluruhan:</th>
                        <th>Rp <?= number_format($total_keseluruhan, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="mt-3">
            <a href="<?= base_url('penjualan/riwayat') ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Riwayat
            </a>
        </div>
    <?php else : ?>
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-triangle"></i> Detail penjualan tidak ditemukan.
        </div>
        <div class="mt-3">
            <a href="<?= base_url('penjualan/riwayat') ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Riwayat
            </a>
        </div>
    <?php endif; ?>
</div>