<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>
<body>
    <?php
        $response = "";
        if(isset($_POST['number'])) {
            $number = $_POST['number'];
            if(is_numeric($number)) {
                $response = "This number has " .strlen($number) ." digits";
            } else $response = "Invalid number";
        }
    ?>

    <form method="post">
        <label for="number">
            <span>Enter number</span>
            <input type="number" name="number">
        </label>
        <input type="submit" value="Check" name="check">
    </form>
    <p><?= $response ?></p>
</body>
</html>