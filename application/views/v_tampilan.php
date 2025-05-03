<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--begin::Fonts-->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
			integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
			crossorigin="anonymous"
		/>
		<!--end::Fonts-->
		<!--begin::Third Party Plugin(OverlayScrollbars)-->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
			integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
			crossorigin="anonymous"
		/>
		<!--end::Third Party Plugin(OverlayScrollbars)-->
		<!--begin::Third Party Plugin(Bootstrap Icons)-->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
			integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
			crossorigin="anonymous"
		/>
		<!--end::Third Party Plugin(Bootstrap Icons)-->
		<!-- apexcharts -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
			integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
			crossorigin="anonymous"
		/>
		<!-- jsvectormap -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
			integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
			crossorigin="anonymous"
		/>
		<link
			rel="stylesheet"
			href="<?= base_url('teamplate')?>/dist/css/adminlte.css"
		/>
		<title>Kasir Sederhana</title>
	</head>
	<body>
		
		<!-- sidebar start -->
		<!-- sidebar start mt-3 -->
<div class="container-fluid " >
    <div class="row" >

        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-light shadow-sm p-0 " >
            <div class="d-flex flex-column h-100 p-3 mt-3" >
                <a href="<?= base_url('barang/index')?>" class="d-flex align-items-center mb-3 text-decoration-none text-dark">
                    <i class="bi bi-shop fs-4 me-2"></i>
                    <span class="fs-4 fw-semibold">Heyin food</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column gap-2 " >
                    <li class="nav-item">
                        <a href="<?= base_url('barang/makanan')?>" class="nav-link link-dark" aria-current="page">
						<ion-icon name="pizza-outline"></ion-icon>
													Makanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang/minuman')?>" class="nav-link link-dark">
						<ion-icon name="beer-outline"></ion-icon>                            Minuman
                        </a>
                    </li>

					<hr>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/index')?>" class="nav-link link-dark">
						<!-- <ion-icon name="beer-outline"></ion-icon> -->
						                           admin
                        </a>
                    </li>
                    
                    
                </ul>
                <div class="mt-auto">
                    <div class="nav-item">
                        <a href="#" class="nav-link link-danger">
                            <i class="bi bi-box-arrow-left me-2"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 ms-auto">
            <!-- sidebar end -->
			<div class="d-flex p-2" style="width: 50rem;">
						<input type="text" placeholder="cari makanan dan minuman" class="form-control me-2"/>
						<button class="btn btn-sm btn-primary" type="submit">Cari</button>
						</div>

            <div class="d-flex justify-content-between flex-grow-1" style="gap: 1rem;">
                <div class="container1 flex-grow-1 bg-body" style="width: 60%; gap: 1rem; height: 80vh; overflow-y: scroll;">
                    <?php if($halaman) {
                        $this->load->view($halaman); 
                    } ?>
                </div>
                <div class="container2 bg-body-tertiary shadow-sm" style="width: 30% ">
                    <?php if($kasir) {
                        $this->load->view($kasir); 
                    } ?>
                </div>
				<!-- admin start -->
				<!-- admin end -->
            </div>
        </div>
    </div>
</div>
		<!-- card end -->
		 <!-- iocons start -->
		 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
		 <!-- iocons end -->
		<!--begin::Third Party Plugin(OverlayScrollbars)-->
		<script
			src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
			integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
			crossorigin="anonymous"
		></script>
		<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
			integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
			crossorigin="anonymous"
		></script>
		<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
			integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
			crossorigin="anonymous"
		></script>
		<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
		<script src="<?= base_url('teamplate')?>/dist/js/adminlte.js"></script>
		<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
		<!-- <script> -->
	</body>
</html>

<!-- cari -->
