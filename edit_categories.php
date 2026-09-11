<?php

$validation = true;

include('connection.php');


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

    if($validation)
        {
                $form_id = $_POST['id'];
                $sql1 = "UPDATE categories SET name = '$enteredName' , status = $enteredStatus WHERE id = $form_id";
                if (mysqli_query($conn, $sql1)) {
                    echo "Record updated successfully";
                    header("location: categories.php");
                } 
                else {
                    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                }
            }
        
        }

$name = $status = "";
if ($validation) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM categories WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $status = $row["status"];
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
    $pagename = "Edit Category";
    include_once('check_login.php');
    include_once('sidebar.php');
    include_once('header.php');
    ?>

    <div class="login-box mt-3">
        <h1 align="center">Edit Category</h1>
        <form action="edit_categories.php" method="post">
            <div class="input-group">
                <input type="hidden" name = "id" value="<?php echo $id; ?>">
                <label>Name : </label>
                <input type="text" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
                <span style="color:red"><?php if ($nameErr != "") {echo $nameErr;}  ?></span>
            </div>
            <div class="input-group">
                <label>Status : </label><br>
                <select id="status" name="status">
                    <option value="">Select Status</option>
                    <option value="1" <?php echo ($status == "1") ? "selected" : "" ?>>Active</option>
                    <option value="0" <?php echo ($status == "0") ? "selected" : "" ?>>Inactive</option>
                </select>
                <span style="color:red"><?php echo $statusErr ?></span>
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="submit">Submit</button>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" type="button" href='categories.php'>Back</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>