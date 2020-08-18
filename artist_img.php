<?php
session_start();

$con = new mysqli('localhost', 'root', '', 'art_gallery');

$xx=$_GET['x'];

if(is_null($xx))
{
  header("location: base.php?xx=69");
}

$x=$_SESSION["id"];
$y=$_SESSION["name"];

 if(isset($_POST["insert"]))  
 {          
      $title=$_POST['title'];
      $year=$_POST['year'];
      $type=$_POST['type']; 
      $price=$_POST['price'];          
      $likes=0;
      $sold=0;
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $query = "insert into artwork values ('$title','$year','$type','$file','$x',$likes,'$price','$sold')";

      if($title!=" ")
      {
          if(mysqli_query($con,$query))  
          {  
               echo '<script>alert("Artwork Inserted into Database!")</script>';          
               
          }
          else
          {
            echo '<script>alert("Title already taken! Please try a new one.")</script>';
          }
      }
      else
      {
        echo '<script>alert("Please fill in all the details!)</script>';
      }
      

 }  

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ARTWORK</title>
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
</head>
<body>
<style type="text/css">
input
{
  border-radius: 8px;
  padding: 2.8px;
}    
body
{
  background-image: url('clou.jpeg');
} 
h3,h4
{
  font-family: cambria;
  font-weight: bold;
}
#insert
{
  padding: 5px;
  border-radius: 10px;
}
#insert:hover
{
  background-color: #E3E3E3;
  transform: scale(1.03);
}
</style>
	<form method="post" enctype="multipart/form-data">
       <h4 style="margin-left: 5px;">Fill in all the following details.</h4>
       <input type="text" name="title" placeholder="Title" required style="margin: 5px;"> 
       <br />
       <input type="number" name="year" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required placeholder="Year" style="margin: 5px;"/>
       <br />
       <input type="text" name="type" placeholder="Type" required style="margin: 5px;">
       <br/>
       <input type="file" name="image" id="image" required style="margin: 5px; margin-bottom: -10px;">  
       <br />
       <input type="number" name="price" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" required placeholder="Price(INR)" style="margin: 5px; margin-bottom: -10px;"/> 
       <br />
       <br /> 
       <input type="submit" name="insert" id="insert" value="UPLOAD" style="margin: 5px;" /> 
    </form>

</body>
</html>
<script>
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();

           input = document.getElementById('image');
           file = input.files[0];           

           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }

           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }
           
           if(file.size>1000000)
           {
            alert("Size limit exceeded! Try again!!");
            return false;
           }    
      });  
 });  
 </script>
