<?php

$p = $_GET['p'];
session_start();
unset($_SESSION[$p]); 
header('Location: http://localhost/e-commerce/cart.php');
?>