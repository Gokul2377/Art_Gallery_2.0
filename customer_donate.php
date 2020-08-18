<!DOCTYPE html>
<html>
<head>
	<title>E-WALLET</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<style type="text/css">
.block00 {
  padding: 3px 10px;
  margin-bottom: 3px;
}
body
{
	background-image: url('clou.jpeg');
}
input
{
	border-radius: 5px;
}	
#sub:hover,#bacc:hover
{
	transform: scale(1.02);
	background-color: #E3E3E3;
	cursor: pointer;
}			
h3,h4
{
	font-family: cambria;
}
</style>
<body>
	<h3>If you like the work of any Artists, Feel free to support them.</h3>
	<?php
	session_start();

	$conn = new mysqli('localhost', 'root', '', 'art_gallery');
	$sql="select a_name from artist";
	$result=mysqli_query($conn,$sql);

	$i=1;

	while($row = mysqli_fetch_array($result))
	{
		echo "<h4>".$i;
		echo ". ".$row['a_name']."</h4>";
		$i=$i+1;
	}

	?>

	<form method="post">
	<h3>Enter the Artist name you would like to donate to:</h3>
	<input type="text" id="d_name" class="block00" name="d_name">
	<h3>How much would you like to donate to them?</h3>
	<input type="number" id="cost" class="block00" name="cost">
	<input type="submit" id="sub" class="block00" name="submit" value="SUBMIT">
	</form>


	<?php
	ini_set( "display_errors", 0); 

	if(isset($_POST['submit']))
	{
		$d_name=$_POST['d_name'];
		$cost=$_POST['cost'];

		if($cost!=0)
		{
			$conn = new mysqli('localhost', 'root', '', 'art_gallery');
			$sql="UPDATE artist set donations=donations+'$cost' where a_name='$d_name'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);

			if(!is_null($row['donations']))
			{
				echo '<h3>Thanks for your support!</h3>';
			}
		}

	}

	?>

	<?php

	$c_id=$_SESSION["id"];	

	$sql2="select cost from customer where c_id='$c_id' ";
	$result2=mysqli_query($conn,$sql2);

	$row = mysqli_fetch_assoc($result2);
	echo "<h4>Current Account balance: ".$row['cost']."</h4>";

	?>

	<input type="button" name="bacc" id="bacc" class="block00" onclick="bacc()" value="BACK" style="margin-top: 5px;">

	<script>

	function bacc()
	{
		<?php

		$x=$_SESSION['id'];
		$y=$_SESSION['name'];
	
		?>

	    var x = "<?php echo $x ?>";
	    var y = "<?php echo $y ?>";

	    window.location="customer_lobby.php?x="+x+"&y="+y+"";
	}

	$(document).ready(function(){

				$("#sub").click(function(){

					var cost = document.getElementById('cost').value;
					var d_name=document.getElementById('d_name').value;

                    $.ajax({
                        url:'d_wallet.php',
                        method:'POST',
                        data:{
                            cost:cost,
                            d_name:d_name
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
