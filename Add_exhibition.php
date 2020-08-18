<!DOCTYPE html>
<html>
<head>
	<title>ADD DETAILS</title>
</head>
<body>
	<form method="post">
	<input type="text" name="e_id" placeholder="EXHIBITION ID" required> 
	<input type="text" name="e_name" placeholder="EXHIBITION NAME" required>
	<input type="text" name="loc" placeholder="LOCATION" required>
	<input type="date" name="star_d" placeholder="START_DATE" required>
	<input type="date" name="end_d" placeholder="END_DATE" required>
	<button name="submit">SUBMIT</button>
	<br>
	<h4>*Note: Cannot modify Exhibition ID Later.</h4>
	</form>

	<?php

	$server="localhost";
	$un="root";
	$pwd="";
	$db="art_gallery";

	$x=$_GET['x'];
	
	if(is_null($x))
	{
	header("location: base.php?xx=69");
	} 

	$con=mysqli_connect($server,$un,$pwd,$db);

	if(isset($_POST['submit']))
	{
		$e_id=$_POST['e_id'];
		$e_name=$_POST['e_name'];
		$loc=$_POST['loc'];
		$star_d=$_POST['star_d'];
		$end_d=$_POST['end_d'];

		$star_d=date("Y-m-d",strtotime($star_d));
		$end_d=date("Y-m-d",strtotime($end_d));

		$query="insert into exhibition(e_id,e_name,location,start_date,end_date) values ('$e_id','$e_name','$loc','$star_d','$end_d')";

		if(mysqli_query($con,$query))  
      	{  
           echo '<script>alert("Details added into Database!")</script>';               
           
      	}
      	else
      	{
      		echo '<script>alert("Invalid! Try again.")</script>';     		
      		   		
      	}
	}


	?>
</body>
</html>
