<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php include('nav.php') ?>
    <main>
            <h2 align='center'>Add Product</h2>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    include('../components/_db.php');
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $sale = $_POST['sale'];
                    $sale_ = $_POST['sale_'];
                    $desc = $_POST['desc'];
                    $qual = $_POST['qual'];
                    if (strlen($name) >= 3 && strlen($img) >= 3 && strlen($price) >= 1 && strlen($sale) >= 2 && strlen($sale_) >= 1 && strlen($desc) >= 3 && strlen($qual) >= 1) {
                        $sql= "INSERT INTO `products_all` (`name`, `desc_`, `price`, `sale_price`, `on_sale`, `image_link`, `rating`, `date`) VALUES ('$name', '$desc', '$price', '$sale_', '$sale', '$img', '$qual', 'current_timestamp()')";
                        $result = mysqli_query($conn,$sql);
                        if ($result) {
                            echo "Product has been added.";
                        }else{
                            echo "Internal Server Error";
                        }
                    }
                }
            ?>
            <form method="post">
                <span>Name</span>
                <input type="text" name='name'>
                <span>Image</span>
                <input type="text" name='img'>
                <span>Price</span>
                <input type="number" name='price'>
                <span>On Sale</span>
                <input type="text" name='sale'>
                <span>Sale Price</span>
                <input type="number" name='sale_'>
                <span>Desc</span>
                <input type="text" name='desc'>
                <span>Quality</span>
                <input type="number" name='qual'>
                <button>Add Product</button>
            </form>
    </main>
</body>
</html>