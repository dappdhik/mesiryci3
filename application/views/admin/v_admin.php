<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Fonts -->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
		crossorigin="anonymous"
	/>
	<!-- OverlayScrollbars -->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
		crossorigin="anonymous"
	/>
	<!-- Bootstrap Icons -->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
		crossorigin="anonymous"
	/>
	<!-- Apexcharts -->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
		crossorigin="anonymous"
	/>
	<!-- Jsvectormap -->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
		crossorigin="anonymous"
	/>
	<!-- AdminLTE -->
	<link rel="stylesheet" href="<?= base_url('teamplate') ?>/dist/css/adminlte.css" />
	<title>Kasir Sederhana</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- Sidebar -->
			<div class="col-md-3 col-lg-2 bg-light shadow-sm p-0">
				<div class="d-flex flex-column h-100 p-3 mt-3">
					<a href="<?= base_url('admin/index') ?>" class="d-flex align-items-center mb-3 text-decoration-none text-dark">
						<i class="bi bi-shop fs-4 me-2"></i>
						<span class="fs-4 fw-semibold">Cames Food</span>
					</a>
					<hr />
					<ul class="nav nav-pills flex-column gap-2">
						<li class="nav-item">
							<a href="<?= base_url('admin/makanan') ?>" class="nav-link link-dark">
								<ion-icon name="pizza-outline"></ion-icon> Makanan
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/minuman') ?>" class="nav-link link-dark">
								<ion-icon name="beer-outline"></ion-icon> Minuman
							</a>
						</li>
						<hr class="sidebar-divider" />
						<div class="sidebar-heading ps-2 py-1 text-uppercase fw-medium fs-6 text-muted">
							Admin
						</div>
						<li class="nav-item">
							<a href="<?= base_url('admin/tampilinput') ?>" class="nav-link link-dark">
								Tambah data
							</a>
						</li>
					</ul>
					<div class="mt-auto">
						<div class="nav-item">
							<a href="<?= base_url('auth/logout') ?>" class="nav-link link-danger" onclick="return confirm('Yakin ingin logout?')">
								<i class="bi bi-box-arrow-left me-2"></i> Logout
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Content -->
			<div class="col-md-9 col-lg-10 ms-auto">
				<div class="d-flex p-2" style="width: 50rem">
					<form method="GET" action="<?= base_url('admin/index') ?>" class="d-flex w-100">
						<input
							type="text"
							name="q"
							placeholder="Cari makanan dan minuman"
							class="form-control me-2"
							value="<?= htmlspecialchars($this->input->get('q') ?? '') ?>"
						/>
						<button class="btn btn-sm btn-primary" type="submit">Cari</button>
					</form>
				</div>

				<div class="d-flex justify-content-between flex-grow-1" style="gap: 1rem">
					<div class="container1 flex-grow-1 bg-body" style="width: 60%; gap: 1rem; height: 80vh; overflow-y: auto;">
						<?= $this->session->flashdata('message') ?? '' ?>
						<?php if ($halaman) {
							$this->load->view($halaman);
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<center>
			<p>Website &copy; 2025</p>
		</center>
	</footer>

	<!-- Ionicons -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<!-- Plugins -->
	<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<script src="<?= base_url('teamplate') ?>/dist/js/adminlte.js"></script>
</body>
</html>
