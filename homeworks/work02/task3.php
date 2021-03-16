<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #333;
            border-collapse: collapse;
        }
        tr, td {
            border: 1px solid #333;
            padding: 5px;
            text-align: center;
        }
    </style>
    <title>Task 3</title>
</head>
<body>
    <?php 
        $matrix = [];
        for($i=0; $i<6; $i++) {
            for($j=0; $j<5; $j++) {
                $matrix[$i][$j] = $i+$j;
            }
        }
    ?>

    <table>
        <?php 
            for($i=0; $i<count($matrix); $i++) {
            ?>
                <tr>
                    <?php 
                        for($j=0; $j<count($matrix[$i]); $j++) {
                        ?>
                            <td><?= $matrix[$i][$j] ?></td>
                    <?php 
                        }
                    ?>
            </tr>
        <?php 
            }
        ?>
    </table>
</body>
</html>