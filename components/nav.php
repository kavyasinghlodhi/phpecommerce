<?php
session_start();
$cart_value = sizeof($_SESSION);
?>

<nav>
    <div class="navigation">
        <div class="nav-child">
            <div class="nav-logo">
                <a href="index.php"><img src="images/logo.png" alt=""></a>
            </div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="nav-ico-links">
                <a href="cart.php"><img height="36px" style="margin-right: 7px;"
                        src="images/shopping-cart-empty-side-view.png" alt=""><b class='cart_value'><?php echo $cart_value ?></b></a>
            </div>
            <div class="burger" onclick="nav()">
                <img src="images/more.png" alt="">
            </div>

        </div>
    </div>
</nav>