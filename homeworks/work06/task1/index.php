<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://ka-f.fontawesome.com" />
    <script src="https://kit.fontawesome.com/7f01f336dd.js" crossorigin="anonymous"></script>

    <title>File Store</title>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>TXTStore</h1>
        </div>
    </header>

    <?php 
        if(!is_dir("./files")) mkdir("./files");

        $edit_file_content = "";
        $edit_file_path = "";
        $show_or_not = false;

        if(isset($_GET['file']) && !empty($_GET['file'])) {
            $edit_file = "./files/".$_GET['file'];
            $file = fopen("$edit_file", "r");
            $edit_file_content = fread($file, filesize($edit_file));
            fclose($file);
            $edit_file_path = $edit_file;
            $show_or_not = true;
        }

        if(isset($_POST['edit_file'])) {
            $file = fopen($_POST['file'], "w");
            fwrite($file, $_POST['new_content']);
            fclose($file);
        }

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
                $file_path = "./files/".date('Y-m-d-h-i-s').".".$file_type;
                move_uploaded_file($uploaded_file['tmp_name'], $file_path);
            }
        }

        if(isset($_POST['delete_file'])) 
            unlink($_POST['delete_file']);
    ?>

    <div class="container">

        <div class="forms-stuff">
            <div class="form-toggler" id="toggle-forms">
                <i class="fas fa-plus"></i>
            </div>

            <?php 
                include_once("forms.php"); 
            ?>
        </div>

        <div class="files">
            <?php
                $files = scandir("./files");
                for($i=2; $i<count($files); $i++) { ?>
                    <div class="file">
                        <span><a href="./files/<?= $files[$i] ?>" target="_blank"><?= $files[$i] ?></a></span>
                        <div class="controls">
                            <span class="download">
                                <a href='./files/<?= $files[$i] ?>' download>Download</a>
                            </span>
                            <span class="read"><a href="./files/<?= $files[$i] ?>" target="_blank">Read</a></span>
                            <span class="edit"><a href="?file=<?= $files[$i] ?>">Edit</a></span>
                            <span class="delete" data-delete="<?= './files/'.$files[$i] ?>">Delete</span>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>

    <script 
        src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
</body>
</html>