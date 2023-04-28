<?php
ob_start();
$user_type = $_COOKIE['type'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Eflyer</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <link rel="stylesheet" type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--  -->
   <!-- owl stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
      rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>

<body>
   <!-- banner bg main start -->
   <div class="banner_bg_main">
      <!-- header top section start -->
      <div class="container">
         <div class="header_section_top">
            <div class="row">
               <div class="col-sm-12">
                  <div class="custom_menu">
                     <?php
                     if (!isset($_COOKIE['email'])): ?>
                        <ul>
                           <li><a href="./index.php?action=register&#register">Register</a></li>
                           <li><a href="./index.php?action=login&#login">Log in</a></li>
                        </ul>
                     <?php else: ?>
                        <ul>
                           <li>
                              Welcome,
                              <?php echo $_COOKIE['email'] . ' (' . $_COOKIE['type'] . ')' ?>
                           </li>
                           <li><a href="logout.php">Logout</a></li>
                        </ul>
                     <?php endif ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top section start -->
      <!-- logo section start -->
      <div class="logo_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- logo section end -->
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="index.html">Home</a>
                  <a href="fashion.html">Fashion</a>
                  <a href="electronic.html">Electronic</a>
                  <a href="jewellery.html">Jewellery</a>
               </div>
               <a href="./index.php"><span class="toggle_icon"><img src="images/toggle-icon.png"></span></a>
               <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="#">Action</a>
                     <a class="dropdown-item" href="#">Another action</a>
                     <a class="dropdown-item" href="#">Something else here</a>
                  </div>
               </div>
               <div class="main">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search this blog">
                     <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"
                           style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </div>
               </div>
               <div class="header_box">
                  <div class="lang_box ">
                     <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i
                           class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                     </a>
                     <div class="dropdown-menu ">
                        <a href="#" class="dropdown-item">
                           <img src="images/flag-france.png" class="mr-2" alt="flag">
                           French
                        </a>
                     </div>
                  </div>
                  <?php
                  if ($user_type == 'customer'):
                     ?>
                     <div class="login_menu">
                        <ul>
                           <li><a href="index.php?cart=true">
                                 <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                 <span class="padding_10">Cart</span></a>
                           </li>
                        </ul>
                     </div>
                  <?php endif ?>
               </div>
            </div>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-12"
                           style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                           <?php
                           if ($user_type == 'admin') {
                              include 'calendar.php';
                           } else { ?>
                              <h1 class="banner_taital">Get Start <br>Your favorite shopping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-12">
                           <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                           <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-12">
                           <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                           <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
            <!-- Bookmark; auto-scrolls to register/login form when pressing their respective links -->
            <h1 id="login_form"></h1>
         </div>
      </div>
      <!-- banner section end -->
   </div>
   <!-- banner bg main end -->

   <!-- PHP Forms starts -->
   <?php
   include 'login.php';
   include 'register.php';
   ?>
   <!-- PHP Forms end -->

   <?php require 'body.php' ?>

   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html
               Templates</a></p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
      }
   </script>
</body>

</html>

<?php ob_end_flush() ?>