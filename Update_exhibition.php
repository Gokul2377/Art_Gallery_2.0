<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
</head>
<body>
	<form method="post">
		<p>
		ENTER THE EXHIBITION ID WHOSE DETAILS YOU WISH TO CHANGE: 
	<input type="text" name="X" placeholder="EXHIBITION ID" required>
		</p>
	<h3>FILL IN THE DETAILS YOU VIEW TO UPDATE</h3>
	<input type="text" name="e_name" placeholder="EXHIBITION NAME">
	<input type="text" name="loc" placeholder="LOCATION">
	<input type="date" name="star_d" placeholder="START_DATE">
	<input type="date" name="end_d" placeholder="END_DATE">
	<button name="submit">SUBMIT</button>
	</form>

	<?php
		$server="localhost";
		$un="root";
		$pwd="";
		$db="art_gallery"; 

		$con=mysqli_connect($server,$un,$pwd,$db);

	if(isset($_POST['submit']))
	 {

	 	$X=$_POST['X'];

		$e_name=$_POST['e_name'];
		$loc=$_POST['loc'];
		$star_d=$_POST['star_d'];
		$end_d=$_POST['end_d'];

		if(isset($e_name))
		{
			$query = "UPDATE exhibition SET e_name='$e_name' WHERE e_id='$X' ";  
        	$result = mysqli_query($con, $query);

        	if($result)
        	{
        		echo '<script>alert("UPDATION DONE!")</script>';
        	}
        	
		}

		if(isset($loc))
		{
			$query = "UPDATE exhibition SET location=$loc WHERE e_id='".$X."'";  
        	$result = mysqli_query($con, $query);
		}

		if(isset($star_d))
		{
			$query = "UPDATE exhibition SET start_date=$star_d WHERE e_id='".$X."'";  
        	$result = mysqli_query($con, $query);
		}

		if(isset($end_d))
		{
			$query = "UPDATE exhibition SET end_d=$end_d WHERE e_id='".$X."'";  
        	$result = mysqli_query($con, $query);
		}

	 }
        

    ?>

</body>

</body>
</html>
