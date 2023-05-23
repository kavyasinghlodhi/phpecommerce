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
            width: 100px;
        }
    </style>
</head>
<body>
    <?php include('nav.php') ?>
    <main>
        <h2 align='center'>Orders</h2>
        <table>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Pno</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Products</th>
                <th>Payment</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <?php
                include('../components/_db.php');
                $sql = "SELECT * FROM `orders` WHERE `delivered`='none'";
                $result = mysqli_query($conn,$sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                            <tr>
                                <td>".$row['sno']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['pno']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['city']."</td>
                                <td>".$row['state']."</td>
                                <td>".$row['products']."</td>
                                <td>$".$row['total_pay']."</td>
                                <td>".$row['date']."</td>
                                <td class='actions'><a href='delivered.php?o=".$row['sno']."'><button style='margin-right:10px;'>Deliverd</button></a></td>
                            </tr>
                        ";
                    }
                }

            ?>
        </table>
        <br>
        <h2 align='center'>Orders Delivered</h2>
        <table>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Pno</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Products</th>
                <th>Payment</th>
                <th>Date</th>
            </tr>
            <?php
                include('../components/_db.php');
                $sql = "SELECT * FROM `orders` WHERE `delivered`='delivered'";
                $result = mysqli_query($conn,$sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                            <tr>
                                <td>".$row['sno']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['pno']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['city']."</td>
                                <td>".$row['state']."</td>
                                <td>".$row['products']."</td>
                                <td>$".$row['total_pay']."</td>
                                <td>".$row['date']."</td>
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