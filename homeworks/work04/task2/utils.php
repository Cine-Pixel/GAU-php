<?php
    function xrmdir($dir) {
        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            $path = $dir.'/'.$item;
            if (is_dir($path)) {
                xrmdir($path);
            } else {
                unlink($path);
            }
        }
        rmdir($dir);
    }

    function detect_creation($clickedFile) {
        if(isset($_POST['write_file_or_folder'])) {
            echo "<script>show=false;</script>";
            if($_POST['file_or_folder'] === "file") {
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
            } else mkdir($_SESSION['folder']."/".$_POST['file_name']);
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
?>