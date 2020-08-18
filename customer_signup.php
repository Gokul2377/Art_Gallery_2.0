<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER DETAILS</title>
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
button
{
  font-family: veronica;
  font-size: 15px;
}
span
{
  font-family: Cambria;
  font-size: 16px;
  font-weight: bold;
}
h3
{
  font-family: Cambria;
}
</style>
<body>

<?php

$nameErr=$teleErr=$adErr="";
$name=$tele=$ad="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["c_name"])) {
    $nameErr = "  * Name required";
  } else {
    $name = test_input($_POST["c_name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "  * Only letters and white space allowed";
    }
  }

  if (empty($_POST["phone"])) {
    $teleErr = "  * Mobile number required";
  	} else {
    	$tele = test_input($_POST["phone"]);
    	if (!preg_match("/^[0-9 ]{7,}$/",$tele)) {
        $teleErr = "  * Invalid mobile number entered";
    	}
  	}

  	if (empty($_POST["address"])) {
    $adErr = "  * Address required";
  	}
  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h3>Create an Account. Quick and Easy</h3>
	<input type="text" name="c_name" class="block0" placeholder="CUSTOMER NAME"><span><?php echo $nameErr;?></span>
	<br>
	<input type="text" name="address" class="block0" placeholder="ADDRESS"><span><?php echo $adErr;?></span>
	<br>
	<input type="number" name="phone" class="block0" placeholder="PHONE NO."><span><?php echo $teleErr;?></span>
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
		$c_id=rand(10000,100000);
		$c_name=$_POST['c_name'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$cost=0;

		echo '<h4>CUSTOMER ID: '.$c_id.'</h4>';
		echo '<h4>Remember this, as it is required to login in.</h4>';

		$query="insert into customer(c_id,c_name,address,phone,cost) values ('$c_id','$c_name','$address','$phone','$cost')";

		if(mysqli_query($con,$query))  
      	{  
           echo '<script>alert("Details added into Database!")</script>';                 
      	}
      	else
      	{
      		echo '<script>alert("Error! Please Try again.")</script>';     			   		
      	}
	}
	}


	?>
</body>
</html>
