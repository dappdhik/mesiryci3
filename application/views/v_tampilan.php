<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kasir Sederhana</title>
    <link rel="stylesheet" href="<?= base_url('teamplate') ?>/dist/css/adminlte.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-light shadow-sm p-0">
            <div class="d-flex flex-column h-100 p-3 mt-3">
                <a href="<?= base_url('barang/index') ?>" class="d-flex align-items-center mb-3 text-decoration-none text-dark">
                    <i class="bi bi-shop fs-4 me-2"></i>
                    <span class="fs-4 fw-semibold">Camess Food</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column gap-2">
                    <li class="nav-item">
                        <a href="<?= base_url('barang/makanan') ?>" class="nav-link link-dark">
                            <i class="bi bi-egg-fried me-2"></i> Makanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang/minuman') ?>" class="nav-link link-dark">
                            <i class="bi bi-cup-straw me-2"></i> Minuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('penjualan/riwayat') ?>" class="nav-link link-dark">
                            <i class="bi bi-clock-history me-2"></i> Riwayat
                        </a>
                    </li>
                    <hr>
                </ul>
                <div class="mt-auto">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link link-danger" onclick="return confirm('Yakin ingin logout?')">
                        <i class="bi bi-box-arrow-left me-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 ms-auto">
            <form action="<?= base_url('barang/search') ?>" method="GET" class="d-flex p-2" style="width: 50rem;">
                <input type="text" name="keyword" placeholder="Cari makanan/minuman" class="form-control me-2" />
                <button class="btn btn-sm btn-primary" type="submit">Cari</button>
            </form>

            <div class="d-flex justify-content-between flex-grow-1" style="gap: 1rem;">
                <div class="container1 flex-grow-1 bg-body" style="width: 60%; height: 80vh; overflow-y: scroll;">
                    <?php if (isset($halaman)) $this->load->view($halaman); ?>
                </div>
                <div class="container2 bg-body-tertiary shadow-sm" style="width: 30%">
                    <?php
                    if (isset($kasir)) {
                        $this->load->view($kasir);
                    } else {
                        $this->load->view('pagedata/v_kasir');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('teamplate') ?>/dist/js/adminlte.js"></script>
</body>
</html>
