<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Task 6</title>
</head>

<body>
    <?php
        function row_sum($row) {
            $sum = 0;
            foreach($row as $elem) $sum += $elem;
            return $sum;
        }

        function col_sum($col) {
            $sum = 0;
            foreach($col as $elem) $sum += $elem;
            return $sum;
        }

        function build_matrix($a, $b, $m, $n) {
            $matrix = array();
            echo "<table>";
            for($i=0; $i<$m; $i++) {
                echo "<tr>";
                $row = array();
                for($j=0; $j<$n; $j++) {
                    array_push($row, random_int($a, $b));
                    echo "<td>".random_int($a, $b)."</td>";
                }                
                array_push($matrix, $row);
                echo "<td rowspan>" .row_sum($row) ."</td>";
                echo "</tr>";
                $row = array();
            }
            echo "<tr>";
            for($l=0; $l<$n; $l++) {
                echo "<td>" .col_sum(array_column($matrix, $l)) ."</td>";
            }
            echo "</tr>";
            echo "</table>";
            return $matrix;
        }

        if(isset($_POST["get_table"])) {
            $a = $_POST["a"];
            $b = $_POST["b"];
            $n = $_POST["n"];
            $m = $_POST["m"];
            if(is_numeric($a) && is_numeric($b) && is_numeric($n) && is_numeric($m))
                $matrix = build_matrix($a, $b, $n, $m);
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
    </form>
</body>
</html>