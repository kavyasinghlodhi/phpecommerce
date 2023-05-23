<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .actions{
            width: 200px;
        }
    </style>
</head>
<body>
    <?php include('nav.php') ?>
    <main>
        <h2 align='center'>Products <a href="add-product.php"><button>Add Products</button></a></h2>
        <table>
            <tr>
                <th>Serial</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Actions</th>
            </tr>
            <?php
                include('../components/_db.php');
                $sql = "SELECT * FROM `products_all`";
                $result = mysqli_query($conn,$sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['sale_price'] == '0') {
                            $sale = "Not in Sale";
                        }else{
                            $sale = $row['sale_price'];
                        }
                        echo "
                            <tr>
                                <td>".$row['sno']."</td>
                                <td><img src='../".$row['image_link']."' height='100'></td>
                                <td>".$row['name']."</td>
                                <td>".$row['price']."</td>
                                <td>".$sale."</td>
                                <td class='actions'><a href='edit-product.php?p=".$row['sno']."'><button style='margin-right:10px;'>Edit</button></a><a href='remove_product.php?p=".$row['sno']."'><button>Remove</button></a></td>
                            </tr>
                        ";
                    }
                }

            ?>
        </table>
        <br>
    </main>
</body>
</html>