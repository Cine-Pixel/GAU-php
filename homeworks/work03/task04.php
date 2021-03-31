<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Task 4</title>
</head>
<body>
    <?php 
        function generateCode() {
            $operations = array("+", "-");
            $n1 = random_int(10, 99);
            $n2 = random_int(10, 99); 
            $op = $operations[random_int(0, 1)];
            return $n1 ." " .$op ." " .$n2;
        }
        $code = generateCode();
    ?>

    <?php 
        $response="";
        if(isset($_POST["send_code"])) {
            $user_code = $_POST["code_input"];
            $current_code = $_POST["current_code"];
            $code_parts = explode(" ", $current_code);

            if($code_parts[1] === "+") {
                if(intval($user_code) === (intval($code_parts[0]) + intval($code_parts[2])))
                    $response = "Correct";
                else $response = "Incorrect";
            } else {
                if(intval($user_code) === (intval($code_parts[0]) - intval($code_parts[2])))
                    $response = "Correct";
                else $response = "Incorrect";
            }
            
        } 
    ?>

    <h3>Type result: <?= $code ?></h3>
    <p><?= $response ?></p>
    <form method="post">
        <input type="number" name="code_input">
        <input type="hidden" name="current_code" value="<?= $code ?>">
        <input type="submit" value="Check Code" name="send_code">
    </form>
</body>
</html>