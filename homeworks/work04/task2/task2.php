<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="task2.css">    
    <title>Drivelon</title>
</head>
<body>
    <?php 
        $main = "./files";
        if(isset($_GET['folder'])) $_SESSION['folder'] = $_GET['folder'];
        if(!isset($_SESSION['folder'])) $_SESSION['folder'] = $main;
        if(!str_contains($_SESSION['folder'], "./files")) $_SESSION['folder'] = $main;
    ?>

    <h2>.txt File Store</h2>
    <div class="file-list">
        <div class="file-list__header">
            <ul>
                <li><button class="create">Create</button></li>
                <li>Name</li>
                <li>Date created</li>
                <li>Action</li>
            </ul>
        </div>
        
        <div class="file-list__content">
            <div class="file">
                <ul>
                    <li><a href="task2.php?folder=<?= substr($_SESSION['folder'], 0, strrpos($_SESSION['folder'], "/")) ?>">up a directory</a></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div> 
            <?php 
                include_once("utils.php");

                if(!is_dir($main)) mkdir($main);
                $clickedFile = "";

                $is_file_clicked = false;
                if(isset($_GET['file'])) {
                    $clickedFile = $_GET['file'];
                    $is_file_clicked = true;
                    echo "<script>let show=true;</script>";
                } else echo "<script>let show=false;</script>";

                detect_creation($clickedFile); 

                if(isset($_POST['del_path'])) {
                    $delete_item = $_POST['del_path'];
                    if(is_dir($delete_item)) xrmdir($delete_item);
                    else unlink($delete_item);
                }

                $dirContent = readDirs($_SESSION['folder']);

                include_once("list-content.php");
            ?>
        </div>
    </div>

    <?php
        include_once("./form.php");
    ?>

    <script src="task2.js"></script>
</body>
</html>