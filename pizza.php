<html>
<head>
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
<meta http-equiv="content-type" content="text/html ; charset=utf-8">
<title>Dane</title>
</head>
<body>
<div style="text-align: center">
   <div style="text-align: left; margin: 0 auto;">
<?php
		
	foreach ($_POST as $key => $value) {
		//mysql_query("UPDATE pytania SET $key='$value' WHERE id='$used_id[0]'");
		//echo $key . ' has the value of ' . $value.'</br>';
	}
	$rand=rand(1, 7);
	
	$zapytanie=mysql_query("SELECT * from pizze where id='$rand' limit 1");
	
	while ($row = mysql_fetch_array($zapytanie, MYSQL_NUM)) {
		?>
		<H1>Jesteś <?php echo $row[1]?>!</H1>
		<img src="img/<?php echo $row[3];?>" height='200px'/>
		<h5><?php echo $row[2];?></h5>
		<?php
	}
	
	?>
		</div>
	</div>
	<?php
	
	mysql_close($link);
?>

</body>
</html>
