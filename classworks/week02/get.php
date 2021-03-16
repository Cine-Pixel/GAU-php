<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        form{
            width: 400px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #333;
        }
        form input {
            margin: 5px;
        }
    </style>
</head>
<body>
    <form action="data.php" method="GET">
        <input type="text" name="fname"> - სახელი 
        <br>
        <input type="text" name="lname"> - გვარი 
        <br>
        <input type="text" name="position"> - დაკავებული თანამდებობა 
        <br>
        <input type="number" name="salary"> - ხელფასის რაოდენობა 
        <br>
        <input hidden type="number" name="penalty">  
        <br>
        <input hidden type="number" name="actualSalary">
        <br>
        <button>Send</button>
    </form>
    <br>
    <hr>
    <form action="data-post.php" method="POST">
        <input type="text" name="fname"> - სახელი 
        <br>
        <input type="text" name="lname"> - გვარი 
        <br>
        <input type="text" name="year"> - კურსი 
        <br>
        <input type="text" name="semester"> - სემესტრი 
        <br>
        <input type="text" name="subject"> - სასწავლო კურსი
        <br>
        <input type="text" name="grade"> - მიღებული ნიშანი
        <br>
        <input type="text" name="gradeCat"> - შეფასება 
        <br>
        <input type="text" name="lecturer"> - ლექტორი 
        <br>
        <input type="text" name="decan"> - დეკანი 
        <br>
        <button>Send</button>
    </form>
</body>
</html>