<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Material Design Lite HTML Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,500,300italic,500italic,700italic,900,300'>
<link rel='stylesheet' href='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">

  <?php
	$link=mysql_connect("localhost","root","") 
		or die ("złe dane do logowania");

	mysql_select_db("pizzogra")
		or die("baza danych nie istnieje");
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
	mysql_query("SET CHARSET utf8");
	$insercik=mysql_query("INSERT INTO pytania SET ID=''");
	$used_id=mysql_fetch_array(mysql_query("SELECT MAX(id) FROM pytania;"));
?>
</head>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Jaką pizzą jesteś?</span>
    </div>
  </header>

 <?php
		
	foreach ($_POST as $key => $value) {
		mysql_query("UPDATE pytania SET $key='$value' WHERE id='$used_id[0]'");
		//echo $key . ' has the value of ' . $value.'</br>';
	}
	$rand=rand(1, 7);
	$zapytanie=mysql_query("SELECT * from pizze where id='$rand' limit 1");
	
	while ($row = mysql_fetch_array($zapytanie, MYSQL_NUM)) {
	?>

  <main class="mdl-layout__content">

    <div class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
      <div class="page-content">
        <div class="hero-section" style="background-image: url(img/<?php echo $row[3];?>);">
          <div class="hero-text mdl-typography--text-center">

            <h1 class="mdl-typography--display-2">Jesteś <?php echo $row[1]?>!</h1>
            <p class="mdl-typography--display-1">
		<?php echo $row[2];?>
            </p>
	<?php
		}
	
	?>
          </div>

        </div>

   

      </div>
    </div>

    <div class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">

         </div>
 
</div>
  <script src='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
