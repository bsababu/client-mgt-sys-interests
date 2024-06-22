<?php
include_once 'insrt/conn.php';
session_start();
date_default_timezone_set('Africa/Cairo');

if (isset($_POST['signup'])){
        
 $username = $_POST['username_'];

 $password = $_POST['password'];
 $pass = hash('sha512',$password);

 $status ='Up';
 $statuss ='Admin';
 
 $query = "SELECT * FROM `connector` WHERE username_='$username' and user_password='$pass' and ((user_ID='Admin') or (user_ID='Up') )";
 $result = mysqli_query($con,$query) or die(mysqli_error($con));
 $rows = mysqli_num_rows($result);
        if($rows===1){
    
      // $fname = $rows['user_fname'];
      // $lname = $rows['user_lname'];
      // $_SESSION['user_fname']=$fname;
        $_SESSION['username_'] =$username;
        $_SESSION['last_time'] = time();
    //  $_SESSION['user_lname'] = $lname;
         
     header("Location:home.php");
         }else{
          echo "<script>alert('invalid credentials!'); </script>";
         }
 }
?>
<!doctype html>
<html lang="en">



<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Welcome to new lusail</title>
<link rel="icon" href="img/new/logo.png">

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">

<link rel="stylesheet" href="css/themify-icons.css">

<link rel="stylesheet" href="css/flaticon.css">

<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="fontawesome/css/all.min.css">

<link rel="stylesheet" href="css/style.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<header class="main_menu home_menu">
<div class="container">
<div class="row">
<div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="index.php"> <img src="img/new/logo_.png" alt="logo"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse main-menu-item" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item active">
<!-- <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a> -->

<a href="#" id="add" data-toggle="modal" data-target="#add_data_Modal" class="float-center">Login</a>
</li>
<li class="nav-item">
<a class="nav-link" href="about.html">about</a>
</li>
<li class="nav-item">
<a class="nav-link" href="starter.html">Package</a>
</li>
<li class="nav-item">
<a class="nav-link page-scroll" href="#">Blog</a>
</li>

<li class="nav-item">
<a class="nav-link" href="contact.html">Contact us</a>
</li>
</ul>
</div>




</nav>
</div>
</div>
</div>
</header>


<section class="banner_part">
<div class="container">
<div class="row align-content-center">
<div class="col-lg-6">
<div class="banner_text aling-items-center">
<div class="banner_text_iner">
<h5>Beautiful investments</h5>
<h2>Everyone Deserves
the Opportunity of
being successful in life</h2>
<p>Qatar factory is a pioneer base manufacturing industry, in the Kingdom of Bahrain. We are engaged in producing a general purpose base oil, which
 can be reutized as a lubricant for any kind of machinery</p>
<a href="#" class="btn_1 banner_btn " >View Property</a>

  
        
<div class="d-none d-xl-block banner_social_icon">
<ul class="list-inline">
<li class="list-inline-item"><a href="#"><span class="ti-facebook"></span>facebook</a><span class="dot"><i class="fas fa-circle"></i></span></li>
 <li class="list-inline-item"><a href="#"><span class="ti-twitter-alt"></span>twitter</a><span class="dot"><i class="fas fa-circle"></i></span></li>
<li class="list-inline-item"><a href="#"><span class="ti-instagram"></span>instagram</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<a href="#" class="popup-youtube video_popup"><span class="ti-control-play"></span></a>
</section>





<div class="passion_part">
<div class="container">
<div class="row">
<div class="col-lg-5">
<div class="section_tittle">
<h1>Our Passion is <br>
People What’s Yours?</h1>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-lg-3">
<div class="single_passion">
<div class="single_passion_item">
<a href="#" class="passion_icon"> <i class="flaticon-compass"></i> </a>
<h4>Our management</h4>
<p>Fully Managed By a well-organized Team with over twenty years of Investment and Multi-Level Marketing experience, 
  providing expert financial advice</p>
<a href="#" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="single_passion">
<div class="single_passion_item">
<a href="#" class="passion_icon"> <i class="flaticon-desk"></i> </a>
<h4>Vibrant</h4>
<p>Enthusiastic team of investors are always here to make it work. WITH US: you are literally the creator of 
  YOUR own income for YOUR future</p>
<a href="#" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="single_passion">
<div class="single_passion_item">
<a href="#" class="passion_icon"> <i class="flaticon-bathroom"></i> </a>
<h4>Our payment</h4>
<p>Risk free for users, secure and anonymous transactions
Fast and instant payments, ultimate power of choice</p>
<a href="#" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="single_passion">
<div class="single_passion_item">
<a href="#" class="passion_icon"> <i class="flaticon-beach"></i> </a>
<h4>Ownership</h4>
<p>We provide you the ownership of your own system in order to make your own automatic 
  passive income making machine</p>
<a href="#" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="review_part" id="testimonial">
<div class="container">
<div class="row">
<div class="col-sm-8 col-lg-7">
<div class="section_tittle">
<h1>Our Happy Customer
Says About us</h1>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="review_part_text owl-carousel">
<div class="singler_eview_part">
<div class="client_info">
<img src="img/client_1.png" alt="">
<h4>Mouunt Alezaber</h4>
<p>Project manager</p>
</div>
<p><i>Enim a, scelerisque aliquet. Vivamus neque diam sed at, pede laoreet orci.
Potenti vel In sagittis nulla augue vitae et tempus torquent. Lacinia neque
mus taciti ante prsent at facilisis. Enim a, scelerisque aliquet. Vivamus
neque diam sed at, pede laoreet orci Potti, vel. In sagittis nulla augue
vitae et tempus torquent.</i></p>
</div>
<div class="singler_eview_part">
<div class="client_info">
<img src="img/client_2.png" alt="">
<h4>Mouunt Alezaber</h4>
<p>Project manager</p>
</div>
<p><i>Enim a, scelerisque aliquet. Vivamus neque diam sed at, pede laoreet orci.
Potenti vel In sagittis nulla augue vitae et tempus torquent. Lacinia neque
mus taciti ante prsent at facilisis. Enim a, scelerisque aliquet. Vivamus
neque diam sed at, pede laoreet orci Potti, vel. In sagittis nulla augue
vitae et tempus torquent.</i></p>
</div>
<div class="singler_eview_part">
<div class="client_info">
<img src="img/client_1.png" alt="">
<h4>Mouunt Alezaber</h4>
<p>Project manager</p>
</div>
<p><i>Enim a, scelerisque aliquet. Vivamus neque diam sed at, pede laoreet orci.
Potenti vel In sagittis nulla augue vitae et tempus torquent. Lacinia neque
mus taciti ante prsent at facilisis. Enim a, scelerisque aliquet. Vivamus
neque diam sed at, pede laoreet orci Potti, vel. In sagittis nulla augue
vitae et tempus torquent.</i></p>
</div>
<div class="singler_eview_part">
<div class="client_info">
<img src="img/client_2.png" alt="">
<h4>Mouunt Alezaber</h4>
<p>Project manager</p>
</div>
<p><i>Enim a, scelerisque aliquet. Vivamus neque diam sed at, pede laoreet orci.
Potenti vel In sagittis nulla augue vitae et tempus torquent. Lacinia neque
mus taciti ante prsent at facilisis. Enim a, scelerisque aliquet. Vivamus
neque diam sed at, pede laoreet orci Potti, vel. In sagittis nulla augue
vitae et tempus torquent.</i></p>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="cta_part">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">
<div class="cta_iner">
<h1>Are You Ready For success? </h1>
<p>Lights had saw moving saw female blessed</p>
<a href="#" class="cta_btn">Sing Up</a>
</div>
</div>
</div>
</div>
</div>


<div class="container">
<div class="row">
<div class="col-sm-8 col-lg-5">
<div class="section_tittle">
<h1>Read Latest
News From Our Blog</h1>
</div>
</div>
</div>

</div>


<footer class="footer_part">
<div class="container">

<div class="col-sm-12 col-lg-6">
<div class="footer_icon">
<ul class="list-unstyled">
<li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
<li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
<li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
</ul>
</div>

</div>
</div>
</footer>



<script src="js/jquery-1.12.1.min.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script src="js/popper.min.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script src="js/bootstrap.min.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script src="js/jquery.magnific-popup.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script src="js/owl.carousel.min.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script src="js/jquery.easing.min.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script src="js/custom.js" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="5fd84339fc7964e9f29c6d8d-text/javascript"></script>
<script type="5fd84339fc7964e9f29c6d8d-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="rocket-loader.min.js" data-cf-settings="5fd84339fc7964e9f29c6d8d-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com/preview/theme/rental/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Aug 2019 11:15:32 GMT -->
</html>
<form action="#" method="post"></form>
<div id="add_data_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
         <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title"></h4>
              </div>
             
                <div class="modal-body">
                   <form method="post" id="insert_form">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text"  name ="username_" class="form-control" id="inputWarning" placeholder="Your username ..." autofocus>
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="password"  name ="password" class="form-control" id="inputWarning" placeholder="Your password ..." >
                          <label>Forgot password? <a href="request.php"><strong>Recover</strong></a></label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                            <button type="submit" name="signup" id="signup" value="signup" class="btn btn-success"> Login</a></button>
                          </div>
                          
                          <div class="col-md-12">
                          <label>Are n't you registered, <a href="register.php"><strong>register here</strong></a></label>
                          </div>

                      </div>
                      
                  </div>
                 
                  
                  
        
         </div>
    </div>
</div>
</form>