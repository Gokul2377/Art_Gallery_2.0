<?php
session_start();

$x=$_GET['x'];
$y=$_GET['y'];

if($x==""||$y=="")
{
	header("location: artist_login.php");
}

$_SESSION["id"]=$x;
$_SESSION["name"]=$y;

$con = new mysqli('localhost', 'root', '', 'art_gallery');
$query="select * from artist where a_id='".$x."'";
$result=mysqli_query($con,$query);

$row = mysqli_fetch_assoc($result);
{
    if($row["a_name"]==$y)
    {
        echo "<h3>Welcome, ".$y."</h3>";          
    }
    else
    {
        header("location:artist_login.php?fn=empty");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ARTIST LOBBY</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
</head>
<style type="text/css">
.block {
  display: block;
  padding: 10px 13px;
  margin-bottom: 3px;
}
h3,h4
{
	font-family: cambria;
}
body
{
	background-image: url('clou.jpeg');
} 
button
{
  border: 2.5px solid darkgrey;
  border-radius: 8px;
  font-size: 13px;
}
button:hover
{
  transform: scale(1.02);
  background-color: #E3E3E3;
}	
</style>
<body>
<button name="upload" class="block" onclick="upload()">UPLOAD ARTWORK</button>
<button name="view" id="v" class="block" onclick="view()">VIEW MY ARTWORKS</button>
<button name="home" class="block "onclick="home()">GO TO THE HOME PAGE</button>

<?php

$sql3="SELECT donations from artist where a_id='$x'";
$result3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_assoc($result3);

if($row3!=0)
{
echo '<h4>Customer Donations (to date): '.'Rs. '.$row3['donations']."</h4>";
}

?>

<?php

$query2 = "SELECT * FROM artwork where ar_id='$x' ORDER BY title DESC ";  
$result2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_array($result2);

if(is_null($row2))
   {
   	echo '<br><br>';
     echo 'No Artworks uploaded yet.';
     echo '<script> document.getElementById("v").disabled=true </script>';
   }

?>

<script type="text/javascript">
	function upload()
	{
		window.location="artist_img.php?x=1";
		exit();
		session_close();
	}
	   
	function view()
	{
		window.location="artist_view.php?x=1";
		exit();
		session_close();
	}

	function home()
	{
		window.location="index.php";
		exit();
		session_close();
	}	   			
		
</script>

</body>
</html>
