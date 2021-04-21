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

    <title>Quiz</title>
</head>
<body>
    <?php 
        include_once("./components/header.html");


        $size_error = "";
        $type_error = "";

        if(isset($_POST['upload_file'])) {
            $uploaded_file = $_FILES['uploaded_file'];
            $file_type = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);

            if($uploaded_file['size'] > 50*1024*1024) 
                $size_error = "File must be less than 50MB";
            if($file_type !== "txt") 
                $type_error = "Only .txt files are allowed";
              
            if(empty($size_error) && empty($type_error)) {
                // $file_path = "./files/".date('Y-m-d-h-i-s').".".$file_type;
                // move_uploaded_file($uploaded_file['tmp_name'], $file_path);
                $contents= file_get_contents($uploaded_file['tmp_name']);
                $_SESSION['quiz-file'] = $contents;
                header("Location: ./quiz.php");
            }
        }


    ?>

    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <h2>Choose file to generate quiz</h2>
            </div>

            <div class="form-row errors">
                <small><?= $size_error ?></small>
                <small><?= $type_error ?></small>
            </div>

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Choose File</span><br>
                    <input type="file" name="uploaded_file">
                </label>
            </div>

            <div class="form-row">
                <input type="submit" value="Upload" name="upload_file">
            </div>
        </form>
    </div>
</body>
</html>