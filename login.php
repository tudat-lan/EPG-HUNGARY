<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Belépés</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="bebum.png">

	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Név</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Jelszó</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<center><button type="submit" class="btn" name="login_user">Belépés</button></center>
  	</div>
  	<p>

  	</p>
  </form>
</body>
</html>