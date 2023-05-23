<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .testimonial-box {
            width: 70vw;
            display: flex;
            justify-content: center;
            margin: auto;
            overflow: auto;
            flex-wrap: wrap;
        }

        .testimonial {
            width: 300px;
            height: auto;
            background: rgb(255, 254, 251);
            padding: 20px;
            border: 2px solid black;
            border-radius: 20px;
            margin: 0px 20px;
            margin-bottom: 20px;
        }

        .span-h2 {
            font-size: 20px;
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
        <section class="contact-img">
            <img src="images/contact.png" alt="">
        </section>
        <!-- <section class="form">
            <form action="">
                <span>Enter Name</span>
                <input type="text">
                <span>Enter Phone Number</span>
                <input type="text">
                <span>Enter Email</span>
                <input type="text">
                <span>Enter Query</span>
                <textarea></textarea>
            </form>
        </section> -->
        <section class="contact-details">
            <div><img src="images/cell.png" alt=""><a href="tel: ">+919999999999</a></div>
            <div><img src="images/cell.png" alt=""><a href="mailto:">test@test.com</a></div>
            <div><img src="images/cell.png" alt="">Dhani ki kutiya, adhartal</div>
        </section>
    </main>
    <br>
    <br><br>
    <?php include('components/footer.php')?>
    <script src="js/script.js"></script>

</body>

</html>