<?php
// MySQL snippet
include 'head.php';

// Cart functionality
include 'cart.php';

$user_type = $_COOKIE['type'] ?? '';

if ($user_type == 'admin'):
    include 'calendar.php'; ?>
    <figure id="dashboard" style="display: flex; justify-content: center; align-items: center;"><img
            src="./images/temp-dashboard.gif" alt="temporary dashboard"></figure>
<?php else: ?>
    <!-- fashion section start -->
    <?php
    $to_cart = $_REQUEST['cart'] ?? false; // $to_cart = isset($_REQUEST['cart']) ? $_REQUEST['cart'] : false;
    if ($to_cart) { ?>
        <div style="text-align: center; padding: 150px 150px;">
            <p style="font-weight: 700;">TODO: Make a cart page</h1>
            <p>with quantity listing functionality</p>
            <p>utilizing multi-dimensional array (a.k.a., dictionary) and cookies</p>
        </div>
    <?php } else { ?>
        <div class="fashion_section">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">Man & Woman Fashion</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <!-- Product ID #1 : Man T-shirt -->
                                        <div class="box_main">
                                            <h4 class="shirt_text">Man T -shirt</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="?prod_id=1">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <!-- Product ID #2 : Man Polo Shirt -->
                                        <div class="box_main">
                                            <h4 class="shirt_text">Man Shirt</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/dress-shirt-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="?prod_id=2">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <!-- Product ID #3 : Woman Dress -->
                                        <div class="box_main">
                                            <h4 class="shirt_text">Woman Scarf</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/women-clothes-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="?prod_id=3">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <h1 class="fashion_taital">Man & Woman Fashion</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Man T -shirt</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Man -shirt</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/dress-shirt-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Woman Scart</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/women-clothes-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <h1 class="fashion_taital">Man & Woman Fashion</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Man T -shirt</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Man -shirt</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/dress-shirt-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Woman Scart</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                            <div class="tshirt_img"><img src="images/women-clothes-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!-- fashion section end -->
        <!-- electronic section start -->
        <div class="fashion_section">
            <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">Electronic</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Laptop</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Mobile</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/mobile-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Computers</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/computer-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <h1 class="fashion_taital">Electronic</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Laptop</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Mobile</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/mobile-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Computers</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/computer-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <h1 class="fashion_taital">Electronic</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Laptop</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Mobile</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/mobile-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Computers</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="electronic_img"><img src="images/computer-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!-- electronic section end -->
        <!-- jewellery  section start -->
        <div class="jewellery_section">
            <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">Jewellery Accessories</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Jumkas</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Necklaces</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Kangans</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/kangan-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <h1 class="fashion_taital">Jewellery Accessories</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Jumkas</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Necklaces</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Kangans</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/kangan-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <h1 class="fashion_taital">Jewellery Accessories</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Jumkas</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Necklaces</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">Kangans</h4>
                                            <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                                            <div class="jewellery_img"><img src="images/kangan-img.png"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
                <div class="loader_main">
                    <div class="loader"></div>
                </div>
            </div>
        </div>
        <!-- jewellery  section end -->
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