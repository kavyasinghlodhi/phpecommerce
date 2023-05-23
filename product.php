<?php
    $product = $_GET['p'];
    include('components/_db.php');
    $sql = "SELECT * FROM `products_all` WHERE `sno`='".$product."'";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $sno = $row['sno'];
        $name = $row['name'];
        $desc_ = $row['desc_'];
        $price = $row['price'];
        $sale_price = $row['sale_price'];
        $on_sale = $row['on_sale'];
        $image_link = $row['image_link'];
        $rating = $row['rating'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .val_{
            padding: 7px 10px;font-size: 20px;width:70px;
        }

    </style>
</head>

<body>
<?php include('components/nav.php') ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $quantity = $_POST['add_to_c'];
                            $product_data = array($sno,$image_link,$name,$price,$quantity);
                            $_SESSION[$name] = $product_data;
                            echo "<div style='width: 74vw;margin:auto;padding:20px 20px;font-size:18px;background:rgb(248, 248, 229);'>Product Has been added to cart. <b><a style='color:green;text-decoration:none;' href='cart.php'>View Cart</a></b></div><br>";
                        }
                    ?>
    <div class="p-product-box">
        <div class="p-product-image">
            <img src="<?php echo $image_link ?>" alt="">
        </div>
        <div class="p-product-info">
            <h2>
                <?php echo $name ?>
            </h2>
            <span class="p-stars"><img src="images/star.png" alt=""><img src="images/star.png" alt=""><img
                    src="images/star.png" alt=""><img src="images/star.png" alt=""><img src="images/star.png"
                    alt=""></span>
            <br>
            <?php 
                    if ($on_sale == 'yes') {
                        echo '
                        <p class="p-pro-price">
                            '.$sale_price.' <del>'.$price.'</del>
                        </p>
                        ';
                    }
                    else{
                        echo '
                        <p class="p-pro-price">
                        '.$price.'
                        </p>
                        ';
                    }
                ?>
            <div class="p-product-desc">
                <p>
                    <?php echo $desc_ ?>
                </p>
            </div>
            <br>
            <br>
            <form method="post">
                <input type="number" value="1" name="add_to_c" class="val_">
                <button class="b-v-2">ADD TO CART</button>
            </form>
            <br>
            <br>
        </div>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include('components/footer.php')?>
</body>

</html>