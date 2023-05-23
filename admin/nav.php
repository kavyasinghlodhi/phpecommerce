<?php
session_start();
if ($_SESSION['admin_login'] != 'true') {
    header('Location: http://localhost/e-commerce/admin/');
}
?>
<nav>
<div class="nav">
    <div class="logo"><a href="">Shirti.</a></div>
    <div class="links">
        <a href="admin-products.php">Products</a>
        <a href="admin-orders.php">Orders</a>
    </div>
</div>
</nav>