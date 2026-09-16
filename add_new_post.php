<?php

include_once('check_login.php');
include('connection.php');
$validation = true;
$titleErr = $categoriesErr = $poststatusErr = $descriptionErr = "";
$enteredTitle = $enteredCategories =  $enteredpostStatus = $enteredDescription = "";

//validation starts

if (isset($_POST["submit"])) {
    $enteredTitle = $_POST["title"];
    $enteredpostStatus = $_POST["pstatus"];
    $enteredCategories = $_POST["pcategories"];
    $enteredDescription = $_POST["description"];

    if (empty($enteredTitle)) {
        $titleErr = "Title is required !";
        $validation = false;
    }

    if (empty($enteredCategories)) {
        $categoriesErr = "Category is required !";
        $validation = false;
    }

    if (empty($enteredpostStatus) && $enteredpostStatus != 0) {
        $poststatusErr = "Status is required !";
        $validation = false;
    }

    if (empty($enteredDescription)) {
        $descriptionErr = "Description is required !";
        $validation = false;
    }
    if ($validation) {
        $sql = "INSERT INTO posts(title , description , status , category_id , user_id , created_at) VALUES ('$enteredTitle' , '$enteredDescription' , $enteredpostStatus , '$enteredCategories' , " . $_SESSION['id'] . " , NOW())";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("location: posts.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

//validation ends

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $pagename = "Create Post";
    include_once('sidebar.php');
    include_once('header.php');
    ?>

    <div class="login-box mt-3">

        <div class="col-3 justify-content-md-end">
            <a class="btn btn-outline-primary" type="button" href='posts.php'>Back</a>
        </div>

        <h1 align="center">Create Your Post</h1>

        <form action="add_new_post.php" method="post" class="row g-3">

            <div class="col-12">
                <label>Title : </label>
                <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php htmlspecialchars($enteredTitle) ?>">
                <span style="color:red"><?php if ($titleErr != "") {
                                            echo $titleErr;
                                        }  ?></span>
            </div>

            <div class="col-md-6">
                <label>Status : </label>
                <select class="form-select col-md-6" name="pstatus">
                    <option value="">Select Status</option>
                    <option value="1" <?php echo ($enteredpostStatus == "Active") ? "selected" : "" ?>>Active</option>
                    <option value="0" <?php echo ($enteredpostStatus == "Inactive") ? "selected" : "" ?>>Inactive</option>
                </select>
                <span style="color:red"><?php echo $poststatusErr; ?></span>
            </div>

            <div class="col-md-6">
                <label>Categories : </label>
                <select class="form-select" name="pcategories">
                    <option value="">Select Categories</option>
                    <?php
                    include('connection.php');
                    $sql1 = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $enteredCategories = $row["id"]; ?>"> <?php echo $row["name"]; ?> </option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <span style="color:red"><?php if ($categoriesErr != "") {
                                            echo $categoriesErr;
                                        }  ?></span>
            </div>

            <div class="col-12">
                <label>Description : </label>
                <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px" placeholder="Enter description here" value="<?php htmlspecialchars($enteredDescription) ?>"></textarea>
                <span style="color:red"><?php echo $poststatusErr; ?></span>
            </div>

            <div class="col-3">
                <button type="submit" class="btn btn-primary mt-5" name="submit">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>