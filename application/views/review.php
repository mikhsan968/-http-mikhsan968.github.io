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
            <li><a href="<?= site_url('home') ?>">Utama</a></li>
            <li class="active"><a href="<?= site_url('review') ?>">Review</a></li>
            <li><a href="<?= site_url('search') ?>">Rekomendasi</a></li>
            <li><a href="<?= site_url('info') ?>">Informasi</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
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
						<input type="date" class="form-control" name="tanggal" placeholder="Tanggal kunjungan" required>
					</div>
					<div class="form-group">
						<label for="waktu">Waktu kunjungan</label>
						<input type="time" class="form-control" name="waktu" placeholder="Waktu kunjungan" required>
					</div>
					<div class="form-group">
						<label for="faskes">Fasilitas Kesehatan</label>
						<select name="faskes" class="form-control" placeholder="Fasilitas kesehatan" required>
							<?php foreach ($faskes as $key => $value) { ?>
								<option value="<?= $key ?>"><?= $value->name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="keterangan" class="form-control" rows="8" placeholder="Keterangan" required></textarea>
					</div>
					<div class="form-group">
						<label for="nilai">Penilaian</label>
						<select name="nilai" class="form-control" placeholder="Penilaian" required>
							<option value="1">1 - Sangat Buruk</option>
							<option value="2">2 - Buruk</option>
							<option value="3">3 - Biasa</option>
							<option value="4">4 - Bagus</option>
							<option value="5">5 - Sangat Bagus</option>
						</select>
					</div>
					<button type="submit" class="btn btn-default">Kirim</button>
				</form>
			</div>
		</div>
    </div>

    <script src="<?= base_url('vendor/jquery/jquery-1.11.1.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.js') ?>"></script>
  </body>
</html>