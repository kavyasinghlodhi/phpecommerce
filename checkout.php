<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        section{
            width: 70vw;
            margin: auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        table td{
            padding: 7px 10px;
            border: 1px solid black;
            width: 300px;
        }
        .checkout{
            width: 300px;
            margin-top: 20px;
        }
        .form form{
            width: 48vw;
        }
        @media (max-width:800px) {
            section{
                flex-direction: column-reverse;
                align-items: center;
                width: 90vw;
            }
            .form form{
                width : 300px;
            }
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
    <main>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include('components/_db.php');
                $name = $_POST['name'];
                $pno = $_POST['pno'];
                $a1 = $_POST['a1'];
                $a2 = $_POST['a2'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $landmark = $_POST['landmark'];
                $products = "";
                foreach ($_SESSION as $val) {
                    $con_ = $val[2]." (Serial ".$val[0].") <br>";
                    $products .= str_replace("'","\'",$con_);
                    $total_pay = $val[3]*$val[4];
                }
                if (strlen($name) > 6) {
                    if (strlen($pno) >= 10) {
                        if (strlen($a1) > 6 && strlen($a2) > 6) {
                            if (strlen($city) > 2) {
                                if (strlen($state) > 2) {
                                    $sql = "INSERT INTO `orders` (`name`, `pno`, `address`, `city`, `state`, `products`, `total_pay`, `delivered`, `date`) VALUES ( '$name', '$pno', '$a1 $a2 Landmark: $landmark', '$city', '$state', '$products', '$total_pay', 'none', current_timestamp())";
                                    $result = mysqli_query($conn,$sql);
                                    if ($result) {
                                        $sql = "SELECT * FROM `orders` WHERE `sno`=(SELECT max(`sno`) FROM `orders`)";
                                        $result_ = mysqli_query($conn,$sql);
                                        while ($row = mysqli_fetch_assoc($result_)) {
                                            $sno = $row['sno'];
                                            echo "<center><b><br>Thanks For Ordering. You will recieve a confirmation call soon. Your Order ID is ".$sno.". Use this for tracking order at <a style='color:green;text-decoration:none;' href='track.php'>tracking page</a>.</center></b><br>";
                                        }
                                    }else{
                                        echo "<center><b><br>Internal Server Error.</b></center>".mysqli_error($result);
                                    }
                                }else{
                                    echo "<center><b><br>Enter State Please.</b></center>";
                                }
                            }else{
                                echo "<center><b><br>Enter City Please.</b></center>";
                            }
                        }else{
                            echo "<center><b><br>Enter Address Please.</b></center>";
                        }
                    }else{
                        echo "<center><b><br>Enter Phone Please.</b></center>";
                    }
                }else{
                    echo "<center><b><br>Enter Name Please.</b></center>";
                }
                
            }

        ?>
        <section>
            <div class="form">
                <form method="post">
                    <span>Enter Name *</span>
                    <input type="text" name='name'>
                    <span>Enter Phone Number *</span>
                    <input type="number" name='pno'>
                    <span>Enter Address Line 1 *</span>
                    <input type="text" name='a1'>
                    <span>Enter Address Line 2 *</span>
                    <input type="text" name='a2'>
                    <span>Enter City *</span>
                    <input id='btn-a' type="text" name='city'>
                    <span>Enter State *</span>
                    <input type="text" name='state'>
                    <span>Enter Landmark (optional)</span>
                    <input type="text" name='landmark'>
                    <button>Order</button>
                </form>
            </div>
            <div class="checkout">
                <table>
                    <?php
                        $total_pay = 0;
                        foreach ($_SESSION as $val) {
                            echo "
                            <tr>
                            <td>Sub Total</td>
                            <td>$".$val[3]*$val[4]."</td>
                            </tr>
                            ";
                            $total_pay += $val[3]*$val[4];
                        }
                        
                        ?>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>$<?php echo $total_pay ?></b></td>
                        </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td><input type="radio" name="pay_type" id="pay_1"> <label for="pay_1">Cash On Delievery</label></td>
                    </tr>
                </table>
                <br>
            </div>


        </section>
        
       
        
                    

        
    </main>
    <br>
    <br><br>
    <?php include('components/footer.php')?>

</body>

</html>