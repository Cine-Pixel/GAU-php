<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Root folder</title>
</head>
<body>
    <div class="root">
        <h2>Root Folder</h2>
        <?php 
            $files = scandir("./root");
            for($i=2; $i<count($files); $i++) {
                echo "<p><a href='root.php?file=$i'> $files[$i] </a></p>";
            }
        ?>
    </div>

    <div class="file-content">
        <?php 
            if(isset($_GET['file'])) {
                $file = "root/".$files[$_GET['file']];
                $f = fopen($file, "r");
                $file_content = fread($f, filesize($file));
                fclose($f);
                $posts = explode("===", $file_content);
                for($i=0; $i<count($posts); $i++) {
                    $post = explode("--", $posts[$i]);
                    echo "<div>";
                    echo "<h1>$post[0]</h1>";
                    echo "<p>$post[1]</p>";
                    echo "<small>$post[2]</small>";
                    echo "<small>$post[3]</small>";
                    echo "</div>";
                }
            }
        ?>
    </div>
</body>
</html>