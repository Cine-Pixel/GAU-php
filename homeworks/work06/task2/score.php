<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Score</title>
</head>
<body>
    <?php 
        include_once("./components/header.html");
        $score = 0;
        if(isset($_POST['send_quiz'])) {
            $question_answer_map = $_SESSION['question_answer_map'];
            unset($_SESSION['question_answer_map']);
            $user_answers = $_POST;
            unset($user_answers['send_quiz']);

            foreach($user_answers as $question => $answer) {
                if($question_answer_map[$question] === $answer)
                    $score++;
            }
        }
    ?>

    <div class="container">
        <div class="score-display">
            <h2>You have <?= $score ?> points</h2>
            <a href="index.php">Go Back</a>
        </div>
    </div>
    
</body>
</html>