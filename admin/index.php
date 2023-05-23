<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
        section{
            width: 280px;
            margin: auto;
            font-family: sans-serif;
            margin-top: 40px;
            padding: 20px 20px;
            border: 2px solid black;
            border-radius: 20px;
            background: white;
        }
    </style>
    <link rel="stylesheet" href="admin.css">
</head>

<body bgcolor="lightblue">
    <main>
        <section>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $pass = $_POST['pass'];
                    if ($name == 'admin' && $pass == 'admin@123') {
                        session_start();
                        $_SESSION['admin_login'] = 'true';
                        header('Location: http://localhost/e-commerce/admin/admin-products.php');
                    }else{
                        echo "USER AND PASSWORD DO NOT MATCH.";
                    }
                }
            ?>
            <h2 align='center'>LOGIN</h2>
            <form method="post">
                <span>Name</span>
                <input type="text" name='name'>
                <span>Password</span>
                <input type="password" name='pass'>
                <button>Login</button>
            </form>
        </section>
    </main>
</body>

</html>