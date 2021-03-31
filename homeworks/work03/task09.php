<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Task 9</title>
</head>
<body>
    <?php
        function checkPassword($pwd) {
            $errors = array();

            if (strlen($pwd) < 8) 
                array_push($errors, "Password too short!");

            if (!preg_match("#[0-9]+#", $pwd)) 
                array_push($errors, "Password must include at least one number!");

            if (!preg_match("#[a-zA-Z]+#", $pwd)) 
                array_push($errors, "Password must include at least one letter!");

            return $errors;
        }

        $errors = array();
        if(isset($_POST["send_password"])) {
            $password = $_POST["password"];
            $errors = checkPassword($password);
        }
    ?>

    <?php 
        if($errors) {
            foreach($errors as $error) {
            ?>
                <h3 style="color: red;"><?= $error ?></h3>
            <?php
            }
        } else {
        ?>
            <h3 style="color: green">Good Password</h3>
        <?php
        }
    ?>
    <form method="post">
        <label for="password">Enter password: </label>
        <input type="text" name="password"><br><br>
        <input type="submit" value="Check" name="send_password" style="width: 100%;">
    </form>
</body>
</html>