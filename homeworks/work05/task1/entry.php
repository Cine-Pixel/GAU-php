<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Photo Store</title>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>PhotoStore</h1>
        </div>
    </header>

    <div class="container">
        <?php 
            if(!is_dir("./files")) mkdir("./files");

            $size_error = "";
            $type_error = "";

            if(isset($_POST['upload_file'])) {
                $uploaded_file = $_FILES['uploaded_file'];
                $file_type = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);

                if($uploaded_file['size'] > 100*1024*1024) 
                    $size_error = "File must be less than 100MB";
                if($file_type !== "png" && $file_type !== "jpg" && $file_type !== "gif")
                    $type_error = "Only .png, .jpg and .gif files are supported";
                
                if(empty($size_error) && empty($type_error)) {
                    $file_path = "./files/".date('Y-m-d-h-i-s').".".$file_type;
                    move_uploaded_file($uploaded_file['tmp_name'], $file_path);
                }

                $_POST = array();
            }
        ?>

        <form method="POST" enctype="multipart/form-data">
            <h2>Choose image to upload</h2>

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

        <div class="files">
            <?php
                $files = scandir("./files");
                for($i=2; $i<count($files); $i++) { ?>
                    <div class="file">
                        <a href='./files/<?= $files[$i] ?>' target='_blank'> <?= $files[$i] ?> </a>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</body>
</html>