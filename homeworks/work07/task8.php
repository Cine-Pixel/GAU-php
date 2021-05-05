<?php require_once("./db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">

    <title>Menu display</title>
</head>
<body>
    <?php include_once("./components/header.php"); ?>

    <div class="container">
        <?php 
            $query1 = "SELECT Text, Title FROM menu LIMIT 2";
            $query2 = "SELECT Text, Title FROM menu";
            $query3 = "SELECT * FROM menu WHERE Id=2";
            $query4 = "SELECT * FROM menu WHERE Id>=2";
            $query5 = "SELECT * FROM menu WHERE Id<=4";
            $query6 = "SELECT * FROM menu WHERE Title=N'ფილმები' OR Title=N'თამაშები'";
            $query7 = "SELECT * FROM menu WHERE Title=N'მუსიკები' AND Id>3";

            $queries = array($query1, $query2, $query3, $query4, $query5, $query6, $query7);
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