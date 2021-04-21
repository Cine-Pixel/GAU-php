<div class="forms-wrapper" style="display: <?= $show_or_not ? "block" : "none" ?>;">
    <div class="forms-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <h2>Choose file to upload</h2>
            </div>

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

        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <h2>Edit file</h2>
            </div>

            <div class="form-row errors">
                <small><?= $size_error ?></small>
                <small><?= $type_error ?></small>
            </div>

            <div class="form-row">
                <textarea name="new_content"><?= $edit_file_content ?></textarea>
            </div>

            <div class="form-row">
                <input type="submit" value="Edit" name="edit_file">
            </div>

            <input type="hidden" name="file" value="<?= $edit_file_path ?>">
        </form>
    </div>
</div>