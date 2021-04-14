<?php 
    foreach($dirContent as $item) {
        foreach($item as $label => $value) {
            if($label === "folder") {
                $paths = explode("/", $value);
                $folder = end($paths); ?>
                <div class="file">
                    <ul>
                        <li>Folder</li>
                        <li><a href="task2.php?folder=<?= $value ?>"> <?= $folder ?> </a></li>
                        <li>20.04.2021</li>
                        <li><span class="delete" data-path="<?= $value ?>">Delete</span></li>
                    </ul>
                </div> <?php
            }
            else {
                $paths = explode("/", $value);
                $file = end($paths); ?>
                <div class="file">
                    <ul>
                        <li>File</li>
                        <li><a href="task2.php?file=<?= $value ?>"> <?= $file ?> </a></li>
                        <li>20.04.2021</li>
                        <li>
                            <span class="edit"><a href="task2.php?file=<?= $value ?>">Edit</a></span>
                            <span class="delete" data-path="<?= $value ?>">Delete</span>
                        </li>
                    </ul>
                </div> <?php
            };
        }
    }
?>