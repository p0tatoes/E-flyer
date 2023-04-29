<?php
// Cart functionality
include 'cart.php';
include 'head.php';

$user_type = $_COOKIE['type'] ?? '';

if ($user_type == 'admin'): ?>
    <figure id="dashboard" style="display: flex; justify-content: center; align-items: center;"><img
            src="./images/temp-dashboard.gif" alt="temporary dashboard"></figure>
<?php else: ?>
    <!-- fashion section start -->
    <?php
    $to_cart = $_REQUEST['cart'] ?? false; // $to_cart = isset($_REQUEST['cart']) ? $_REQUEST['cart'] : false;
    if ($to_cart) { ?>
        <p style="font-size: x-large; font-weight: bold; text-align: center; margin: 100px;">CART</p>
        <?php foreach ($products_cart as $id => $in_cart) { ?>
            <div class="container_cart">
                <div class="in_cart_product">
                    <img src=<?php echo $in_cart['picture'] ?> alt=<?php echo $in_cart['name'] ?>>
                    <p>
                        <?php echo $in_cart['name'] ?>
                    </p>
                    <p>Quantity:
                        <?php echo $in_cart['quantity'] ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <!-- Start of database generated content -->
        <?php
        /** 
         * Queries all product categories and loops through each category to display the category and its respective products
         */
        $category_query = 'SELECT category FROM products GROUP BY category';
        $category_search = mysqli_query($lazada, $category_query);
        $category_list = mysqli_fetch_all($category_search);
        foreach ($category_list as $category) {
            $product_category = $category[0]; ?>
            <div class="fashion_section">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">
                            <?php echo strtoupper($product_category) ?> <!-- Category  -->
                        </h1>
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
                                                    <a href=<?php echo "index.php?prod_id=$id" ?>>Buy Now</a> <!-- "Buy now" Button -->
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
    <?php } ?>
<?php endif ?>