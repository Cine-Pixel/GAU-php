<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 400px;
            margin: 0 auto;
            border: 1px solid #333;
            border-collapse: collapse;
        }
        tr, td {
            border: 1px solid #333;
            padding: 5px;
        }
    </style>
    <title>Task 4</title>
</head>
<body>
    <?php 
       $cars = array(
           array(
               "Make"=>"Toyota",
               "Model"=>"Corolla",
               "Color"=>"White",
               "Mileage"=>24000,
               "Status"=>"Sold"
           ),
           array(
               "Make"=>"Toyota",
               "Model"=>"Camry",
               "Color"=>"Black",
               "Mileage"=>56000,
               "Status"=>"Available"
           ),
           array(
               "Make"=>"Honda",
               "Model"=>"Accord",
               "Color"=>"White",
               "Mileage"=>15000,
               "Status"=>"Sold"
           )
       ) 
    ?>

    <table>
        <thead>
            <tr>
                <?php 
                    foreach($cars[0] as $key=>$value) echo "<td>".$key."</td>";
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($cars as $car) {
                    echo "<tr>";
                    foreach($car as $key=>$value) {
                        echo "<td>".$value."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>