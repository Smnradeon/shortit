<?php
$url = $_GET['url'];

echo '<script>
$(document).ready(function(){
        $("#confirm").modal();
});
</script>';


$host="localhost";
$user="root";
$password="";
$db="shortit";


$conn = mysqli_connect($host,$user,$password,$db);

if (!$conn) {
    die('There was problem in connection<br/>Could not connect : ' . mysqli_error($conn));
}

$sql="select id from link where url = '$url'";

$result = mysqli_query($conn,$sql);

$id=0;

if(mysqli_num_rows($result) > 0 )
{
  $row = mysqli_fetch_assoc($result);
  echo "<br/>$url <p style='color:red;font-family:Lato;size:18;'> is already present in our database </p>";

  $id=$row['id'];

}
else{
$sql="INSERT INTO link (url,visits,created ) values ('$url',0,'today')";
$result = mysqli_query($conn,$sql);

$sql="select id from link where url = '$url'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$id=$row['id'];
echo "$url <p style='color:green;font-family:Lato;size:18;'> is successfully shortened !";
}

exec("encode.exe $id",$link);

mysqli_close($conn);
echo "<button class='btn btn-primary' style='float:right' data-clipboard-text='localhost/shortit/$link[0]'>Copy Link</button><br/>";
echo "<br/><div class='well' id='link_created'><a href='stats.php?redirect=$link[0]'>shortit/$link[0]</a></div>";

?>
