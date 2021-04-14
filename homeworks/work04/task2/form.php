<?php 
    $file_name = [""];
    if(!empty($clickedFile)) {
        $paths = explode("/", $clickedFile);
        $file_name = explode(".", end($paths));
    }
?>

<div class="overlay">
    <form method="POST">
        <h2>Create File or Folder</h2>
        <div class="form-row">
            <label for="file_or_folder">
                <span>Choose</span><br>
                <span>File</span>
                <input type="radio" name="file_or_folder" value="file" checked="<?= $is_file_clicked ?>">
                <span>or Folder</span>
                <input type="radio" name="file_or_folder" value="folder">
            </label>
        </div>
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
            <input type="submit" value="Create" name="write_file_or_folder">
        </div>
    </form>
</div>
