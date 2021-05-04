<?php 
    require_once("./db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actions</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="?action=insert">Insert</a></li>
        </ul>
    </nav>
    <main>
        <?php 
            if(isset($_GET['action']) && $_GET['action'] == "insert") {
                include("./actions/insert.php");
            }
            else {
                include("./actions/categories.php");
            }
        ?>
    </main>
</body>
</html>