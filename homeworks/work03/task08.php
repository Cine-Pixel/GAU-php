<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8</title>
</head>
<body>
    <?php 
        function build_matrix($a, $b, $m, $n) {
            $matrix = array();
            for($i=0; $i<$m; $i++) {
                $row = array();
                for($j=0; $j<$n; $j++) {
                    array_push($row, random_int($a, $b));
                }                
                array_push($matrix, $row);
                $row = array();
            }
            return $matrix;
        }

        if(isset($_POST["get_table"])) {
            $a = $_POST["a"]; $b = $_POST["b"];
            $n = $_POST["n"]; $m = $_POST["m"];

            if(is_numeric($a) && is_numeric($b) && is_numeric($n) && is_numeric($m)) {
                $matrix = build_matrix($a, $b, $n, $m);
                echo "<pre>";
                print_r($matrix);
                echo "</pre>";
            }
        }

    ?>

    <form method="post">
        <label for="a">
            <span>a: </span>
            <input type="number" name="a">
        </label><br>

        <label for="b">
            <span>b: </span>
            <input type="number" name="b">
        </label><br>

        <label for="m">
            <span>M: </span>
            <input type="number" name="m">
        </label><br>

        <label for="n">
            <span>N: </span>
            <input type="number" name="n">
        </label><br>
        
        <input type="submit" value="Submit" name="get_table">
</body>
</html>