<?php
    session_start();
    if ($_SESSION['admin_login'] == 'true') {
        include('../components/_db.php');
        $sql = "UPDATE `orders` SET `delivered` = 'delivered' WHERE `orders`.`sno`='".$_GET['o']."'";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            header('Location: http://localhost/e-commerce/admin/admin-orders.php');
        }    
    }else{
        header('Location: http://localhost/e-commerce/admin/');
    }
    
?>