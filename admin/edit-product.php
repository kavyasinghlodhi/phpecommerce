
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
<?php
    include('../components/_db.php');
    $pro = $_GET['p'];
    $sql = "SELECT * FROM `products_all` WHERE `sno`='".$_GET['p']."'";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $img = $row['image_link'];
            $price = $row['price'];
            $on_sale = $row['on_sale'];
            $sale_price = $row['sale_price'];
            $desc = $row['desc_'];
            $rating = $row['rating'];
        }
    }

?>
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
                        $sql= "UPDATE `products_all` SET `name`='$name',`desc_`='$desc',`price`='$price',`sale_price`='$sale_',`on_sale`='$sale',`image_link`='$img',`rating`='$qual',`date`=current_timestamp() WHERE `sno`='".$pro."'";
                        $result = mysqli_query($conn,$sql);
                        if ($result) {
                            echo "Product has been Updated.";
                            header('Location: http://localhost/e-commerce/admin/admin-products.php');
                        }else{
                            echo "Internal Server Error";
                        }
                    }
                }
            ?>
            <form method="post">
                <span>Name</span>
                <input type="text" name='name' value='<?php echo $name ?>'>
                <span>Image</span>
                <input type="text" name='img' value='<?php echo $img ?>'>
                <span>Price</span>
                <input type="number" name='price' value='<?php echo $price ?>'>
                <span>On Sale</span>
                <input type="text" name='sale' value='<?php echo $on_sale ?>'>
                <span>Sale Price</span>
                <input type="number" name='sale_' value='<?php echo $sale_price ?>'>
                <span>Desc</span>
                <input type="text" name='desc' value='<?php echo $desc ?>'>
                <span>Quality</span>
                <input type="number" name='qual' value='<?php echo $rating ?>'>
                <button>Add Product</button>
            </form>
    </main>
</body>
</html>