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
    include_once "sidebar.php";
    include_once('header.php');
    ?>
    <div class="login-box mt-3">
        <h1 align="center">Create Category</h1>
        <form action="dashboard.php" method="post">
            <div class="input-group">
                <label>Name : </label>
                <input type="name" name="name" placeholder="Enter your name">
            </div>
            <div class="input-group">
                <label>Status : </label><br>
                <select id="status" name="status">
                    <option value=" ">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary mt-5">Submit</button>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" type="button" href='categories.php'>Back</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>