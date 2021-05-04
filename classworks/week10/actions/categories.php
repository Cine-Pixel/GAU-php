<div>
    <?php 
        $select_query = "SELECT * FROM categories";
        $categories = mysqli_query($conn, $select_query);
        while($row = mysqli_fetch_assoc($categories)) {
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }
    ?>
</div>