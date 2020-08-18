<!DOCTYPE html>
<html>
<head>
	<title>APTX</title>
	<h4>* Unfinished abandoned idea</h4>
</head>
<body>
	<form method="post">
	<button name="add_e">ADD EXHIBITION DETAILS</button>
	<button name="view_e">VIEW EXHIBITION DETAILS</button>
	<button name="up_e">UPDATE EXHIBITION DETAILS</button>
	</form>	

<?php

$x=$_GET['x'];

if($x!='pass')
{
	header('location: base.php?xx=69');
}

if(isset($_POST['add_e']))
{
	header('location: Add_exhibition.php?x=1');
}

if(isset($_POST['view_e']))
{
	header('location: View_exhibition.php');
}

if(isset($_POST['up_e']))
{
	header('location: Update_exhibition.php');
}

?>
</body>
</html>
