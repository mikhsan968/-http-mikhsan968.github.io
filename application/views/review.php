<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Review</title>

    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/review.css') ?>" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navigasi</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= site_url() ?>">Ngidesehat</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= site_url('review') ?>">Review</a></li>
            <li><a href="<?= site_url('search') ?>">Rekomendasi</a></li>
            <li><a href="<?= site_url('info') ?>">Informasi</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
		  			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Buku <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?= base_url('books/Buku_Pegangan_Sosialisasi_BPJS.pdf') ?>">Buku Pegangan Sosialisasi BPJS</a></li>
					<li><a href="<?= base_url('books/Buku-Panduan-Layanan-bagi-Peserta-BPJS-Kesehatan.pdf') ?>">Buku Panduan Layanan bagi Peserta BPJS Kesehatan</a></li>
					<li><a href="<?= base_url('books/SE_31_ttg_Pelaksanaan_Standar_Tarif_Pelayanan_Kesehatan.pdf') ?>">Standar Tarif Pelayanan Kesehatan</a></li>
					<li><a href="<?= base_url('books/pmk-no-69-ttg-tarif-pelayanan-kesehatan-program-jkn.pdf') ?>">Tarif Pelayanan Kesehatan Program JKN</a></li>
				</ul>
			</li>
			<li><a href="<?= site_url('home') ?>"><?= $mail ?></a></li>
            <li><a href="<?= site_url('auth/logout') ?>">Keluar</a></li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<h1>Submit Review</h1>
				<form action="<?= site_url('review/post') ?>" method="post" role="form">
					<div class="form-group">
						<label for="tanggal">Tanggal kunjungan</label>
						<input type="date" class="form-control" name="tanggal" required>
					</div>
					<div class="form-group">
						<label for="waktu">Waktu kunjungan</label>
						<input type="time" class="form-control" name="waktu" required>
					</div>
					<div class="form-group">
						<label for="faskes">Fasilitas Kesehatan</label>
						<select name="faskes" class="form-control" required>
							<?php foreach ($faskes as $key => $value) { ?>
								<option value="<?= $key ?>"><?= $value->name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="keterangan" class="form-control" rows="8" required></textarea>
					</div>
					<div class="form-group">
						<label for="nilai">Penilaian</label>
						<select name="nilai" class="form-control" required>
							<option value="1">1 - Sangat Buruk</option>
							<option value="2">2 - Buruk</option>
							<option value="3" selected>3 - Biasa</option>
							<option value="4">4 - Bagus</option>
							<option value="5">5 - Sangat Bagus</option>
						</select>
					</div>
					<button type="submit" class="btn btn-default">Kirim</button>
				</form>
			</div>
		</div>
    </div>
	
	<footer class="container">
		<hr>
		<p class="text-muted">&copy; 2014 Ngidesehat</p>
	</footer>

    <script src="<?= base_url('vendor/jquery/jquery-1.11.1.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.js') ?>"></script>
  </body>
</html>