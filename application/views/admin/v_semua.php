
<h1 class="m-2">Semua data yang ada ditampilkan disini</h1>

<div class="container-row d-flex flex-row flex-nowrap overflow-auto ">
	<?php 
	foreach($mhs as $items):
	?>
<div class="card m-2 flex-sm-row" style="width: 10rem">
	<div class="col">
				<img
					src="data:image/jpeg;base64,<?= base64_encode($items->gambar_barang) ?>"
					class="card-img-top p-2"
					alt="<?= htmlspecialchars($items->nama_barang) ?>"
					style="height: 120px; object-fit: cover;">

				
				<div class="card-body">
					<h5 class="card-title">Nasi Goreng</h5>
					<br />
					<p class="card-text">
						Rp 10.000
					</p>
					<a href="" class="btn btn-danger btn-sm p-2 m-1">Delete</a>
                    <a href="<?= base_url('admin/tampiledit/'. $items->id_barang)?>" class="btn btn-secondary btn-sm p-2 m-1">Edit</a>
                    <a href="<?= base_url('admin/detail/'. $items->id_barang)?>" class="btn btn-info p-2 m-1">Detail</a>

				</div>
				</div>
			</div>
			<?php
			endforeach;
			?>

</div>
<!-- 
<php
foreach($mhs as $item):
?>
                    <img src="data:image/jpeg;base64,<= base64_encode($item->gambar_barang) ?>"
                         class="card-img-top p-2"
                         alt="<= htmlspecialchars($item->nama_barang) ?>"
                         style="height: 120px; object-fit: cover;">
						 <php endforeach;?> -->