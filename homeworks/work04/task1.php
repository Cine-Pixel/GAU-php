<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form,
        .file-output {
            width: 400px;
            margin: 0 auto;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #333;
        }
    </style>
    <title>Write in file</title>
</head>
<body>

    <?php 
        if(!is_dir("files")) {
            mkdir("files");
        }
        if(isset($_POST['write_file'])) {
            $filename = $_POST['filename'];
            $text = $_POST['text'];

            if(empty($filename)) $filename = "file.txt";
            else $filename = "".$filename.".txt";

            $current_files = scandir("./files");
            if(in_array($filename, $current_files))
                $filename = date("Ymdhis").$filename;

            $f = fopen("files/".$filename, "w");
            fwrite($f, $text);
        }
    ?>

    <div class="file-output">
        <h1>Files</h1>
        <ul>
            <?php 
                $files = scandir("./files");
                for($fi = 2; $fi < count($files); $fi++) {
                ?>
                    <li><a href="<?= './files/'.$files[$fi] ?>" download> <?= $files[$fi] ?> </a></li>
                <?php
                }
            ?>
        </ul>
    </div>

    <form method="post">
        <input type="text" name="filename"> - File Name
        <br>
        <textarea name="text" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Write file" name="write_file">
    </form>
</body>
</html>