<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 10</title>
</head>
<body>
    <?php 
        $url = $_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];
    ?>

    <?php 
        if (preg_match('~[0-9]+~', $url)) {
        ?>
            <h2 style="text-align: center;">ჩატვირთული URL შეიცავს რიცხვებს</h2> 
        <?php
        } else {
        ?>
            <h2 style="text-align: center;">ჩატვირთული URL არ შეიცავს რიცხვებს</h2> 
        <?php
        }
    ?>

</body>
</html>