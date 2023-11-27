<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

	<header>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">Navbar</a>
			</div>
		</nav>
	</header>

	<main class="container mt-4 pt-2">
		</div>
		<div class="my-2 row">
			<div class="col-sm-6">
				<h5>
					Data Produk
				</h5>
			</div>
			<div class="col-sm-6 text-right">
				<button type="button" class="btn btn-info" id="btn-singkronisasi">Singkronisasi Api</button>
				<button type="button" class="btn btn-success" id="btn-tambah">Tambah Produk</button>
			</div>
		</div>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<tr>
					<th scope="col" width="5%" class="text-center">No.</th>
					<th scope="col" width="25%">Nama Produk</th>
					<th scope="col" width="15%">Kategori</th>
					<th scope="col" width="15%">Harga</th>
					<th scope="col" width="15%">Status</th>
					<th scope="col" width="20%" class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(count($data_produk) != 0){
					foreach ($data_produk as $key => $produk){
				?>
					<tr>
						<th scope="row" class="text-center"><?= ++$key + $page; ?></th>
						<td><?= $produk->nama_produk; ?></td>
						<td><?= $produk->nama_kategori; ?></td>
						<td><?= $produk->harga; ?></td>
						<td><?= $produk->nama_status; ?></td>
						<td class="text-center">
							<button type="button" class="btn btn-sm btn-primary w-100 mb-2 btn-edit" data-id="<?= $produk->id_produk; ?>">Edit</button>
							<button type="button" class="btn btn-sm btn-danger w-100 btn-hapus" data-id="<?= $produk->id_produk; ?>">Hapus</button>
						</td>
					</tr>
				<?php 
					}
				}
				else {
				?>
					<tr>
						<td scope="row" class="text-center" colspan="6">Data kosong</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<div class="w-100 d-flex justify-content-center">
			<nav aria-label="Page navigation example">
				<?= $pagination; ?>
			</nav>
		</div>

		<!-- Modal dialog hapus data-->
		<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Anda ingin menghapus data ini?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="insertDataLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<form method="POST" id="form-data-produk" action="">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modal-title">Tambah Produk</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body px-4">
							<input type="hidden" name="id_produk" id="id_produk" value="">
							<div class="form-group">
								<label for="nama_produk">Nama Produk</label>
								<input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan nama produk">
								<div class="invalid-feedback" id="nama_produk_error">
								</div>
							</div>
							<div class="form-group">
								<label for="kategori">Kategori</label>
								<select class="form-control" id="kategori_id" name="kategori_id">
									<option value="" selected disabled hidden>Pilih Kategori</option>
									<?php foreach($kategori as $k): ?>
										<option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback" id="kategori_id_error">
								</div>
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" id="status_id" name="status_id">
									<option value="" selected disabled hidden>Pilih Status</option>
									<?php foreach($status as $s): ?>
										<option value="<?= $s->id_status; ?>"><?= $s->nama_status; ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback" id="status_id_error">
								</div>
							</div>
							<div class="form-group">
								<label for="harga">Harga</label>
								<input name="harga" type="text" class="form-control" id="harga" placeholder="Masukkan harga">
								<div class="invalid-feedback" id="harga_error">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" id="save-produk">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	<script>
		var id = null;
		$('.table').on('click', '.btn-hapus', function() {
			//ambil data dari atribute data 
			id = $(this).attr('data-id');
			$('#myModalDelete').modal('show');
		});

		function capitalize (text) {
			return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
		}

		function cleanForm(){
			$(`#nama_produk`).removeClass('is-invalid');
			$(`#nama_produk_error`).removeClass('invalid-feedback');
			$(`#nama_produk_error`).html('');
			$(`#kategori_id`).removeClass('is-invalid');
			$(`#kategori_id_error`).removeClass('invalid-feedback');
			$(`#kategori_id_error`).html('');
			$(`#status_id`).removeClass('is-invalid');
			$(`#status_id_error`).removeClass('invalid-feedback');
			$(`#status_id_error`).html('');
			$(`#harga`).removeClass('is-invalid');
			$(`#harga_error`).removeClass('invalid-feedback');
			$(`#harga_error`).html('');
		}

		$('#btn-singkronisasi').click(function(){
			$.ajax({
				url: '<?php echo base_url() ?>welcome/singkronisasi/',
				method: 'get',
				dataType: 'json',
				success: function(response) {
					if(response.status == 200){
						Swal.fire({
							title: capitalize(response.message),
							text: "Silakan reload halaman ini!",
							icon: "success",
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Reload"
						}).then((result) => {
							if (result.isConfirmed) {
								location.reload();
							}
						});
					} else if(response.status == 400){
						Swal.fire({
							title: capitalize(response.message),
							text: "Coba singkronisasi beberapa saat lagi.",
							icon: "error",
						});
					}
				}
			});
		});

		$('#btdelete').click(function() {
			$.ajax({
				url: '<?php echo base_url() ?>welcome/delete/',
				method: 'get',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					$('#myModalDelete').modal('hide');
					if(response.status == 200){
						Swal.fire({
							title: capitalize(response.message),
							text: "Silakan reload halaman ini!",
							icon: "success",
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Reload"
						}).then((result) => {
							if (result.isConfirmed) {
								location.reload();
							}
						});
					} else if(response.status == 400){
						Swal.fire({
							title: capitalize(response.message),
							text: "Coba hapus produk beberapa saat lagi.",
							icon: "error",
						});
					}
				}
			});
		});

		$('#save-produk').click(function(){
			let formData = $('#form-data-produk');
			$.ajax({
				url: formData.attr('action'),
				method: 'post',
				data: formData.serialize(),
				dataType: 'json',
				success: function(response) {
					if(response.status == 200){
						Swal.fire({
							title: capitalize(response.message),
							text: "Silakan reload halaman ini!",
							icon: "success",
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Reload"
						}).then((result) => {
							if (result.isConfirmed) {
								location.reload();
							}
						});
						$('#insertData').modal('hide');
					} else if(response.status == 400){
						for(var property in response.message){
							if(response.message[property] != ""){
								$(`#${property}`).addClass('is-invalid');
								$(`#${property}_error`).html(response.message[property]);
								$(`#${property}_error`).addClass('invalid-feedback');
							} else {
								$(`#${property}`).removeClass('is-invalid');
								$(`#${property}_error`).removeClass('invalid-feedback');
								$(`#${property}_error`).addClass('valid-feedback');
								$(`#${property}_error`).html("");
							}
						}
					}
				}
			});
		});

		$('.btn-edit').click(function(){
			let id = $(this).attr('data-id');
			$.ajax({
				url: '<?php echo base_url() ?>welcome/findProduck/',
				method: 'get',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					const produk = response['produk'];

					$('#modal-title').html('Edit Produk');
					$('#nama_produk').val(produk['nama_produk']);
					$('#harga').val(produk['harga']);
					$('#status_id').val(produk['status_id']);
					$('#kategori_id').val(produk['kategori_id']);
					$('#id_produk').val(produk['id_produk']);
					cleanForm();

					$('#insertData').modal('show');
					$('#form-data-produk').attr('action', '<?php echo base_url() ?>welcome/update');
				}
			});
		});

		$('#btn-tambah').click(function(){
			let id = $(this).attr('data-id');
			$('#modal-title').html('Tambah Produk');
			$('#nama_produk').val(null);
			$('#harga').val(null);
			$('#status_id').val(null);
			$('#kategori_id').val(null);
			$('#id_produk').val(null);
			cleanForm();

			$('#insertData').modal('show');
			$('#form-data-produk').attr('action', '<?php echo base_url() ?>welcome/insert');
		});
	</script>
</body>
</html>
