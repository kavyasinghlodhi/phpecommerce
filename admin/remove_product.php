<?php
    session_start();
    if ($_SESSION['admin_login'] == 'true') {
        include('../components/_db.php');
        $sql = "DELETE FROM `products_all` WHERE `sno`='".$_GET['p']."'";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            header('Location: http://localhost/e-commerce/admin/admin-products.php');
        }    
    }else{
        header('Location: http://localhost/e-commerce/admin/');
    }
    
?>