<?php

session_start();
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

$emailErr = $passwordErr = "";
$enteredEmail = $enteredPassword = "";

//validation start
if (isset($_POST["submit"])) {
    $enteredEmail = $_POST["email"] ?? "";
    $enteredPassword = $_POST["password"] ?? "";

    if (empty($enteredEmail)) {
        $emailErr = "Email is required !";
    }
    if (empty($enteredPassword)) {
        $passwordErr = "Password is required !";
    }

    //validation ends

    $sql = "SELECT * FROM users WHERE email='" . $enteredEmail . "' AND password='" . $enteredPassword . "'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        //true condition code session
        $row = mysqli_fetch_assoc($result);
        if ($enteredEmail == $row['email'] && $enteredPassword == $row['password']) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            header("location: dashboard.php");
            exit();
        }
    } else {
        //error message
        if ($enteredEmail != "" && $enteredPassword != "") {
            echo "Invalid Email and Password";
        }

    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-box mt-5">
        <h1 align="center">LOGIN PAGE</h1>
        <form method="post">
            <div class="input-group">
                <label>Email : </label>
                <input type="email" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($enteredEmail) ?>">
                <span style="color:red"><?php if ($emailErr != "") {
                                            echo $emailErr;
                                        }  ?></span>
            </div>
            <div class="input-group">
                <label>Password : </label>
                <input type="password" name="password" placeholder="Enter your password" value="<?= htmlspecialchars($enteredPassword) ?>">
                <span style="color:red"><?php if ($passwordErr != "") {
                                            echo $passwordErr;
                                        }  ?></span>
            </div>
            <input type="submit" name="submit" value="Submit" id="submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>