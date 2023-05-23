<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .products a{
            color: black;
            text-decoration: none;
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
    <div class="heading" id='products'>
        <h2>Best Shirts</h2>
        <br>
        <hr width="50" color="darkred">
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="products">
    <?php
            include('components/_db.php');
            $sql = "SELECT * FROM `products_all`";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['rating'] == '0') {
                    $rating = "No Rating";
                }
                if ($row['rating'] == '1') {
                    $rating = "<img src='images/star.png' alt='star'>";
                }
                if ($row['rating'] == '2') {
                    $rating = "<img src='images/star.png' alt='star'><img src='images/star.png' alt='star'>";
                }
                if ($row['rating'] == '3') {
                    $rating = "<img src='images/star.png' alt='star'><img src='images/star.png' alt='star'><img src='images/star.png' alt='star'>";
                }
                if ($row['rating'] == '4') {
                    $rating = "<img src='images/star.png' alt='star'><img src='images/star.png' alt='star'><img src='images/star.png' alt='star'><img src='images/star.png' alt='star'>";
                }
                if ($row['rating'] == '5') {
                    $rating = "<img src='images/star.png' alt='star'><img src='images/star.png' alt='star'><img src='images/star.png' alt='star'><img src='images/star.png' alt='star'><img src='images/star.png' alt='star'>";
                }
                if ($row['on_sale'] == 'yes') {
                    echo "
                    <a href='product.php?p=".$row['sno']."'>
                    <div class='product'>
                    <div class='sale'>SALE!</div>
                    <div class='img'><img src='".$row['image_link']."' alt=''></div>
                        <span class='p-name'>".$row['name']."</span>
                        <span class='p-stars'>
                            ". $rating."
                        </span>
                        <span class='p-price'>$".$row['sale_price']." <del>$".$row['price']."</del></span>
                    </div>
                    </a>
                    ";
                }else{
                    echo "
                    <a href='product.php?p=".$row['sno']."'>
                    <div class='product'>
                    <div class='img'><img src='".$row['image_link']."' alt=''></div>
                        <span class='p-name'>".$row['name']."</span>
                        <span class='p-stars'>
                            ". $rating."
                        </span>
                        <span class='p-price'>".$row['price']."</span>
                    </div>
                    </a>
                    ";
                }
            }
            

        ?>
    </div>
    <br>
    <br>
    <br>
    <?php include('components/footer.php')?>
</body>

</html>