<div class="forms-wrapper">
    <div class="forms-container">
        <form method="POST" id="create-form">
            <h1 style="text-align: center;">Create new product</h1>
            <!-- <div class="form-row errors">
                <small><?= $size_error ?></small>
                <small><?= $type_error ?></small>
            </div> -->

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Name</span><br>
                    <input type="text" id="name">
                </label>
            </div>

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Description</span><br>
                    <textarea id="desc"></textarea>
                </label>
            </div>
            <div class="form-row">
                <label for="file_or_folder">
                    <span>Image URL</span><br>
                    <input type="text" id="image">
                </label>
            </div>

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Price $</span><br>
                    <input type="number" id="price">
                </label>
            </div>

            <div class="form-row">
                <input id="create-product" type="submit" value="Upload" name="upload_file">
            </div>
        </form>
    </div>
</div>