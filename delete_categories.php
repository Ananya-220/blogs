<?php

include('connection.php');
if (isset($_POST['delete'])) {

    $id = $_POST['id'];
    $sql = "DELETE FROM categories WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: categories.php");
        exit();
    }
    else {
        echo "Error : " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $pagename = "Delete Category";
    include_once('check_login.php');
    include_once('sidebar.php');
    include_once('header.php');
?>
<div class="login-box mt-3">
    <form action="delete_categories.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="card p-2">
            <h3 class="text-danger">Delete Category</h3>
            <hr>
            <p>Are you sure you want to delete this category?</p>
            <div class="mt-5">
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                <a href="categories.php" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>


