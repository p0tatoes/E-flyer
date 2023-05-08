<?php
include 'head.php';
$user_type = $_COOKIE['type'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eflyer - Manage Orders</title>
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesoeet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
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
                            if (!isset($_COOKIE['email'])) : ?>
                                <ul>
                                    <li><a href="./index.php?action=register&#register">Register</a></li>
                                    <li><a href="./index.php?action=login&#login">Log in</a></li>
                                </ul>
                            <?php else : ?>
                                <ul>
                                    <li>
                                        Welcome,
                                        <?php echo $_COOKIE['email'] . ' (' . $_COOKIE['type'] . ')' ?>
                                    </li>
                                    <?php
                                    if ($_COOKIE['type'] == 'customer') { ?>
                                        <li>
                                            <a href="orders.php">My Orders</a>
                                        </li>
                                    <?php } ?>
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

                    <!-- ? remove probably -->
                    <!-- <a href="./index.php"><span class="toggle_icon"><img src="images/toggle-icon.png"></span></a> -->

                    <a href="./index.php"><span class="toggle_icon"><i class="fa fa-home" aria-hidden="true" style="transform: scale(3.5);"></i></span></a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
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
                                <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">
                        <div class="lang_box ">
                            <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English
                                <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <a href="#" class="dropdown-item">
                                    <img src="images/flag-france.png" class="mr-2" alt="flag">
                                    French
                                </a>
                            </div>
                        </div>
                        <?php
                        if ($user_type == 'customer') :
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
                                <div class="col-sm-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
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


    <!-- #My Orders start-->
    <div class="fashion_section" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <!-- Links to filter orders based on status -->
        <div style="display: flex; align-items: center; justify-content: center; columns: 100px 3;">
            <?php
            if (isset($_COOKIE['user_id'])) {
                /**
                 * Query statements for count of pending, accepted, completed, and returned/refunded orders
                 */
                $user_id = $_COOKIE['user_id'];
                $pending_query = "SELECT COUNT(*) AS count FROM purchases WHERE status='pending' AND user_id=$user_id";
                $accepted_query = "SELECT COUNT(*) AS count FROM purchases WHERE status='accepted' AND user_id=$user_id";
                $completed_query = "SELECT COUNT(*) AS count FROM purchases WHERE status='completed' AND user_id=$user_id";
                $returned_refunded_query = "SELECT COUNT(*) AS count FROM purchases WHERE (status='returned' OR status='refunded') AND user_id=$user_id";

                /**
                 * contains the count of pending, accepted, completed, and returned/refunded orders
                 */
                $count_pending = mysqli_fetch_assoc(mysqli_query($lazada, $pending_query))['count'];
                $count_accepted = mysqli_fetch_assoc(mysqli_query($lazada, $accepted_query))['count'];
                $count_completed = mysqli_fetch_assoc(mysqli_query($lazada, $completed_query))['count'];
                $count_returned_refunded = mysqli_fetch_assoc(mysqli_query($lazada, $returned_refunded_query))['count'];
            ?>
                <a href="?status=pending">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Pending(<?php echo $count_pending ?>)
                    </p>
                </a>
                <a href="?status=accepted">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Accepted(<?php echo $count_accepted ?>)
                    </p>
                </a>
                <a href="?status=completed">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Completed(<?php echo $count_completed ?>)
                    </p>
                </a>
                <a href="?status=return_refund">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Return/Refund(<?php echo $count_returned_refunded ?>)
                    </p>
                </a>
            <?php } ?>
        </div>

        <table style="text-align: center;">
            <thead>
                <tr>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Image</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Name</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Quantity</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Price</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Order Date</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $order_status = $_REQUEST['status'] ?? '';
                if ($order_status === 'accepted') {
                    $orders_query_statement = "SELECT prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE user_id=$user_id AND status='accepted'";
                } elseif ($order_status === 'completed') {
                    $orders_query_statement = "SELECT prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE user_id=$user_id AND status='completed'";
                } elseif ($order_status === 'return_refund') {
                    $orders_query_statement =  "SELECT prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE user_id=$user_id AND (status='returned' OR status='refunded')";
                } else {
                    /**
                     * pending orders is the default status shown to the user
                     */
                    $orders_query_statement =  "SELECT prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE user_id=$user_id AND status='pending'";
                }
                /**
                 * contains list of customer's orders based on selected status (see conditionals above)
                 */
                $order_list = mysqli_fetch_all(mysqli_query($lazada, $orders_query_statement), MYSQLI_ASSOC);

                /**
                 * List of ordered products by the customers, categorized by order's status
                 */
                foreach ($order_list as $key => $order) {
                    $order_image = $order['image_link'];
                    $order_name = $order['name'];
                    $order_category = $order['category'];
                    $order_quantity = $order['quantity'] . 'x';
                    $total_price = $order['price'];
                    $order_date = $order['date'];
                    $order_status = $order['status'];

                    $table_row = <<<HTML
                    <tr>
                        <td>
                            <img src="$order_image" alt="$order_name">
                        </td>
                        <td>
                            [$order_category] $order_name
                        </td>
                        <td>
                            $order_quantity
                        </td>
                        <td>
                            $total_price
                        </td>
                        <td>
                            $order_date
                        </td>
                        <td>
                            <select name="order_status" id="order_status">
                                <option value="pending">Pending</option>
                                <option value="accepted">Accepted</option>
                                <option value="completed">Completed</option>
                                <option value="refunded">Refunded</option>
                                <option value="returned">Returned</option>
                            </select>
                        </td>
                    </tr>
                    HTML;
                    echo $table_row;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- #My Orders end-->
</body>

</html>