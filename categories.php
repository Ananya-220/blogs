<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $pagename = "Categories";
    include_once('check_login.php');
    include_once 'sidebar.php';
    include_once('header.php');
    include_once('connection.php');


    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn , $sql);


    ?>
            <div class="table-responsive mt-5 category-table">
                <div class="d-grid gap-2 d-md-flex mb-2 justify-content-md-end">
                    <a class="btn btn-primary" type="button" href='add_new.php'>Create Category</a>
                </div>
                <table class="table table-bordered border-dark table-hover table-light align-middle">
                    <thead class="table-primary table-bordered border-dark align-middle">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($result) > 0)
                            { 
                            while($row = mysqli_fetch_assoc($result)) {
                                $class = $row["status"] == "1" ? "success" : "danger";
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row["id"] ; ?></th>
                            <td><?php echo ucfirst($row["name"]) ; ?></td>
                            <td><span class="badge rounded-pill text-bg-<?php echo $class; ?>"><?php echo $row["status"] == "1" ? "Active" : "Inactive"; ?></span></td>
                            <td class="table-data align-top" align="center">
                                <div class="d-grid gap-2 mx-auto d-md-block">
                                    <button type="button" class="btn btn-success btn-sm">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                            
                        <?php  
                            }
                            else {
                        ?>
                                <tr>
                                    <td colspan="4" align="center">No Records Found</td>
                                </tr>
                        <?php 
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </main>

    </div>
</body>

</html>