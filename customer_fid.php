<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER ID Recovery</title>
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
body
{
  background-image: url('clou.jpeg');
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
h3
{
  font-family: cambria;
}
span
{
  font-family: cambria;
  font-size: 16px;
  font-weight: bold;
}
</style>

<?php

$nameErr=$teleErr="";
$name=$tele="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = " *  Name is required";
  } else {
    $name = test_input($_POST["name"]);
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
	<input type="text" name="name" class="block0"placeholder="NAME"><span><?php echo $nameErr;?></span>
	<br>
	<input type="text" name="phone" class="block0" placeholder="PHONE NO."><span><?php echo $teleErr;?></span>
	<br>
	<input type="submit" name="done" class="block2" value="SUBMIT"></button>
	</form>

	<?php

	if(isset($_POST['done']))
	 {

	   $x=$_POST['name'];
	   $y=$_POST['phone'];

	   if($x==''||$y=='')
	   {
	   	echo '<script>EMPTY</script>';
	   }

	   else{

	   $con = new mysqli('localhost', 'root', '', 'art_gallery');
	   $query="SELECT c_id from customer where c_name='$x' and phone='$y'";
	   $result=mysqli_query($con,$query);

	   $row = mysqli_fetch_assoc($result);

	   if(mysqli_query($con,$query))  
      	{
      		if(is_null($row['c_id']))
      		{
      			echo '<script>alert("Error! Account not found. Check details once again.")</script>'; 
      		}  
           else { 
           	echo '<script>alert("Recovery success")</script>';
           	echo '<br>';
	   		echo "CUSTOMER ID: ".$row['c_id']; 
           }              
           
      	}
      	else
      	{
      		echo '<script>alert("Error!! Try again.")</script>';     		
      		   		
      	}
      }
      	
	}

	?>

</body>
</html>
