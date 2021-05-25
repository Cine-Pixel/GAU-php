<?php 
    $message = "";
    if(isset($_POST['insert'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $date = $_POST['date'];

        $insert_query = "INSERT INTO categories(title, author, created_at) VALUES ('$title', '$author', '$date')";
        if(mysqli_query($conn, $insert_query))
            header("Location: actions.php");
        else 
            $message = "Error";
    }
?>

<div>
    <h1>Insert</h1>
    <p><?= $message ?></p>
    <form method="POST">
        <input type="text" name="title">
        <br><br>
        <input type="text" name="author">
        <br><br>
        <input type="date" name="date">
        <br><br>
        <input type="submit" value="Insert" name="insert">
    </form>
</div>
