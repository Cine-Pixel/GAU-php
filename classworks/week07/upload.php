<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Upload files</title>
</head>
<body>
    <div class="upload">
        <?php 
            date_default_timezone_set("Asia/Tbilisi");

            if(isset($_GET['folder'])) {
                mkdir("./root");
            }

            if(is_dir("./root")) {
                echo "<p><a href='root.php' target='_blank'>Root folder</a></p>";
            } else {
                echo "<p><a href='upload.php?folder=root'>Make root folder</a></p>";
            }

            $size_error = "";
            $type_error = "";
            if(isset($_POST['upload'])) {
                $file = $_FILES['file'];
                // print_r($file['size']);
                if($file['size'] > 1024*1024) 
                    $size_error = "Max 1MB allowed";
                
                $file_type = pathinfo($file['name'], PATHINFO_EXTENSION);
                if($file_type !== "txt") {
                    $type_error = "Invalid file type";
                }

                if(empty($size_error) && empty($type_error)) {
                    $file_path = "./root/".date('Y-m-d-h-i-s').".".$file_type;
                    move_uploaded_file($file['tmp_name'], $file_path);
                }

            }
        ?>

        <p><?= $size_error ?></p>
        <p><?= $type_error ?></p>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <br><br>
            <input type="submit" value="Upload File" name="upload">
        </form>
    </div>
</body>
</html>