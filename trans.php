<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'art_gallery');

$title=$_POST["title"];
$ar_id=$_POST["ar_id"];
$year=$_POST["year"];
$price=$_POST["price"];
$type=$_POST["type"];

$uni=$_SESSION["id"];
$uni2=$_SESSION["name"];

$query="SELECT cost from customer where c_id='$uni'";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$currB=$row['cost'];

if($currB < $price)
{
	echo 'LOW BALANCE.';
}

else
{
	$sql="INSERT INTO purchase VALUES ('$title','$year','$type','$ar_id','$price','$uni','$uni2')";

	if($conn->query($sql)===TRUE){
	    echo "PURCHASED!";

	    $sql2="UPDATE customer SET cost=cost-'$price' WHERE c_id='$uni' ";
	    $conn->query($sql2);

	    $sql3="UPDATE artwork set sold=sold+1 where title='$title' ";
	    $conn->query($sql3);
	}
	else
	{
		echo 'Connection error. Try again..';
	}
}

?>