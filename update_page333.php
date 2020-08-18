<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'art_gallery');
$conn2 = new mysqli('localhost', 'root', '', 'art_gallery');


$title=$_POST["title"];
$uni=$_SESSION["id"];

$sql="UPDATE artwork set likes=likes+1 where title='$title'";

if($conn->query($sql)===TRUE){
    echo "THANKS FOR YOUR SUPPORT!";

    $sql3="UPDATE purchase SET like_counter=1 WHERE title='$title' and a_id='$uni' ";
	$conn2->query($sql3);
}
?>