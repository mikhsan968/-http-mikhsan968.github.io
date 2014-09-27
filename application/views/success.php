<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Operasi Sukses</title>

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
            <li><a href="<?= site_url('review') ?>">Review</a></li>
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
		<h1>Operasi Sukses</h1>
		<p>Perintah berhasil dijalankan.</p>
		<p><a href="<?= site_url('home') ?>">Kembali ke halaman utama</a></p>
    </div>

    <script src="<?= base_url('vendor/jquery/jquery-1.11.1.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.js') ?>"></script>
  </body>
</html>