<?php
$login = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from users where username='$username' AND
    password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location:form.php");
    } else {
        echo "<b> wrong user id and password </b> ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Login</title>
    <style>
        .formcontent {
            padding: 10px 10cm 10px 10cm;
            margin: 2px;
            font-size: 0.5cm;

        }

        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }

        .submit {
            background-color: #4CAF50;
            width: 100%;
            color: black;
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
        }

        .img1 {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 10%;
        }

        .signup {
            background-color: #4c6eaf;
            width: 100%;
            color: black;
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;

        }
    </style>

</head>


<body>
    <img src="https://w7.pngwing.com/pngs/518/320/png-transparent-computer-icons-mobile-app-development-android-my-account-icon-blue-text-logo-thumbnail.png" alt="User Login" class="img1">


    <div class="formcontent">
        <form method="POST" action="login.php">


            <centre>
                <h2>User Login</h2>
            </centre>



            <label>User Name</label>

            <input type="text" name="username" placeholder="User Name"><br>
            <br>

            <label>Password</label>

            <input type="password" name="password" placeholder="Password"><br>
            <br>
            <button type="submit" class="submit">Login</button>

            <button type="button" class="signup">SignUp</button>



        </form>
    </div>

</body>

</html>