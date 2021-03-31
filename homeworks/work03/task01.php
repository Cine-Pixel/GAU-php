<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Task 1</title>
</head>
<body>
    <?php 
        function draw_table() {
            echo "<table>";
            for($i=0; $i<10; $i++) {
                echo "<tr>";
                for($j=0; $j<10; $j++) {
                    echo "<td>".random_int(10, 99)."</td>";
                }                
                echo "</tr>";
            }
            echo "</table>";
        }

        draw_table();
    ?>
</body>
</html>