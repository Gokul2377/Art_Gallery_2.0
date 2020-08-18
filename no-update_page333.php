<?php
$conn = new mysqli('localhost', 'root', '', 'art_gallery');
$title=$_POST["title"];
$sql="UPDATE artwork set likes=likes-1 where title='$title'";
if($conn->query($sql)===TRUE){
    echo "UNLIKED";
}
?>