<?php require_once("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>data</title>
</head>
<body>
    <?php include_once("./components/header.php") ?>

    <?php 
        if(!is_dir("./drive")) mkdir("./drive");

        $error = "";
        $type_error = "";
        $size_error = "";

        if(isset($_POST['create_data'])) {
            $title = $_POST['title'];
            $date = $_POST['date'];
            $type = $_POST['type'];
            $text = $_POST['text'];
            $author = $_POST['author'];
            $description= $_POST['description'];
            $meta_k = $_POST['meta_k'];
            $meta_d = $_POST['meta_d'];

            $uploaded_file= $_FILES['photo'];
            $file_type = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);

            if($uploaded_file['size'] > 10*1024*1024) 
                $size_error = "File must be less than 10MB";
            if($file_type !== "png" && $file_type !== "jpg" && $file_type !== "jpeg" && $file_type !== "gif") 
                $type_error = "Only .png, .jpg and .gif files are allowed";

            if(empty($title) || empty($author) || empty($type)) { 
                $error = "Please fill required fields";
            }

            if(empty($error) && empty($size_error) && empty($type_error)) {
                $photo_url = "./drive/".date('Y-m-d-h-i-s').".".$file_type;
                move_uploaded_file($uploaded_file['tmp_name'], $photo_url);

                $create_data_query = "INSERT INTO data(Title, Date, Type, Photo, Text, Author, Description, Meta_k, Meta_d) 
                                  VALUES('$title', '$date', '$type', '$photo_url', '$text', '$author', '$description', '$meta_k', '$meta_d')";
                if(mysqli_query($conn, $create_data_query)) 
                    header("Location: task7.php");
                else $error = "Can't create this record";
            } 
        }
    ?>

    <form method="POST" enctype="multipart/form-data">
          <h2>Create User</h2>

          <div class="form-col errors">
              <small><?= $error ?></small><br>
              <small><?= $size_error ?></small><br>
              <small><?= $type_error ?></small>
          </div>

          <div class="form-col rows-2">
              <label class="form-row-50">
                  <span>Title *</span><br>
                  <input type="text" name="title">
              </label>

              <label class="form-row-50">
                  <span>Date</span><br>
                  <input type="date" name="date">
              </label>
          </div>

          <div class="form-col rows-2">
              <label class="form-row-50">
                  <span>Type *</span><br>
                  <input type="text" name="type">
              </label>

              <label class="form-row-50">
                  <span>Author *</span><br>
                  <input type="text" name="author">
              </label>
          </div>

          <div class="form-col">
              <label>
                  <span>Text</span><br>
                  <input type="text" name="text">
              </label>
          </div>

          <div class="form-col">
              <label>
                  <span>Photo *</span><br>
                  <input type="file" name="photo">
              </label>
          </div>

          <div class="form-col">
              <label>
                  <span>Description</span><br>
                  <textarea name="description" cols="30" rows="10"></textarea>
              </label>
          </div>

          <div class="form-col">
              <label>
                  <span>Meta Keywords</span><br>
                  <textarea name="meta_k" cols="30" rows="10"></textarea>
              </label>
          </div>

          <div class="form-col">
              <label>
                  <span>Meta Description</span><br>
                  <textarea name="meta_d" cols="30" rows="10"></textarea>
              </label>
          </div>

          <div class="form-col">
              <input type="submit" value="Create" name="create_data">
          </div>
      </form>

</body>
</html>