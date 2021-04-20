<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>File Store</title>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>FileStore</h1>
        </div>
    </header>

    <div class="container">
        <?php 
            if(!is_dir("./files")) mkdir("./files");

            $size_error = "";

            if(isset($_POST['upload_file'])) {
                $uploaded_file = $_FILES['uploaded_file'];
                $file_type = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);

                if($uploaded_file['size'] > 50*1024*1024) 
                    $size_error = "File must be less than 50MB";
              
                if(empty($size_error)) {
                    $file_path = "./files/".date('Y-m-d-h-i-s').".".$file_type;
                    move_uploaded_file($uploaded_file['tmp_name'], $file_path);
                }
            }

            if(isset($_POST['delete_file'])) {
                unlink($_POST['delete_file']);
            }

            $_POST = array();

        ?>

        <form method="POST" enctype="multipart/form-data">
            <h2>Choose file to upload</h2>

            <div class="form-row errors">
                <small><?= $size_error ?></small>
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
                        <span><a href="./files/<?= $files[$i] ?>" target="_blank"><?= $files[$i] ?></a></span>
                        <div class="controls">
                            <span class="download">
                                <a href='./files/<?= $files[$i] ?>' download>Download</a>
                            </span>
                            <span class="delete" data-delete="<?= './files/'.$files[$i] ?>">Delete</span>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>

    <script>
        let delButtons = document.querySelectorAll(".delete");

        delButtons.forEach(button => {
            button.addEventListener("click", (e) => {
                delForm = document.createElement("form");
                let hiddenInput = document.createElement("input");
                hiddenInput.setAttribute("type", "hidden");
                hiddenInput.setAttribute("name", "delete_file");
                hiddenInput.setAttribute("value", e.target.dataset.delete);
                console.log(e.target.dataset.delete);
            
                delForm.appendChild(hiddenInput);
                delForm.method = "POST";
                delForm.action = "entry.php";
                delForm.style.display="none";
                document.body.appendChild(delForm);

                delForm.submit();
            })
        })

    </script>
</body>
</html>