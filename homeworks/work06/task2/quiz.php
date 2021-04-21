<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Quizz</title>
</head>
<body>
    <?php
        include_once("./components/header.html");
        include_once("./utils.php");

        $quiz_file_content = $_SESSION['quiz-file'];
        unset($_SESSION['quiz-file']);

        $questions_array = extract_quiz_file($quiz_file_content);
        $question_answer_map = map_question_to_answer($questions_array);

        $_SESSION['question_answer_map'] = $question_answer_map;

        // echo "<pre>";
        // print_r($questions_array);
        // echo "</pre>";
    ?>

    <div class="container">
        <form action="score.php" method="POST" class="quiz-form">
        <h2>QuizzER</h2>
        <?php 
            $q=0;
            foreach($questions_array as $question) {
                $title = $question['title'];
                $answers = $question['answers'];
            ?>
            <div class="question">
                <p class="title"><?= $title ?></p>
                <div class="answers">
                <?php
                    for($i=0; $i<count($answers); $i++) {
                        ?>
                        <label>
                            <input type="radio" name="q<?= $q ?>" value="a<?= $i ?>">     
                            <span><?= $answers[$i][0] ?></span> 
                        </label><br>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
                $q++;
            }
            ?>
            <div class="question">
                <input type="submit" name="send_quiz" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>