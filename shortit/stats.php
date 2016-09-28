<?php

$visits=0;
if(!isset($_GET['redirect']))
{
header("Location: index.php");
//die();
}
else {
  $host="localhost";
  $user="root";
  $password="";
  $db="shortit";


  $conn = mysqli_connect($host,$user,$password,$db);

  if (!$conn) {
      die('There was problem in connection<br/>Could not connect : ' . mysqli_error($conn));
  }

  $id=$_GET['redirect'];

  exec("decode.exe $id",$link);

  $url="shortit/".$_GET['redirect'];

  $id=$link[0];

  $sql="select * from link where id = $id";

  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0 )
  {
    $row = mysqli_fetch_assoc($result);
    $visits=$row['visits'];
    $adr=$row['url'];
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>short_it</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body id="short_it" data-spy="scroll" data-target=".navbar" data-offset="60">

  <nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container-fluid">
      <!-- logo + toggle menu button for smaller screen-->
      <div class="navbar-header">
              <a class="navbar-brand" href=".">
        <image class="logo" src="logo.png" height="150%"/></a>
      </div>

    </div>
  </nav>
<br/><br/><br/><br/>

  <div class="row text-center">
    <div class="col-sm-1"></div>

    <div class="col-sm-10" style="letter-spacing:1px;">
<?php
echo "<b>Link</b> <br/>".$adr."<hr/>";
echo "<b>Short URL</b><br/><a href=".$_GET['redirect'].">".$url."</a><hr/>";
echo "<b>Total visits</b><br/>".$visits."<hr/>"

 ?>
</div>


    <div class="col-sm-1"></div>

  </div>

</body>
</html>
