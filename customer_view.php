<!DOCTYPE html>
<html>
<head>
	<title>PURCHASED ARTWORKS</title>
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
</head>
<body>
	<form method="post">
	</form>

  <style type="text/css">
    .responsive {
        width: 100%;
        max-width: 400px;
        height: auto;
          }
     h4
     {
      font-family: cambria;
     }     
          
  </style>

	<?php

    session_start();

		$zx=$_SESSION["id"]; #customer id.
		$zy=$_SESSION["name"]; #customer name

		$con = new mysqli('localhost', 'root', '', 'art_gallery');
    
    $query = "SELECT * FROM purchase where a_id='$zx' and a_name='$zy'";
    $result = mysqli_query($con, $query);

    $query2 = "SELECT sum(price),count(title) FROM purchase where a_id='$zx'";
         $sum_cost=mysqli_query($con,$query2);

         while($row = mysqli_fetch_array($sum_cost))
         {
          echo "<h4>TOTAL RS. SPENT: ".$row['sum(price)']."</h4>";
          echo "<h4>NO. OF ARTWORKS BOUGHT: ".$row['count(title)']."</h4>";
         }  
         echo '------------------------------------------------------------------------------------------------';
    while($row = mysqli_fetch_array($result))  
      { 
          echo  "<h4>Title: ".$row['title']."</h4>";
          echo  "<h4>Year: ".$row['year']."</h4>";
          echo  "<h4>Type: ".$row['type']."</h4>";  
          echo  "<h4>Price: ".$row['price']."</h4>";

          $x=$row['title'];
          $y=$row['ar_id'];

          $query2= "SELECT * from artwork where ar_id='$y' and title='$x'";
          $result2 = mysqli_query($con, $query2); 


          while($row2=mysqli_fetch_array($result2))
           {

            echo '  
               <tr>  
               <td>  
                 <img src="data:image/jpeg;base64,'.base64_encode($row2['image'] ).'" class="responsive" />
                </td>  
             </tr>  
                ';
            }

             $query3 = "SELECT a_name FROM artist where a_id='$y'";
             $result3 = mysqli_query($con, $query3); 

             $row3 = mysqli_fetch_assoc($result3);

             echo  "<h4>Artist Credits: ".$row3['a_name']."</h4>";
            
           echo '------------------------------------------------------------------------------------------------'; 
        }

  ?>

</body>
</html>
