<div class="uforms-wrapper">
    <div class="forms-container">
        <form method="POST" id="update-form">
            <h1 style="text-align: center;">Create new product</h1>

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Name</span><br>
                    <input type="text" id="uname">
                </label>
            </div>

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Description</span><br>
                    <textarea id="udesc"></textarea>
                </label>
            </div>
            <div class="form-row">
                <label for="file_or_folder">
                    <span>Image URL</span><br>
                    <input type="text" id="uimage">
                </label>
            </div>

            <div class="form-row">
                <label for="file_or_folder">
                    <span>Price $</span><br>
                    <input type="number" id="uprice">
                </label>
            </div>

            <div class="form-row">
                <input id="update" type="submit" value="Update"> 
            </div>
        </form>
    </div>
</div>