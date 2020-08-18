<!DOCTYPE html>
<html>
<head>
	<title>E-WALLET</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<style type="text/css">
.block00 {
  padding: 4px 12px;
  margin-bottom: 3px;
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
#sub:hover
{
  transform: scale(1.02);
  cursor: pointer;
}
h3,h4
{
	font-family: cambria;
}	
</style>
	<form method="post">
	<h3>HOW WOULD LIKE TO DEPOSIT TO YOUR E-WALLET?</h3>
	<input type="number" id="cost" class="block00" name="cost">
	<input type="submit" id="sub" class="block00" name="Submit" value="SUBMIT">
	</form>

	<?php
	session_start();

	$c_id=$_SESSION["id"];	

	$con = new mysqli('localhost', 'root', '', 'art_gallery');
	$sql2="select cost from customer where c_id='$c_id' ";
	$result2=mysqli_query($con,$sql2);
	$row = mysqli_fetch_assoc($result2);

	echo "<h4>Current Account balance: ".$row['cost']."</h4>";

	?>

	<script>

	$(document).ready(function(){

				$("#sub").click(function(){

					var cost = document.getElementById('cost').value;

                    $.ajax({
                        url:'wallet.php',
                        method:'POST',
                        data:{
                            cost:cost
                        },
                        success:function(response){
                            alert(response);
                           
                        }
                    });
                });
            });

	</script>

</body>
</html>
