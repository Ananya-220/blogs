<?php
$validation = true;
$nameErr = $statusErr = "";
$enteredName = $enteredStatus = "";
//validation start
if (isset($_POST["submit"])) {
    $enteredName = $_POST["name"];
    $enteredStatus = $_POST["status"];

    if (empty($enteredName)) {
        $nameErr = "Name is required !";
        $validation = false;
    }
    if (empty($enteredStatus) && $enteredStatus != 0) {
        $statusErr = "Status is required !";
        $validation = false;
    }

    include('connection.php');
    if ($validation) {
        $sql = "INSERT INTO categories(name, status) VALUES ('$enteredName' , $enteredStatus)";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("location: categories.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $pagename = "Create Category";
    include_once('check_login.php');
    include_once('sidebar.php');
    include_once('header.php');
    ?>
    <div class="login-box mt-3">
        <h1 align="center">Create Category</h1>
        <form action="add_new.php" method="post">
            <div class="input-group">
                <label>Name : </label>
                <input type="text" name="name" placeholder="Enter your name" value="<?php htmlspecialchars($enteredName) ?>">
                <span style="color:red"><?php if ($nameErr != "") {echo $nameErr;}  ?></span>
            </div>
            <div class="input-group">
                <label>Status : </label><br>
                <select id="status" name="status">
                    <option value="">Select Status</option>
                    <option value="1" <?php echo ($enteredStatus == "Active") ? "selected" : "" ?>>Active</option>
                    <option value="0" <?php echo ($enteredStatus == "Inactive") ? "selected" : "" ?>>Inactive</option>
                </select>
                <span style="color:red"><?php echo $statusErr; ?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-5">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a class="btn btn-primary" href="categories.php">Back</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>