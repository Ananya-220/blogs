<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="dashboard-layout">

        <!-- Sidebar -->
        <?php
        $pagename = "Dashboard";
        include_once('check_login.php');
        include_once('sidebar.php');
        include_once('header.php');
        ?>

            <div class="content-grid">
                <div class="stat-card">
                    <div class="stat-label">Categories</div>
                    <div class="stat-value">4</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Blogs</div>
                    <div class="stat-value">10</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Users</div>
                    <div class="stat-value">20+</div>
                </div>
            </div>
        </main>

    </div>
</body>

</html>