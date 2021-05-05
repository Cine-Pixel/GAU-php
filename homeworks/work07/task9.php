<?php require_once("./db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">

    <title>Users display</title>
</head>
<body>
    <?php include_once("./components/header.php"); ?>

    <div class="container">
        <?php 
            $query1 = "SELECT Age, Date, Reg_Date, Gender FROM users LIMIT 3";
            $query2 = "SELECT * FROM users LIMIT 2";
            $query3 = "SELECT * FROM users WHERE Id>1 AND Id<4";
            $query4 = "SELECT * FROM users WHERE Id<2 OR Id>=4";
            $query5 = "SELECT * FROM users WHERE Date='2014-07-04'";
            $query6 = "SELECT * FROM users WHERE Date > '2014-07-04'";
            $query7 = "SELECT * FROM users WHERE Date > '2014-06-04' AND Date < '2014-07-04'";
            $query8 = "SELECT * FROM users WHERE Age > 10 AND Age < 18";

            $queries = array($query1, $query2, $query3, $query4, $query5, $query6, $query7, $query8);
        ?>

        <?php 
            for($i=0; $i<count($queries); $i++) {
        ?>
            <h3><?= $i+1 ?>)</h3>
            <div class="menu-wrapper">
                <nav class="menu">
                    <?php 
                        $query = $queries[$i];
                        $menus = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($menus)) {
                            echo "<ul>";
                            foreach($row as $item) 
                                echo "<li>$item</li>";
                            echo "</ul>";
                        }
                    ?>
                </nav>
            </div>
        <?php
            } 
        ?>
    </div>

</body>
</html>