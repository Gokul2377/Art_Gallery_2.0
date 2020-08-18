<?php
ini_set( "display_errors", 0); 
session_start();

$conn = new mysqli('localhost', 'root', '', 'art_gallery');

$cost=$_POST['cost'];
$d_name=$_POST['d_name'];
$c_id=$_SESSION["id"];

if($cost<=0)
{
	echo 'Please enter a valid amount';
}

else
{
	$sql0="SELECT cost from customer";
	$sql="UPDATE customer SET cost=cost-'$cost' WHERE c_id='$c_id' ";
	$sql2="SELECT a_name from artist where a_name='$d_name'";

	$result0=mysqli_query($conn,$sql0);
	$row0=mysqli_fetch_assoc($result0);

	if($row0['cost']<$cost)
	{
		echo 'Low Account Balance';
	}

	else
	{

	$result2=mysqli_query($conn,$sql2);
	$row=mysqli_fetch_assoc($result2);

		if(is_null($row['a_name']))
		{	
		  echo 'Invalid Artist Name.';
		}
		else
		{	
			if($conn->query($sql)===TRUE){
	        echo '"Transaction successful!"';
			}
			else
			{
			  echo 'Errorr..';
			}
		}
	}

	
}

?>