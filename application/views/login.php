<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk</title>

    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/signin.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="" method="post" role="form">
	    <img class="img-ngidesehat img-responsive center-block" src="<?= base_url('img/ngidesehat.png') ?>">
		
		<?php if (isset($error)) { ?>
			<div class="alert alert-danger" role="alert"><strong>Error:</strong> Wrong email and/or password combination.</div>
		<?php } ?>
		
        <input type="email" name="mail" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      </form>

    </div> <!-- /container -->
	
  </body>
</html>