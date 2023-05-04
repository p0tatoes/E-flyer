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
    // * Cart page/view
    $to_cart = $_REQUEST['cart'] ?? false; // $to_cart = isset($_REQUEST['cart']) ? $_REQUEST['cart'] : false;
    if ($to_cart) { ?>
        <p style="font-size: x-large; font-weight: bold; text-align: center; margin: 100px;">CART</p>
        <div style="display: flex; justify-content: center; align-items: center;">
            <form action="index.php?cart=true" method="post">
                <table>
                    <!-- Cart header -->
                    <thead>
                        <tr>
                            <th colspan="2" style="padding-left: 70px; padding-right: 70px;"></th>
                            <th style="padding-left: 70px; padding-right: 70px;">Description</th>
                            <th style="padding-left: 70px; padding-right: 70px;">Name</th>
                            <th style="padding-left: 70px; padding-right: 70px;">Quantity</th>
                            <th style="padding-left: 70px; padding-right: 70px;">Total Price</th>
                            <th style="padding-left: 70px; padding-right: 70px;">Actions</th>
                        </tr>
                    </thead>
                    <!-- Carted products -->
                    <tbody>
                        <?php
                        foreach ($products_cart as $id => $in_cart) {
                            $product_id = $in_cart[0];
                            $product_name = $in_cart[2];
                            $product_description = $in_cart[3];
                            $product_img = $in_cart[4];
                            $carted_quantity = $in_cart[7];
                            $product_price = $in_cart[6] * $carted_quantity;
                            ?>
                            <tr>
                                <td style="padding-left: 70px; padding-right: 70px; padding-bottom: 100px;">
                                    <input type="checkbox" name="cart_product[]" value=<?php echo $product_id ?>>
                                </td>
                                <td style="padding-left: 70px; padding-right: 70px; padding-bottom: 100px;">
                                    <img src="<?php echo $product_img ?>" alt="product">
                                </td>
                                <td style="padding-left: 70px; padding-right: 70px; padding-bottom: 100px;">
                                    <?php echo $product_description ?>
                                </td>
                                <td style="padding-left: 70px; padding-right: 70px; padding-bottom: 100px;">
                                    <?php echo $product_name ?>
                                </td>
                                <td style="padding-left: 70px; padding-right: 70px; padding-bottom: 100px;">
                                    <form action="index.php?cart=true" method="post">
                                        <select name="product_quantity" onchange="this.form.submit()">
                                            <?php
                                            // Queries available quantity in database for product, using its product id
                                            $quantity_query = "SELECT quantity FROM products where id=$product_id";
                                            $quantity_search = mysqli_query($lazada, $quantity_query);
                                            $product_quantity = mysqli_fetch_array($quantity_search);

                                            // dynamically creates options for the select object based on the quantity of the product in the products database
                                            // @product_quantity - product quantity of the carted product
                                            for ($range = 1; $range <= $product_quantity[0]; $range++) {
                                                if ($range == $carted_quantity) { ?>
                                                    <option value=<?php echo $range ?> selected><?php echo $range ?></option>
                                                    <?php continue;
                                                } ?>
                                                <option value=<?php echo $range ?>><?php echo $range ?></option>
                                            <?php } ?>

                                            <!-- @update_prod - product id of the quantity to be updated when select option for quantity  -->
                                        </select>
                                        <input type="hidden" name="update_prod" value=<?php echo $product_id ?>>
                                    </form>
                                </td>
                                <td style="padding-left: 70px; padding-right: 70px; padding-bottom: 100px;">
                                    <?php echo $product_price ?>
                                </td>
                                <td style="padding-left: 70px; padding-right: 70px;">
                                    <button type="submit" name="del_prod" value=<?php echo $product_id ?>>Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input style="width: 100%; padding-top: 10px; padding-bottom: 10px; background-color: yellow;" type="submit"
                    value="Place orders">
            </form>
        </div>
    <?php } else { ?>
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
                        <a href="?prod_cat=<?php echo $product_category ?>">
                            <h1 class="fashion_taital">
                                <?php echo strtoupper($product_category) ?> <!-- Category  -->
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