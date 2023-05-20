<?php

/**
 * Shows the order management view for admin account/s and handles some of its functionalities as well
 */

include 'head.php';
$user_type = $_COOKIE['type'] ?? '';
$user_id = $_COOKIE['user_id'] ?? null;

$customer_id = $_REQUEST['customer_id'] ?? null;
$updated_status = $_REQUEST['order_status'] ?? null;
$updated_order_id = $_REQUEST['product_id'] ?? null;
$updated_order_date = $_REQUEST['order_date'] ?? null;

if (isset($updated_status) && isset($updated_order_id) && isset($updated_order_date)) {
    // Changes the status of the order
    $update_status_statement = "UPDATE purchases SET status='$updated_status' WHERE user_id=$customer_id AND product_id=$updated_order_id AND date='$updated_order_date'";
    $update_status_query = mysqli_query($lazada, $update_status_statement);

    // Sends a message to the customer when order status is changed
    if ($update_status_query) {
        $order_name = mysqli_fetch_assoc(mysqli_query($lazada, "SELECT name FROM products where id=$updated_order_id"))['name'];
        $update_message_stmnt = "INSERT INTO messages VALUES(1, $customer_id, 'order of $order_name by Customer #$customer_id made on $updated_order_date is now $updated_status', NOW())";
        mysqli_query($lazada, $update_message_stmnt);
    }
}
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
                                    <?php } elseif ($_COOKIE['type'] == 'admin') { ?>
                                        <li>
                                            <a href="manage_products.php">Manage Products</a>
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
            $header_status = $_REQUEST['status'] ?? '';
            $order_month = $_REQUEST['month'] ?? null;
            $order_day = $_REQUEST['day'] ?? null;

            if (isset($_COOKIE['user_id'])) {
                /**
                 * Query statements for count of pending, accepted, completed, and returned/refunded orders
                 */
                $pending_query = "SELECT COUNT(*) AS count FROM purchases WHERE status='pending' AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%d')=$order_day)";
                $accepted_query = "SELECT COUNT(*) AS count FROM purchases WHERE status='accepted' AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%d')=$order_day)";
                $completed_query = "SELECT COUNT(*) AS count FROM purchases WHERE status='completed' AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%d')=$order_day)";
                $returned_refunded_query = "SELECT COUNT(*) AS count FROM purchases WHERE (status='returned' OR status='refunded') AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%d')=$order_day)";

                /**
                 * contains the count of pending, accepted, completed, and returned/refunded orders
                 */
                $count_pending = mysqli_fetch_assoc(mysqli_query($lazada, $pending_query))['count'];
                $count_accepted = mysqli_fetch_assoc(mysqli_query($lazada, $accepted_query))['count'];
                $count_completed = mysqli_fetch_assoc(mysqli_query($lazada, $completed_query))['count'];
                $count_returned_refunded = mysqli_fetch_assoc(mysqli_query($lazada, $returned_refunded_query))['count'];

                /**
                 * Headers/Links to show orders based on their status
                 */
                $status_headers = <<<HTML
                <a href="?status=pending&month=$order_month&day=$order_day">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Pending($count_pending)
                    </p>
                </a>
                <a href="?status=accepted&month=$order_month&day=$order_day">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Accepted($count_accepted)
                    </p>
                </a>
                <a href="?status=completed&month=$order_month&day=$order_day">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Completed($count_completed)
                    </p>
                </a>
                <a href="?status=return_refund&month=$order_month&day=$order_day">
                    <p style="text-align: center; font-size: large; font-weight: 700;">
                        Return/Refund($count_returned_refunded)
                    </p>
                </a>
                HTML;
                echo $status_headers;
            } ?>
        </div>

        <table style="text-align: center;">
            <thead>
                <tr>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Image</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Name</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Quantity</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Price</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Order Date</th>
                    <th style="padding-left: 120px; padding-right: 120px; padding-bottom: 25px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orders_query_statement =  "SELECT user_id, prod.id AS product_id, prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE status='pending' AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%e')=$order_day)";

                if ($header_status === 'accepted') {
                    $orders_query_statement = "SELECT user_id, prod.id AS product_id, prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE status='accepted' AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%e')=$order_day)";
                }

                if ($header_status === 'completed') {
                    $orders_query_statement = "SELECT user_id, prod.id AS product_id, prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE status='completed' AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%e')=$order_day)";
                }

                if ($header_status === 'return_refund') {
                    $orders_query_statement =  "SELECT user_id, prod.id AS product_id, prod.image_link AS image_link, prod.name AS name, prod.category AS category, pur.quantity AS quantity, pur.total_price AS price, date, status FROM purchases pur INNER JOIN products prod ON pur.product_id=prod.id WHERE (status='returned' OR status='refunded') AND (DATE_FORMAT(date, '%m')=$order_month AND DATE_FORMAT(date, '%e')=$order_day)";
                }

                /**
                 * contains list of customer's orders based on selected status (see conditionals above)
                 */
                $order_list = mysqli_fetch_all(mysqli_query($lazada, $orders_query_statement), MYSQLI_ASSOC);

                /**
                 * List of ordered products by the customers, categorized by order's status
                 */
                foreach ($order_list as $key => $order) {
                    $customer_id = $order['user_id'];
                    $order_id = $order['product_id'];
                    $order_image = $order['image_link'];
                    $order_name = $order['name'];
                    $order_category = $order['category'];
                    $order_quantity = $order['quantity'] . 'x';
                    $total_price = $order['price'];
                    $order_date = $order['date'];
                    $order_status = $order['status'];

                    /**
                     * Is used to select a default option in the "select" element based on selected status category
                     * Cannot use ternary operators inside HEREDOC, truly saddening
                     */
                    $select_pending = $header_status === 'pending' ? 'selected' : '';
                    $select_accepted = $header_status === 'accepted' ? 'selected' : '';
                    $select_completed = $header_status === 'completed' ? 'selected' : '';
                    $select_return_refund = $header_status === 'return_refund' ? 'selected' : '';

                    /**
                     * Table row for an ordered product
                     */
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
                            <form action="?status=$header_status&month=$order_month&day=$order_day" method="post">
                                <select name="order_status" id="order_status" onchange="this.form.submit()">
                                    <option value="pending" $select_pending>Pending</option>
                                    <option value="accepted" $select_accepted>Accepted</option>
                                    <option value="completed" $select_completed>Completed</option>
                                    <option value="" style="display: none;" $select_return_refund>Returned/Refunded</option>
                                    <option value="refunded">Refunded</option>
                                    <option value="returned">Returned</option>
                                </select>
                                <input type="hidden" name="customer_id" value="$customer_id">
                                <input type="hidden" name="product_id" value="$order_id">
                                <input type="hidden" name="order_date" value="$order_date">
                            </form>
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

    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
            <div class="input_bt">
                <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
                <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
                <ul>
                    <li><a href="#">Best Sellers</a></li>
                    <li><a href="#">Gift Ideas</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">Today's Deals</a></li>
                    <li><a href="#">Customer Service</a></li>
                </ul>
            </div>
            <div class="location_main">Help Line Number : <a href="#">+1 1800 1200 1200</a></div>
        </div>
    </div>
    <!-- footer section end -->
</body>

</html>