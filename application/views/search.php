<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Rekomendasi</title>

    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/search.css') ?>" rel="stylesheet">

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
            <li><a href="<?= site_url('review') ?>">Review</a></li>
            <li class="active"><a href="<?= site_url('search') ?>">Rekomendasi</a></li>
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
			<div class="col-md-6 col-md-offset-3">
				
				<h1>Rekomendasi Fasilitas Kesehatan</h1>
				<form action="<?= site_url('search/show') ?>" method="get">
					<h2>Kebutuhan</h2>
					<select multiple class="form-control" name="kebutuhan" required>
						<option value="bidan">Bidan</option>
						<option value="d_gigi">Dokter Gigi</option>
						<option value="d_umum">Dokter Umum</option>
						<option value="k_medis">Konsultasi Medis</option>
						<option value="optik">Optik</option>
						<option value="implant">Pelayanan Alat Implant</option>
						<option value="forensik">Pelayanan Dokter Forensik</option>
						<option value="jenazah">Pelayanan Jenazah</option>
						<option value="rawat_inap">Rawat Inap</option>
						<option value="rehab_medis">Rehabilitasi Medis</option>
						<option value="t_darah">Transfusi Darah</option>
						<option value="medik_nonsp">Tindakan Medik Non-spesialistik</option>
						<option value="medik_sp">Tindakan Medik Spesialistik</option>
					</select>
					<button type="submit" class="btn btn-primary">Berikan Rekomendasi</button>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKKdHe2kfdhW4NXkLoIwFkLw0HOvKibc0"></script>
	<script src="<?= base_url('js/info.js') ?>"></script>
  </body>
</html>