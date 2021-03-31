<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
</head>
<body>
    <?php
        function build_array($a, $b, $m) {
            $nums = array();
            for($i=0; $i<$m; $i++) {
                array_push($nums, random_int($a, $b));
            }
            return $nums;
        }

        if(isset($_POST["get_table"])) {
            $a = $_POST["a"]; $b = $_POST["b"]; $m = $_POST["m"];

            if(is_numeric($a) && is_numeric($b) && is_numeric($m))
                $nums = build_array($a, $b, $m);

            echo "<pre>";
            print_r($nums);
            echo "</pre>";
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
        
        <input type="submit" value="Submit" name="get_table">
    </form>
</body>
</html>