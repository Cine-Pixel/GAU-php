<?php 
    $file_name = [""];
    if(!empty($clickedFile)) {
        $paths = explode("/", $clickedFile);
        $file_name = explode(".", end($paths));
    }

    // if(isset($_POST['write_file'])) {
    //     if($clickedFile) {
    //         $file = fopen($clickedFile, "w");
    //         fwrite($file, $_POST['file_content']);
    //         fclose($file);
    //     } else {
    //         $file_path = $_SESSION['folder']."/".$_POST['file_name'].".txt";
    //         $file = fopen($file_path, "w");
    //         fwrite($file, $_POST['file_content']);
    //         fclose($file);
    //     }
    // }
?>

<div class="overlay">
    <form method="POST">
        <h2>Create File</h2>
        <div class="form-row">
            <label for="file_name">File name</label>
            <!-- <input type="text" name="file_name" value="<?= $_SESSION['file'] ?>"> -->
            <input type="text" name="file_name" value="<?= $file_name[0] ?>">
        </div>

        <div class="form-row">
            <label for="file_content">File Content</label>
        <?php 
            if(file_exists($clickedFile)) {
                $file = fopen($clickedFile, "r");
                $fileContent = fread($file, filesize($clickedFile));
                fclose($file);
            ?>
                <textarea name="file_content" cols="30" rows="10"><?= $fileContent ?></textarea>
            <?php
            } else {
            ?>
                <textarea name="file_content" cols="30" rows="10"></textarea>
            <?php
            }
        ?>
        </div>
        <div class="form-row">
            <input type="submit" value="Create" name="write_file">
        </div>
    </form>
</div>
