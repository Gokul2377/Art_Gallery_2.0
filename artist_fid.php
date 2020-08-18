<!DOCTYPE html>
<html>
<head>
	<title>Artist ID Recovery</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
</head>
<body>
<style type="text/css">
.block0 {
  padding: 6px 12px;
  margin-bottom: 3px;
}
.block2 {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 3px;
  margin-top: 4px;
  cursor: pointer;
}
input
{
  border-radius: 10px;
} 
input:hover
{
  transform: scale(1.02);
}   
body
{
  background-image: url('clou.jpeg');
}
button
{
  border: 2px solid grey;
  border-radius: 10px;
}
button:hover
{
  transform: scale(1.02);
}
</style>

<?php

$nameErr=$teleErr="";
$name=$tele="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["a_name"])) {
    $nameErr = " *  Name is required";
  } else {
    $name = test_input($_POST["a_name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = " *  Only letters and white space allowed";
    }
  }

  if (empty($_POST["phone"])) {
    $teleErr = " *  Mobile number required";
  	} else {
    	$tele = test_input($_POST["phone"]);
    	if (!preg_match("/^[0-9]{10,}$/",$tele)) {
        $teleErr = " *  Invalid mobile number entered (Must contain 10 digits)";
    	}
  	}

  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

	<form method="post">
	<h3>Fill in the following details</h3>
	<input type="text" name="a_name" class="block0" placeholder="NAME"><?php echo $nameErr;?></span>
	<br>
	<input type="text" name="phone" class="block0" placeholder="PHONE NO."><?php echo $teleErr;?></span>
	<br>
	<input type="submit" class="block2" name="done"></button>
	</form>

	<?php
	if(isset($_POST['done']))
	 {

	   $x=$_POST['a_name'];
	   $y=$_POST['phone'];

	   if($x==''||$y=='')
	   {
	   	echo '<script>EMPTY</script>';
	   }

	   else {

	   $con = new mysqli('localhost', 'root', '', 'art_gallery');
	   $query="SELECT a_id from artist where a_name='$x' and phone='$y'";
	   $result=mysqli_query($con,$query);

	   $row = mysqli_fetch_assoc($result);

	  if(mysqli_query($con,$query))  
      	{
      		if(is_null($row['a_id']))
      		{
      		  echo '<script>alert("Error! Account not found. Check details once again.")</script>'; 
      		}  
             else { 
           	echo '<script>alert("Recovery success")</script>';
           	echo "<h4>Artist ID: ".$row['a_id']."</h4>"; 
                  }              
           
      	}
      	else
      	{
      	    echo '<script>alert("Error!! Try again.")</script>';     		
      		   		
      	}
        }}

	?>

</body>
</html>
