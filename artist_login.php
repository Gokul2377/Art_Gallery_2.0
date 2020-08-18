<?php

if(isset($_GET['fn']))
	if($_GET['fn']=="empty")
		echo'<script>alert("Invalid details. Try again")</script>';

?>
<!DOCTYPE html>
<html>
<head>
	<title>ARTISTS LOGIN</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
</head>
<style type="text/css">
.block {
  display: block;
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
	background-color: #E3E3E3;
}
h3,h4
{
	font-family: Cambria;
	font-size: 18px;
}
</style>
<body>
	<form method="get" action="artist_lobby.php">
		<h3>Artist Log-in</h3>
		<input type="text" name="x" class="block" placeholder="ARTIST ID" required>
		<input type="text" name="y" class="block" placeholder="ARTIST NAME" required>
		<div style="display: inline-block">
		<button name="submit" class="block2">LOGIN</button>
		<button name="submit" class="block2" onclick="f_id()">FORGET ID</button>	
		</div>
		<h4>New User? Sign up below</h4>
		<button name="submit" class="block" style="margin-top: -12px;" onclick="u_sign()">SIGN UP</button>		
	</form>
	
	

<script type="text/javascript">
	function u_sign()
	{
		window.location="artist_signup.php";
	}	

	function f_id()
	{
		window.location="artist_fid.php";
	}	
</script>	
</body>
</html>
