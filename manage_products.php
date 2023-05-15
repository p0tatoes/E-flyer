<?php
include 'head.php';
$user_type = $_COOKIE['type'] ?? '';
$user_id = $_COOKIE['user_id'] ?? null;

$product_action = $_REQUEST['product_action'] ?? null;
$admin_action = $_REQUEST['admin_action'] ?? null;
$product_id = $_REQUEST['product_id'] ?? null;

if ($admin_action === "delete_product" && isset($_REQUEST["id"])) {
    $delete_id = $_REQUEST['id'] ?? null;
    $delete_query = "DELETE FROM products where id=$delete_id";
    mysqli_query($lazada, $delete_query);
} elseif ($admin_action === "edit_product" && isset($_REQUEST["id"])) {
    $edit_id = $_REQUEST["id"] ?? null;
    $upload_image = $_FILES['image']['name'] ?? null;

    $new_image = "images/$upload_image";
    $new_category = $_REQUEST['product_category'] ?? null;
    $new_name = $_REQUEST['product_name'] ?? null;
    $new_description = $_REQUEST['product_description'] ?? null;
    $new_quantity = $_REQUEST['available_quantity'] ?? null;
    $new_orig = $_REQUEST['original_price'] ?? null;
    $new_promo = $_REQUEST['promo_price'] ?? null;

    if (isset($new_category) && isset($new_name) && isset($new_description) && isset($new_quantity) && isset($new_orig) && isset($new_promo)) {

        $edit_query = "UPDATE products SET category='$new_category', name='$new_name', description='$new_description', quantity=$new_quantity, orig_price=$new_orig, promo_price=$new_promo WHERE id=$edit_id";

        if (!empty($upload_image)) {
            $edit_query = "UPDATE products SET category='$new_category', name='$new_name', description='$new_description', image_link='$new_image', quantity=$new_quantity, orig_price=$new_orig, promo_price=$new_promo WHERE id=$edit_id";

            /**
             * Uploads image to project "images" directory
             */
            move_uploaded_file($_FILES['image']['tmp_name'], $new_image);
        }

        mysqli_query($lazada, $edit_query);
    }
} elseif ($admin_action === "new_category") {
    $newcategory_stmnt = "INSERT INTO products(category, name, description, page_link, image_link, quantity, orig_price, promo_price) VALUES('New Category', 'New Product', 'Replace placeholder for new product', 'www.google.com', 'images/new_product.png', 0, 0, 0)";
    mysqli_query($lazada, $newcategory_stmnt);
} elseif ($admin_action === "edit_category") {
    $old_category = $_REQUEST['prod_cat'] ?? null;

    $dialog_modal = <<<HTML
        <dialog id="modal_form">
            <form action="manage_products.php" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center;" enctype="multipart/form-data">
                <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <label>
                        Category
                        <input type="text" name="new_category" value="$old_category" required>
                    </label>
                </div>
                <input type="hidden" name="old_category" value="$old_category">
                <input type="hidden" name="admin_action" value="edited_category">
                <button type="submit">UPDATE</button>
            </form>
            <button id="discard_btn">Discard</button>
        </dialog>

        <script>
            document.getElementById("modal_form").showModal();

            var discard_btn = document.getElementById("discard_btn");

            discard_btn.addEventListener("click", () => {
                document.getElementById("modal_form").close();
            })
        </script>
    HTML;
    echo $dialog_modal;
} elseif ($admin_action === "edited_category") {
    $old_category = $_REQUEST['old_category'];
    $new_category = $_REQUEST['new_category'];

    $editcategory_stmnt = "UPDATE products SET category='$new_category' WHERE category='$old_category'";
    mysqli_query($lazada, $editcategory_stmnt);
}
?>

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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesoeet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="prod_management.js" defer></script>
</head>

<body>
    <!-- show modal if editing a product. send request containing id to be deleted if deleting a product -->
    <?php
    if ($product_action === "edit") {
        $edited_product = mysqli_fetch_assoc(mysqli_query($lazada, "SELECT * FROM products where id=$product_id"));
        $edited_category = $edited_product['category'];
        $edited_name = $edited_product['name'];
        $edited_description = $edited_product['description'];
        $edited_image = $edited_product['image_link'];
        $edited_quantity = $edited_product['quantity'];
        $edited_orig = $edited_product['orig_price'];
        $edited_promo = $edited_product['promo_price'];

        $dialog_modal = <<<HTML
            <dialog id="modal_form">
                <form action="manage_products.php" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center;" enctype="multipart/form-data">
                    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <img src="$edited_image" alt="$edited_name">
                        <input type="file" name="image" id="image" enc>
                        <label>
                            Category
                            <input type="text" name="product_category" value="$edited_category" required>
                        </label>
                        <label>
                            Name
                            <input type="text" name="product_name" value="$edited_name" required>
                        </label>
                        <label>
                        Description
                            <input type="text" name="product_description" value="$edited_description" required>
                        </label>
                        <label>
                            Quantity
                            <input type="number" name="available_quantity" value="$edited_quantity" required>
                        </label>
                        <label>
                            Original Price
                            <input type="number" name="original_price" value="$edited_orig" required>
                        </label>
                        <label>
                            Promo Price
                            <input type="number" name="promo_price" value="$edited_promo" required>
                        </label>
                    </div>
                    <input type="hidden" name="id" value="$product_id">
                    <input type="hidden" name="admin_action" value="edit_product">
                    <button type="submit">UPDATE</button>
                </form>
                <button id="discard_btn">Discard</button>
            </dialog>

            <script>
                document.getElementById("modal_form").showModal();

                var discard_btn = document.getElementById("discard_btn");

                discard_btn.addEventListener("click", () => {
                    document.getElementById("modal_form").close();
                })
            </script>
            HTML;
        echo $dialog_modal;
    } elseif ($product_action === "delete") {
        $script = <<<HTML
                <script>
                    var delete_confirm = confirm("Delete Product #$product_id?")
                    if (delete_confirm) {
                        window.location.href = "?admin_action=delete_product&id=$product_id";
                    }
                </script>
            HTML;
        echo $script;
    } elseif ($product_action === "insert") {
        $insert_category = $_REQUEST['product_category'];
        $insert_query = "INSERT INTO products(category, name, description, page_link, image_link, quantity, orig_price, promo_price) VALUES('$insert_category', 'New Product', 'Replace placeholder for new product', 'www.google.com', 'images/new_product.png', 0, 0, 0)";
        mysqli_query($lazada, $insert_query);
    }
    ?>

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

    <!-- Start of database generated content -->
    <?php
    /** 
     * Queries all product categories and loops through each category to display the category and its respective products
     */
    $selected_category = $_REQUEST['prod_cat'] ?? '';
    $category_query = 'SELECT category FROM products GROUP BY category';

    /**
     * quries only the category that was pressed by the user
     */
    if ($selected_category != "") {
        $category_query = "SELECT category FROM PRODUCTS WHERE category='$selected_category' GROUP BY category";
    }

    $category_search = mysqli_query($lazada, $category_query);
    $category_list = mysqli_fetch_all($category_search);
    foreach ($category_list as $category) {
        $product_category = $category[0]; ?>
        <div class="fashion_section">
            <div class="carousel-item active">
                <div class="container">
                    <a href="?prod_cat=<?php echo $product_category ?>&admin_action=edit_category">
                        <h1 class="fashion_taital">
                            <?php echo strtoupper($product_category) ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 30px; height: 30px;">
                                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                            </svg>
                            <!-- Category  -->
                        </h1>
                    </a>
                    <div class="fashion_section_2">
                        <div class="row">
                            <?php
                            /**
                             * Queries all products in a certain category and loops through each product to display
                             */
                            $product_query = "SELECT * FROM products where category='$product_category'";
                            $product_search = mysqli_query($lazada, $product_query);
                            $product_list = mysqli_fetch_all($product_search);
                            foreach ($product_list as $product) {
                                $id = $product[0];
                                $category = $product[1];
                                $name = $product[2];
                                $image = $product[5];
                                $quantity = $product[6];
                                /**
                                 * If promo price is greater than 0, set display price to promo price
                                 * Else, display original price
                                 */
                                $price = $product[8] > 0 ? $product[8] : $product[7];
                            ?>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">
                                            <?php echo $name ?> <!-- Product Name  -->
                                        </h4>

                                        <!-- Original or Promo Price  -->
                                        <p class="price_text">Price
                                            <span style="color: #262626;">
                                                $
                                                <?php echo $price ?>
                                            </span>
                                        </p>

                                        <div class="tshirt_img">
                                            <img src=<?php echo $image ?>> <!-- Image Link  -->
                                        </div>

                                        <div class="btn_main">
                                            <div class="buy_bt">
                                                <form action="manage_products.php" method="post">
                                                    <select name="product_action" id="manage_option" onchange="this.form.submit()">
                                                        <option value="default" style="display: none" selected>-----</option>
                                                        <option value="insert">insert</option>
                                                        <option value="edit">edit</option>
                                                        <option value="delete">delete</option>
                                                    </select>
                                                    <input type="hidden" name="product_id" value="<?php echo $id ?>">
                                                    <input type="hidden" name="product_category" value="<?php echo $category ?>">
                                                </form>
                                            </div>
                                            <p>
                                                Quantity:
                                                <?php echo $quantity ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Add new category button -->
    <div style="text-align: center;">
        <a href="?admin_action=new_category"><button id="newcategory_btn">ADD A NEW CATEGORY</button></a>
    </div>
    <!-- End of database generated content -->

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