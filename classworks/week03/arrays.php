<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div {
            width: 500px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #333;
        }
    </style>
    <title>Arrays</title>
</head>
<body>
    <div>
        <h2>Arrays</h2>
        <?php 
            $m1 = array("Hello", 5.32, "Hi", 5);
            echo "<pre>";
            var_dump($m1);
            echo "</pre>";
            array_push($m1, 5, "World", 2, 1);
            echo "<pre>";
            print_r($m1);
            echo "</pre>";
        ?>
    </div>
    <div>
        <h2>Associative array</h2>
        <?php 
            $m2 = array("key1"=>55, "key2"=>"hi");
            echo "<pre>" .print_r($m2) . "</pre>";
            foreach($m2 as $key=>$val) {
                echo $key. " - " .$val;
                echo "<br>";
            }
        ?>
    </div>

    <div>
        <h2>Multidimentional array</h2>
        <?php 
            function canBePrinted($n) {
                return gettype($n) == "integer" || gettype($n) == "double" || gettype($n) == "string"; 
            }

            function bfs($arr, $start) {
                $visited = [];
                $stack = [];
                array_push($stack, $start);

                while(!empty($stack)) {
                    $curr = $stack[count($stack)-1];
                    if(canBePrinted($curr)) {
                        echo $curr;
                        array_pop($stack);
                    } else {
                        foreach($stack as $stackItem) {
                            array_pop($stack);
                            array_push($stack, $stackItem);
                        }
                    }

                    foreach($arr as $elem) {
                        array_push($stack, $elem);
                    }
                }
            }
            $m3 = array(
                15,
                array(5, 2, 1),
                array(12, -5, 2.5),
                array("key"=>[5, 2, "name"], 8, 0)
            );
            echo "<pre>";
            print_r($m3);
            echo "</pre>";
            echo $m3[3]['key'][2];
            print_r(25);
        ?>
    </div>
</body>
</html>