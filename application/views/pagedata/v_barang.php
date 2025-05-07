			<?php

print_r($mhs);
?>
<!-- card start -->
<div class="container row ">
	<h3>all data</h3>
	<?php
	foreach($mhs as $isi){
		?>
		<div class="card" style="width: 10rem;">
			<img src="<?= base_url('gambar')?>/miegoreng.jpeg" alt="p">
			<div class="card-body">
				<h5><?php echo $isi-> nama_barang?></h5>
			</div>
		</div>
	<?php }?>
	<div class="card" style="width: 10rem";>
  <img src="<?= base_url('gambar')?>/miegoreng.jpeg" class="card-img-top" alt="...">

  <div class="card-body" >
    <h5 class="card-title">Card title</h5>
    <br>
	<p class="card-text"> 10.000</p>
    <a href="#" class="btn btn-primary btn-sm">Pilih baranga</a>
  </div>
</div>

		</div>


		<!-- ini adalah digunakan untuk tampilakn seluruh data -->

		<!-- <script>
  function ubahNilai(perubahan) {
    let input = document.getElementById('inputAngka');
    let nilaiSekarang = parseInt(input.value) || 0;
    let nilaiBaru = nilaiSekarang + perubahan;

    // Cegah nilai negatif
    if (nilaiBaru < 0) nilaiBaru = 0;

    input.value = nilaiBaru;
  }
</script> -->


<!-- div btn -->
		<!-- <div style="display: flex; align-items: center; gap: 10px;">
<button onclick="ubahNilai(-1)">-</button>
<input type="number" id="inputAngka" value="0" min="0" style="width: 60px; text-align: center;" readonly>
<button onclick="ubahNilai(1)">+</button>
</div> -->


