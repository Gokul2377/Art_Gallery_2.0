<?php 	
session_start();

$con=mysqli_connect('localhost','root','','art_gallery');

if(!$con)
{
	echo 'Please check your connection';
}	

if(isset($_GET['page']))
{
	$page=$_GET['page'];
}

else
{
	$page=1;
}

if(is_null($_GET['page']))
{
	header("location:base.php");
}

$num_per_page=01;
$start_from= ($page-1)*01;

$query="select * from artwork order by title desc limit $start_from,$num_per_page";
$result=mysqli_query($con,$query);


?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta http-equiv="X-UA Compatible" content="ie-edge">
	<title>Artworks</title>
</head>
<body>	
  <style>
    .block00 {
      padding: 3px 10px;
      margin-bottom: 3px;
    }
    body
    {
      background-image: url('clou.jpeg');
    }
    #bacc
    {
      border-radius: 5px;
      padding: 6px;
    }
    #bacc:hover,#cash:hover
    {
      transform: scale(1.03);
      cursor: pointer;
    }
    #cash
    {
      border-radius: 5px;
    }
    a,h3,h4
    {
      font-family: cambria;
    }

  </style>

<?php

 while($row=mysqli_fetch_assoc($result))
  {
    
  	$_SESSION['tit']=$row['title'];
  	$_SESSION['tit2']=$row['year'];
  	$_SESSION['tit3']=$row['type'];
  	$_SESSION['tit4']=$row['ar_id'];
  	$_SESSION['tit5']=$row['price'];

    $a_id=$row['ar_id'];

    echo '  
          <tr>  
            <td>
            	<div style="display:inline-block;vertical-align:top;">  
              <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="590" width="510" />
              	</div>
            </td>  
          </tr> 

          ';

      $query2="select a_name from artist where a_id='$a_id' ";
      $result2=mysqli_query($con,$query2);
      $row2=mysqli_fetch_assoc($result2);

   echo
   "
   <div style='display:inline-block;padding-left:12px;'>
   <h4>Title: ".$row['title']."</h4>
   <h4>Year: ".$row['year']."</h4>
   <h4>Type: ".$row['type']."</h4>
   <h4>Artist: ".$row2['a_name']."</h4>
   <h4>Price(INR): ".$row['price']."</h4>
   <input type='button' id='cash' value='PURCHASE' class='block00'>
   <h4 class='fonz'>Note: All Artworks are set to a fixed length to maintain uniformity.<br> However once purchased, They revert to their original resolution.</h4>
   </div>
   ";


   }

$tit=$_SESSION['tit'];
$tit2=$_SESSION['tit2'];
$tit3=$_SESSION['tit3'];
$tit4=$_SESSION['tit4'];
$tit5=$_SESSION['tit5'];

$uni=$_SESSION['id'];
$uni2=$_SESSION['name'];

?>


<form>

<?php

$pr_query= "select * from artwork order by title desc";
$pr_result= mysqli_query($con,$pr_query);
$total_record=mysqli_num_rows($pr_result);

$total_page= ceil($total_record/$num_per_page);

if($page>1)
{
echo "<a href='customer_explore.php?page=".($page-1)."'>PREV</a>";
}

for($i=1;$i<=$total_page;$i++)
{
  echo "<a style='padding:3px' href='customer_explore.php?page=".$i."'>$i</a>";
}

if($page<$total_page)
{
echo "<a href='customer_explore.php?page=".($page+1)."'>NEXT</a>";
}

?>

</form>
<br>

<button name='back' id="bacc" onclick="bac()">BACK</button>

<script>

	var title = "<?php echo $tit ?>"; 
	var year = "<?php echo $tit2 ?>"; 
	var type = "<?php echo $tit3 ?>"; 
	var ar_id = "<?php echo $tit4 ?>"; 
	var price = "<?php echo $tit5 ?>"; 

	var uni = "<?php echo $uni ?>"; 
	var uni2 = "<?php echo $uni2 ?>"; 

	$(document).ready(function(){

				$("#cash").click(function(){
                    $.ajax({
                        url:'trans.php',
                        method:'POST',
                        data:{
                            title:title,
                            year:year,
                            price:price,
                            ar_id:ar_id,
                            type:type,
                            uni:uni,
                            uni2:uni2
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                });
        
            });

	
	function bac()
	{
		<?php

		$x=$_SESSION['id'];
		$y=$_SESSION['name'];
	
		?>

    var x = "<?php echo $x ?>";
    var y = "<?php echo $y ?>";

    window.location="customer_lobby.php?x="+x+"&y="+y+"";
	}
  
    </script>
 	  
</body>
</html>
