<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="task3.css">
    <title>Quiz</title>
</head>
<body>

    <?php 
        $show_score = false;
        $answers = array("q1"=>"a2", "q2"=>"a1", "q3"=>"a1", "q4"=>"\$_GET[]", "q5"=>"False");
        $points = 0;
        if(isset($_POST["send_quiz"])) {
            for($i=1; $i<=5; $i++) {
                if(isset($_POST["q".$i]) && $_POST["q".$i] === $answers["q".$i]) $points++;
            }
            $show_score = true;
        }
    ?>

    <?php 
        if($show_score) {
    ?>
        <div class="score">
            <h2><?= $points ?> points out of 5</h2>
            <form method="POST">
                <button name="restart" id="restart">Restart</button>
            </form>
        </div>
    <?php 
        }
    ?>

    <?php 
        if(isset($_POST["restart"])) $show_score=false;
    ?>

    <form class="main" method="POST">
        <div class="question">
            <p >What does PHP stand for?</p>
            <ul>
                <li>
                    <label>
                        <input type="radio" name="q1" value="a1">
                        <span>Personal Protocol</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="q1" value="a2">
                        <span>PHP: Hypertext Preprocessor</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="q1" value="a3">
                        <span>Prvate Home Page</span>
                    </label>
                </li>
            </ul>
        </div>

        <div class="question">
            <p>How do you write "Hello World" in PHP?</p>
            <ul>
                <li>
                    <label>
                        <input type="radio" name="q2" value="a1">
                        <span>echo "Hello World";</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="q2" value="a2">
                        <span>"Hello World";</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="q2" value="a3">
                        <span>Document.Write("Hello World");</span>
                    </label>
                </li>
            </ul>
        </div>

        <div class="question">
            <p>All variables in PHP start with which symbol?</p>
            <ul>
                <li>
                    <label>
                        <input type="radio" name="q3" value="a1">
                        <span>$</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="q3" value="a2">
                        <span>&</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="q2" value="a3">
                        <span>!</span>
                    </label>
                </li>
            </ul>
        </div>

        <div class="question">
            <p>How do you get information from a form that is submitted using the "get" method?</p>
            <ul>
                <li>
                    <input type="text" name="q4">
                </li>
            </ul>
        </div>

        <div class="question">
            <p>In PHP, the only way to output text is with echo.(True or False)</p>
            <ul>
                <li>
                    <input type="text" name="q5">
                </li>
            </ul>
        </div>

        <input type="submit" value="Submit" name="send_quiz">

    </form>

</body>
</html>