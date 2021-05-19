<?php require_once("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Users</title>
</head>
<body>
    <?php include_once("./components/header.php"); ?>

    <?php 
        $error = "";
        if(isset($_POST['create_user'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $date= $_POST['date'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];

            $create_user_query = "INSERT INTO users(Name, LastName, Age, Date, Password, Gender) 
                                  VALUES('$firstname', '$lastname', '$age', '$date', '$password', '$gender')";

            if(!empty($firstname) && !empty($lastname) && !empty($password)) {
                // mysqli_query($conn, $create_user_query);
                if(mysqli_query($conn, $create_user_query)) 
                    header("Location: task5.php");
                else $error = "Can't create this record";

            } else $error = "Please fill required fields";

        }
    ?>

    <form method="POST">
          <h2>Create User</h2>

          <div class="form-col errors">
              <small><?= $error ?></small>
          </div>

          <div class="form-col rows-2">
              <label class="form-row-50">
                  <span>First name*</span><br>
                  <input type="text" name="firstname">
              </label>

              <label class="form-row-50">
                  <span>Last Name *</span><br>
                  <input type="text" name="lastname">
              </label>
          </div>

          <div class="form-col rows-2">
              <label class="form-row-50">
                  <span>Age</span><br>
                  <input type="number" name="age">
              </label>

              <label class="form-row-50">
                  <span>Date</span><br>
                  <input type="date" name="date">
              </label>
          </div>

          <div class="form-col">
          </div>

          <div class="form-col">
              <label>
                  <span>Password *</span><br>
                  <input type="password" name="password">
              </label>
          </div>

          <div class="form-col">
              <label>
                  <span>Gender</span><br>
                  <span>Female - </span> <input type="radio" name="gender" value="Female">
                  <span>Male - </span> <input type="radio" name="gender" value="Male">
              </label>
          </div>

          <div class="form-col">
              <input type="submit" value="Create" name="create_user">
          </div>
      </form>

</body>
</html>