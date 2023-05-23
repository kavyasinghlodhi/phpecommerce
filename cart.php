<?php

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
        .cart_page{
            width: 80vw;
            margin: auto;
            padding: 20px 20px;
        }
        .val_{
            padding: 7px 10px;font-size: 16px;width:70px;
        }
        .cart_page table{
            width: 78vw;
            margin: auto;
        }
        table th{
            text-align: left;
        }
        table td, table th{
            padding: 7px 10px;
            border: 1px solid black;
        }
        table a{
            text-decoration: none;
            color: black;
        }
        .cart_page .small{
            width: 300px;
            margin: 40px 0px;
        }
        @media (max-width: 800px) {
            .cart_page{
                padding: 0px 0px;
            }
            .table{
                width: 100%;
            }
            .table tr{
                display: flex;
                flex-direction: column;
                margin-bottom: 40px;
            }
            .table th{
                display: none;
            }
            .table td{
                display: flex;
                justify-content: center;
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
        <section class="cart_page">
            
                <?php
                    $total_price = 0;
                    if (sizeof($_SESSION) > 0) {
                        foreach ($_SESSION as $val) {
                            echo "
                            <table class='table'>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty.</th>
                                <th></th>
                            </tr>
                            ";
                            echo "
                                <tr>
                                    <td><a href='product.php?p=".$val[0]."'><img src='".$val[1]."' width='100'></a></td>
                                    <td><a href='product.php?p=".$val[0]."'>".$val[2]."</a></td>
                                    <td>$".$val[3]."</td>
                                    <td>".$val[4]."</td>
                                    <td><a href='remove_cart.php?p=".$val[2]."'><button>Remove</button></a></td>
                                </tr>
                            ";
                            echo "</table>";
                            $total_price += $val[3]*$val[4]; 
                        }
                    }else{
                        echo "<center>Nothing in Cart.</center>";
                    }
                ?>
            
            <table class="small">
                    <?php
                        foreach ($_SESSION as $val_) {
                            echo "
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$".$val_[3]*$val_[4]."</td>
                                </tr>
                            ";
                        }

                    ?>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>$<?php echo $total_price ?></b></td>
                    </tr>
            </table>
            <a href="checkout.php"><button>Checkout</button></a>
        </section>
    </main>
    <br>
    <br><br>
    <?php include('components/footer.php')?>

</body>

</html>