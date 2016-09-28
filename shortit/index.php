<?php
if(isset($_GET['redirect']))
{
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

  $id=$link[0];

  $sql="select * from link where id = $id";

  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0 )
  {
    $row = mysqli_fetch_assoc($result);
    $count=$row['visits'] + 1 ;

    $sql="UPDATE link SET visits=$count where id=$id";

    $result = mysqli_query($conn,$sql);

    $adr=$row['url'];
    header("Location: $adr");
    die();
  }
  else {header("Location: index.php");
die();
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
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=".">
          <image class="logo" src="logo.png" height="150%"/></a>
      </div>

      <!-- internal links -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Features</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="jumbotron text-center"><br/>
  <h1>Analyse shortened URLs for <b>FREE</b>!</h1>
  <p> Now generate re-direct links and follow stats <i class="fa fa-line-chart"></i> without any log-in </p>
<div class="row">
  <div class="col-sm-3"></div>

  <form class="col-sm-6" id="create">

      <div class="input-group form-jumbo">
        <input id="url_create" type="url" name="url" class="form-control form-jumbo" placeholder="Enter URL to be shorten here . . . "  required />

      <div class="input-group-btn">
        <button type="submit" name="url_submit" class="btn btn-primary form-jumbo" >Create <i class="fa fa-link"></i></button>
        </button>
      </div>

    </div>
    <br/>
  </form>

  <div class="col-sm-3"></div>

</div>
<h3 id="feature">CREATE - SHARE - ANALYSE</h3>

</div>
<hr style="border:dotted;color:#00ccff;margin:0;"/>
<br/><br/>
<div class="row text-center">
  <div class="features col-sm-4"><br/>
  <i class="fa fa-4x fa-link"></i>
  <h3><b>Create Link</b></h3>
  <p id="data">With short_it you can create<br/> a relatively shorter link with just one click !</p>
  </div>

  <div class="features col-sm-4">
  <i class="fa fa-4x fa-share"></i>
  <h3><b>Share Link</b></h3>
  <p>Share the link with your <br/>target audience / customers .</p>
  </div>

  <div class="features col-sm-4"><br/>
  <i class="fa fa-4x fa-line-chart"></i>
  <h3><b>Analyse Link</b></h3>
  <p>With short_it you can <br/>analyse the shortened links in details!</p>
  </div>
</div>
<br/><br/><br/>

<div class="row">
  <div class="col-sm-3"></div>

  <form class="col-sm-6" action="stats.php" method="get">

    <h3  class="features text-center" > See a detailed statistics of backlinks and number of visitors<br/> <i class="fa fa-arrow-down bounce"></i></h3>

      <div class="input-group form-feature">
<span class="input-group-addon" id="basic-addon3" style="letter-spacing: 2px;">localhost/shortit/</span>
        <input type="text" name="redirect" class="form-control form-feature" placeholder="Enter shortened code here . . .  " required />

      <div class="input-group-btn">
        <button type="submit" name="url_stats" class="btn btn-primary form-feature">See Stats </button>
        </button>
      </div>

    </div>
    <br/>
  </form>
  <div class="col-sm-3"></div>

</div>


<br/><br/>

<div id="about" class="text-center about"><hr style="border:dotted;"/>

<h1><b>ABOUT</b><br/> <image src ="logo.png" height="24px"></h1>
<hr/><br/>

<p>
  <b>Short_it</b> is a part of individual open-source project made by @radeonguy. <br/>
  This project is made using pHp , C++ and mySQL.<br/>
  It is available on  github <i class="fa fa-2x fa-github"></i>.<br/>
  Feel free to fork <i class="fa fa-code-fork"></i> or edit !<br/><br/><br/>

<!--
github card by @lepture
Thanks to him
-->

<iframe id="ghcard-lepture-2" frameborder="0" scrolling="0" allowtransparency="true"
src="http://lab.lepture.com/github-cards/cards/default.html?user=Smnradeon&amp;identity=ghcard-lepture-2&amp;repo=shortit&amp;client_id=a11a1bda412d928fb39a&amp;client_secret=92b7cf30bc42c49d589a10372c3f9ff3bb310037"
width="78%" height="180"></iframe><br/><br/><br/>
</p>
</div>

<br/>


<div id="contact" class="text-center contact">
<h1><b>Contact</b></h1>
<hr/><br/>
<p>
  <i class="fa fa-2x fa-linkedin-square contact-logo"></i> / <a href="https://www.linkedin.com/in/shaman-tyagi-98503167" target="_blank">Shaman Tyagi</a>
  <br/><br/>
  <i class="fa fa-2x fa-github-square contact-logo"></i> / <a href="https://github.com/Smnradeon" target="_blank">Shaman Tyagi</a>
  <br/><br/>
  <i class="fa  fa-envelope contact-logo"></i> : <a href="mailto:shamantyagi@gmail.com" target="_blank">shamantyagi@gmail.com</a>
  <br/><br/>
  Feel free to contact regarding queries or suggestions related to this project.
  <br/>I will try to reply within 24 hrs.
</p>
<br/><br/><br/><br/>
</div>

<footer class="container-fluid text-center" >
  <a href="#short_it" title="To Top">
<i class="fa fa-2x fa-angle-double-up"></i>
  </a><br/><br/>
  <p><b>Short_it</b> developed by <a href="http://www.hackerearth.com/@radeonguy" target="_blank" title="view developer's profile">@radeonguy</a> (Shaman Tyagi)</p>
<br/><br/>
</footer>


<!--modal window starts-->
<div class="container">
  <div class="modal fade" id="confirm" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#008fb3;color:#fff;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title modal-heading">SHORT_IT</h4>
        </div>
        <div  class="modal-body">
            <p id="data_recieved" style="overflow-x:hidden;"></p>
        </div>
      </div>
    </div>
  </div>
</div>



</body>

<!--smooth scrolling (copied)-->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#short_it']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top-50
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script>

<!--script for AJAX-->

<script>
$(document).ready(function(){
$("#create").submit(function(){
var url = $("#url_create").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'url='+ url ;
{
// AJAX Code To Submit Form.
$.ajax({
type: "GET",
url: "test.php",
data: dataString,
cache: false,
success: function(result){
$("#data_recieved").html(result);
}
});
}
return false;
});
});
</script>

<!--copy link jquery + clipboard-->
<script src="clipboard/dist/clipboard.min.js"></script>
<script>
var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);

    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});
</script>
</html>
