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
        if(isset($_GET['folder'])) {
            // $dirContent = readDirs($_GET['folder']);
            $_SESSION['folder'] = $_GET['folder'];
            // $dirContent = readDirs($_SESSION['folder']);
        }
        if(!isset($_SESSION['folder']))
            $_SESSION['folder'] = $main;

        if(!str_contains($_SESSION['folder'], "./files")) {
            $_SESSION['folder'] = $main;
        }
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
                if(!is_dir($main)) mkdir($main);
                $clickedFile = "";

                if(isset($_GET['file'])) {
                    $clickedFile = $_GET['file'];
                    echo "<script>let show=true;</script>";
                } else echo "<script>let show=false;</script>";

                if(isset($_POST['write_file'])) {
                    echo "<script>show=false;</script>";
                    if($clickedFile) {
                        $file = fopen($clickedFile, "w");
                        fwrite($file, $_POST['file_content']);
                        fclose($file);
                    } else {
                        $file_path = $_SESSION['folder']."/".$_POST['file_name'].".txt";
                        $file = fopen($file_path, "w");
                        fwrite($file, $_POST['file_content']);
                        fclose($file);
                    }
                }

                function readDirs($path){
                    $dirContent = array();
                    $dirHandle = opendir($path);

                    while($item = readdir($dirHandle)) {
                        $newPath = $path."/".$item;

                        if(is_dir($newPath) && $item != '.' && $item != '..') {
                            array_push($dirContent, array("folder"=>$newPath));
                        } else if($item != '.' && $item != '..'){
                            array_push($dirContent, array("file"=>$newPath));
                        }
                    }
                    closedir($dirHandle);
                    return $dirContent;
                }

                $dirContent = readDirs($_SESSION['folder']);

                foreach($dirContent as $item) {
                    foreach($item as $label => $value) {
                        if($label === "folder") {
                            $paths = explode("/", $value);
                            $folder = end($paths);
                        ?>
                            <div class="file">
                                <ul>
                                    <li>Folder</li>
                                    <li><a href="task2.php?folder=<?= $value ?>"> <?= $folder ?> </a></li>
                                    <li>20.04.2021</li>
                                    <li><span class="delete">Delete</span></li>
                                </ul>
                            </div> 
                        <?php
                        }
                        else {
                            $paths = explode("/", $value);
                            $file = end($paths);
                        ?>
                            <div class="file">
                                <ul>
                                    <li>File</li>
                                    <li><a href="task2.php?file=<?= $value ?>"> <?= $file ?> </a></li>
                                    <li>20.04.2021</li>
                                    <li><span class="edit"><a href="task2.php?file=<?= $value ?>">Edit</a></span><span class="delete">Delete</span></li>
                                </ul>
                            </div> 
                        <?php
                        };
                    }
                }
            ?>
        </div>
    </div>

    <?php
        include_once("./form.php");

        echo $_SESSION['folder'];
    ?>

    <script>
        const form = document.querySelector("form");
        const overlay = document.querySelector(".overlay");
        const create = document.querySelector(".create");
        const edit = document.querySelector(".edit");

        if(show) {
            overlay.style.display = "flex";
        }

        edit.addEventListener("click", (e) => {
            overlay.style.display = "flex";
        });

        create.addEventListener("click", () => {
            overlay.style.display = "flex";
        });

        document.addEventListener("click", (e) => {
            let clicked = e.target;

            if(clicked === create || clicked === edit) return;
            if(clicked === overlay) window.location = window.location.href.split("?")[0];

            do {
                if(clicked === form) return;
                clicked = clicked.parentNode;
            } while(clicked);

            overlay.style.display = "none";
        });
    </script>
</body>
</html>