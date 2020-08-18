<!DOCTYPE html>
<html>
<head>
	<title>VIEW ARTWORK</title>	 
	<meta name="viewport" content="width=device=width, initial-scale=1.0">   
</head>
<body>
	<style type="text/css">
		.responsive {
  			width: 100%;
  			max-width: 400px;
  			height: auto;
					}
		h3,h4
		{
			font-family: cambria;
		}
		
	</style>
	<form method="post">
	</form>
	<?php
		session_start();

		$x=$_GET['x'];

		$xx=$_SESSION['id'];
		$yy=$_SESSION['name'];
		
		if(is_null($x))
		{
		header("location: base.php?xx=69");
		}		

		$ar_id=$_SESSION["id"]; 

		$con = new mysqli('localhost', 'root', '', 'art_gallery');
		if(!$con)
		{
			echo 'Please check your connection';
		}	


       $query = "SELECT * FROM artwork where ar_id='$ar_id' ORDER BY title DESC ";  
       $result = mysqli_query($con, $query);

       while($row = mysqli_fetch_array($result))  
		    { 
		       echo '  
		          <tr>  
		             <td>  
		                <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="responsive" />
		             </td> 
		          </tr>  
		            ';       

		       echo  "<h4>Title: ".$row['title']."</h4>";
		       echo  "<h4>Year: ".$row['year']."</h4>";
		       echo  "<h4>Type: ".$row['type']."</h4>";
		       echo  "<h4>No. of pieces sold: ".$row['sold']."</h4>";   
		    }

      ?>  
</body>
</html>
