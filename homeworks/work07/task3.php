<?php require_once("db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Menu</title>
</head>
<body>
    <?php include_once("./components/header.php") ?>

    <?php 
        $error = "";
        if(isset($_POST['create_menu'])) {
            $title = $_POST['title'];
            $meta_k= $_POST['meta_k'];
            $meta_d= $_POST['meta_d'];
            $text = $_POST['text'];

            $create_menu_query = "INSERT INTO menu(Title, Meta_k, Meta_d, Text) 
                                  VALUES('$title', '$meta_k', '$meta_d', '$text')";

            if(!empty($title)) {
                if(mysqli_query($conn, $create_menu_query)) 
                    header("Location: task3.php");
                else $error = "Can't create this record";

            } else $error = "Please fill required fields";

        }
    ?>

    <form method="POST">
          <h2>Create new menu</h2>

          <div class="form-row errors">
              <small><?= $error ?></small>
          </div>

          <div class="form-row">
              <label>
                  <span>Title *</span><br>
                  <input type="text" name="title">
              </label>
          </div>

          <div class="form-row">
              <label>
                  <span>Meta keywords</span><br>
                  <input type="text" name="meta_k">
              </label>
          </div>

          <div class="form-row">
              <label>
                  <span>Meta description</span><br>
                  <input type="text" name="meta_d">
              </label>
          </div>

          <div class="form-row">
              <label>
                  <span>Text</span><br>
                  <input type="text" name="text">
              </label>
          </div>

          <div class="form-row">
              <input type="submit" value="Upload" name="create_menu">
          </div>
      </form>

</body>
</html>