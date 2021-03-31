<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Task 3</title>
</head>
<body>
    <?php 
        function generateCode() {
            $code = "";
            for($i=0; $i<5; $i++) {
                $code .= random_int(0, 9);
            }
            return $code;
        }
        $code = generateCode();
    ?>

    <?php 
        $response="";
        if(isset($_POST["send_code"])) {
            $user_code = $_POST["code_input"];
            $current_code = $_POST["current_code"];
            if($user_code === $current_code) $response = "Correct";
            else $response = "Incorrect";
        } 
    ?>

    <h3>Type code: <?= $code ?></h3>
    <p><?= $response ?></p>
    <form method="post">
        <input type="text" name="code_input">
        <input type="hidden" name="current_code" value="<?= $code ?>">
        <input type="submit" value="Check Code" name="send_code">
    </form>
</body>
</html>