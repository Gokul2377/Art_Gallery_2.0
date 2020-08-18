<!DOCTYPE html>
<html>
<head>
	<title>VIEW DETAILS</title>
</head>
<body>
<style type="text/css">
body
{
  background-image: url('clou.jpeg');
}  
</style>
	<form method="post">
	</form>

	<?php
		$server="localhost";
		$un="root";
		$pwd="";
		$db="art_gallery"; 

		$con=mysqli_connect($server,$un,$pwd,$db);

       $query = "SELECT * FROM exhibition ORDER BY e_id";  
       $result = mysqli_query($con, $query);

       if($result)
       {  
       while($row = mysqli_fetch_array($result))  
        {  
          echo '  
             <tr>  
               <td>
                 <p>EXHIBITION ID: '.$row['e_id'].'</p>  
                 <p>EXHIBITION NAME: '.$row['e_name'].'</p>
                </td>  
             </tr>  
                ';

          echo  "<p>LOCATION: ".$row['location']."</p>";
          echo  "<p>START_DATE: ".$row['start_date']."</p>";
          echo  "<p>END_DATE: ".$row['end_date']."</p>";

          echo "<br>";                    
         }
         }

         else
         {
         	echo '<script>alert("NO DATA AVAILABLE! PLEASE ADD DETAILS")</script>';
         	echo 'window.location.replace("http://127.0.0.1:82/dbm/page11.php?x=1");';
         } 

      ?>  

</body>
</html>
