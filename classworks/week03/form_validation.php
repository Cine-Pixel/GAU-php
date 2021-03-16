<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            width: 700px;
            padding: 15px;
            margin: 0 auto;
            border: 1px solid #333;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 700px;
            margin: 20px auto;
            border: 1px solid #333;
            border-collapse: collapse;
            text-align: center;
        }
        tr, th, td {
            border: 1px solid #333;
            padding: 5px;
        }
    </style>
    <title>Form validation</title>
</head>
<body>

    <?php 
        $general_error=false;
        $errors = array(
            "name"=>"",
            "email"=>"",
            "website"=>"",
            "comment"=>"",
            "gender"=>""
        );
        $name = ""; $email=""; $website=""; $comment=""; $gender="";

        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            if(empty($name)){ 
                $errors['name'] = "Can't be empty";
                $general_error=true;
            }
        }
        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            if(empty($email)) {
                $errors['email'] = "Can't be empty";
                $general_error=true;
            }
        }
        if(isset($_POST['website'])) {
            $website = $_POST['website'];
            if(empty($website)){
                $errors['website'] = "Can't be empty";
                $general_error=true;
            }
        }
        if(isset($_POST['gender'])) {
            $gender = $_POST['gender'];
            if(empty($gender)){
                $errors['gender'] = "Can't be empty";
                $general_error=true;
            }
        }
        if(isset($_POST['comment']))
            $comment = $_POST['comment'];

    ?>
    <form method="POST">
        <h1>PHP Form Validation Exmaple</h1>
        <p>* required field</p>
        Name: <input type="text" name="name" value=<?= $name?> > 
        <label><?= $errors['name'] ?></label> 
        <br><br>
        Email: <input type="text" name="email" value=<?= $email?> > 
        <label><?= $errors['email'] ?></label> 
        <br><br>
        Website: <input type="text" name="website" value=<?= $website?> > 
        <label><?= $errors['website'] ?></label> 
        <br><br>
        Comment: <textarea name="comment" > <?= $comment ?></textarea> 
        <label><?= $errors['comment'] ?></label> 
        <br><br>
        Gender: <input type="radio" value="Female" name="gender"> Female 
        <input type="radio" value="Male" name="gender"> Male 
        <input type="radio" value="other" name="gender"> Other 
        <label><?= $errors['gender'] ?></label> 
        <br><br>
        <button name="send_user">Submit</button>
    </form>

    <?php 
        if(isset($_POST['send_user']) && !$general_error) {

    ?>
            <table>
                <thead><h2>Output</h2></thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Comment</th>
                    <th>Gender</th>
                </tr>

                <tr>
                    <td><?= $name ?></td>
                    <td><?= $email?></td>
                    <td><?= $website ?></td>
                    <td><?= $comment ?></td>
                    <td><?= $gender ?></td>
                </tr>
            </table>

    <?php
        }
    ?>

</body>
</html>