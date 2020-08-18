<!DOCTYPE html>
<html>
<head>
	<title>ARTIST DETAILS</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
</head>
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
h3,h4
{
  font-family: Cambria;
  font-size: 18px;
}		
button	
{
  font-size: 14px;
  font-family: Cambria;
}
body
{
  background-image: url('clou.jpeg');
}
input
{
  border-radius: 10px;
  border: 2px solid grey;
} 
input:hover
{
  transform: scale(1.02);
}   
button
{
  border: 2px solid darkgrey;
  border-radius: 10px;
}
button:hover
{
  transform: scale(1.02);
}
</style>

<?php

$nameErr=$teleErr=$cErr="";
$name=$tele=$c="";

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
    	if (!preg_match("/^[0-9 ]{10,}$/",$tele)) {
        $teleErr = " *  Invalid mobile number entered (Must contain 10 digits)";
    	}
  	}

  	if (empty($_POST["country"])) {
    $cErr = " *  Country required";
  	} else {
    $c = test_input($_POST["country"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = " *  Only letters and white space allowed";
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
	<body>
	<h3>Create an Account. Quick and Easy</h3>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" name="a_name" class="block0" placeholder="ARTIST NAME" value="<?php echo $name;?>"><span><?php echo $nameErr;?></span>
	<br>
	<input type="text" name="country" class="block0" placeholder="COUNTRY"><span><?php echo $cErr;?></span>
	<br>
	<input type="number" name="phone" class="block0" placeholder="PHONE NO." value="<?php echo $tele;?>"><span><?php echo $teleErr;?></span>
	<br>
	<button name="submit" class="block2">SUBMIT</button>
	<br>
	
	</form>

	<?php

	$con = new mysqli('localhost', 'root', '', 'art_gallery');

	if($nameErr==""&&$teleErr=="")
	{
	if(isset($_POST['submit']))
	{

		$a_id=rand(10000,200000);
		$a_name=$_POST['a_name'];
		$country=$_POST['country'];
		$phone=$_POST['phone'];
		$donations=0;

		echo '<h4>ARTIST ID: '.$a_id.'</h4>';
		echo '<h4>Remember this, as it is required to login in.</h4>';
		
		$query="insert into artist values ('$a_id','$a_name','$country','$phone','$donations')";

		if(mysqli_query($con,$query))  
      	{  
           echo '<script>alert("Details successfully added into Database!")</script>';                
           
      	}
      	else
      	{
      		echo '<script>alert("Error! Try again.")</script>';     		
      		   		
      	} 
	}
}
	?>		
</body>
</html>
