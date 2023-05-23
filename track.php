<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        form input,
        form textarea {
            padding: 7px 10px;
            font-size: 16px;
            border: 1px solid black;
            margin-top: 6px;
            margin-bottom: 12px;
        }
        
        form input:focus {
            outline: none;
        }

        form span {
            font-weight: 600;
            font-size: 15px;
        }
        .info{
            background: rgb(223, 255, 223);
            padding: 40px 30px;
            margin: auto;
            border: 2px solid rgb(148, 255, 148);
            width: 270px;
            text-align: center;
        }

    </style>
</head>
<body>
    <?php include('components/nav.php') ?>
    <br>
    <br>
    <br>
    <br>
    <main>
        
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                include('components/_db.php');
                $sql = "SELECT * FROM `orders` WHERE `sno`='".$name."'";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['delivered'] != 'delivered') {
                            echo '
                            <br>
                            <section class="info">
                                <p>Status :</p>
                                <h2>Not Delivered</h2>
                                <br>
                                <p>Ordered By :</p>
                                <h3>'.$row['name'].'</h3>
                                <p>Products Ordered :</p>
                                <p>'.$row['products'].'</p>
                                <br>
                                On :
                                <h3>'.$row['date'].'</h3>
                                <br>
                            </section>
                            ';
                        }elseif ($row['delivered'] == 'delivered') {
                            echo '
                            <br>
                            <section class="info">
                                <p>Status :</p>
                                <h2>Successfully Delivered</h2>
                                <br>
                                <p>Ordered By :</p>
                                <h3>'.$row['name'].'</h3><br><br>
                                <p>Products Ordered :</p>
                                <p>'.$row['products'].'</p>
                                <br>
                                On :
                                <h3>'.$row['date'].'</h3>
                                <br>
                            </section>
                            ';
                        }
                    }

                }else{
                    echo '
                    <br>
                    <section class="info">
                        <p>Not Found</p>
                        <br>
                    </section>
                    ';
                }
            }
        ?>
        <br>
        <section class="form">
            <h2 align='center'>Track Order</h2>
            <form method="post">
                <span>Order ID</span>
                <input type="text" name='name'>
                <button>Check Status</button>
            </form>
        </section>
    </main>
    <br>
    <br>
    <?php include('components/footer.php') ?>
</body>
</html>