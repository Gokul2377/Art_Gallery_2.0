<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'art_gallery');

$cost=$_POST['cost'];
$c_id=$_SESSION["id"];

if($cost<=0)
{
	echo 'Please enter a valid amount';
}

else
{
	$sql="UPDATE customer SET cost=cost+'$cost' WHERE c_id='$c_id' ";

	if($conn->query($sql)===TRUE){
	    echo '"E-wallet updated!"';
	}
	else
	{
		echo 'Errorr..';
	}
}

?>