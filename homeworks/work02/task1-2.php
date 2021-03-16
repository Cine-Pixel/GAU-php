<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {box-sizing: border-box;}
        body {
            background-color: teal;
        }
        .output {
            width: 600px;
            margin: 0 auto;
            padding: 15px;
            background-color: lightblue;
        }
        form {
            width: 600px;
            margin: 0 auto;
            padding: 15px;
            background-color: lightblue;
        }
        .tables {
            width: 820px;
            margin: 0 auto;
            display: flex;
        }
        table {
            width: 400px;
            margin: 0 auto;
            border: 1px solid #333;
            border-collapse: collapse;
            background-color: lightblue;
        }
        tr, td {
            border: 1px solid #333;
            text-align: center;
        }
        td {width: 40px; height: 40px}
    </style>
    <title>Task 1, 2</title>
</head>
<body>
    <div class="output">
        <?php 
            $array = array(); 
            $less_element_count = 0;
            $greater_element_count = 0;
            for($i=0; $i<12; $i++) array_push($array, rand(10, 100));

            if(isset($_POST["change_array"])) {
                echo "The array: ";
                for($i=0; $i<count($array); $i++) {
                    if($_POST["number"] > $array[$i]) $less_element_count++;
                    elseif($_POST["number"] < $array[$i]) $greater_element_count++;
                    echo $array[$i] ." ";
                }

                echo "<p style='color:green'>There are ".$less_element_count ." elements less than " .$_POST["number"] ." in the array</p>";
                echo "<p style='color:green'>There are ".$greater_element_count ." elements greater than " .$_POST["number"] ." in the array</p>";
            }
        ?>
    </div>

    <form method="POST" class="task1">
        <label for="number">შეიყვანეთ რიცხვი: </label>
        <input type="number" name="number">
        <input type="submit" value="Submit" name="change_array">
    </form>
    <br>
    <hr>

    <?php 
        function display_matrix($matrix) {
            echo "<table>";
            echo "<thead><tr><td colspan='4'>Full matrix</td></tr></thead>";
            foreach($matrix as $row) {
                echo "<tr>";
                foreach($row as $element) {
                    echo "<td>" .$element ."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        function main_diagonal($matrix) {
            $dim = count($matrix);
            echo "<table>";
            echo "<thead><tr><td colspan='4'>Above main diagonal</td></tr></thead>";
            for($i=0; $i<$dim; $i++) {
                echo "<tr>";
                for($j=0; $j<$dim; $j++) {
                    if($i === $j || $i > $j) echo "<td></td>";
                    else echo "<td>" .$matrix[$i][$j] ."</td>"; 
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        function generate_matrix() {
            $matrix = array();
            for($i=0; $i<4; $i++) {
                $row=array();
                for($j=0; $j<4; $j++) {
                    array_push($row, rand(10, 100));
                }
                array_push($matrix, $row);
                $row=array();
            }
            return $matrix;
        }

        $matrix = generate_matrix();
    ?>

    <div class="tables">
        <?php 
            display_matrix($matrix);
            main_diagonal($matrix);
        ?> 
    </div>

    <div class="output">
        <?php 
            function sum_of_digits($n) {
                $sum_of_digits = 0;
                while($n) {
                    $sum_of_digits += ($n%10);
                    $n = floor($n/10);
                }
                return $sum_of_digits;
            }

            function get_info($matrix, $n) {
                $multiples=0; $sum=0; $prod=1; $arithmetic_mean=0;
                $all_sum_of_digits = array();
                foreach($matrix as $row) {
                    foreach($row as $element) {
                        $sum += $element;
                        $prod *= $element;
                        if($element % $n === 0) $multiples++;
                        array_push($all_sum_of_digits, sum_of_digits($element));
                    }
                }
                $arithmetic_mean = $sum / 16;
                return array(
                    "multiples"=>$multiples, 
                    "sum"=>$sum, 
                    "prod"=>$prod, 
                    "arithmetic_mean"=>$arithmetic_mean, 
                    "sum_of_digits"=>$all_sum_of_digits
                );
            }

            function display_info($info) {
                echo "<table>";
                echo "<thead><tr><td colspan='4'>Info</td></tr></thead>";
                foreach($info as $key=>$value) {
                    if(is_array($value)) continue;
                    echo "<tr><th>".$key."</th>";
                    echo "<td>".$value."</td></tr>";
                }
                echo "</table>";
            }

            if(isset($_POST['change_matrix'])) {
                $number2 = $_POST['number2'];
                $info = get_info($matrix, $number2);
                display_info($info);
            }
        ?>
    </div>

    <form method="post">
        <label for="number2">შეიყვანეთ რიცხვი: </label>
        <input type="number" name="number2">
        <input type="submit" value="Submit" name="change_matrix">
    </form>

</body>
</html>