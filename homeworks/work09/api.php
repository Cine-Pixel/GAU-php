<?php

include_once("./db.php");

if(isset($_GET["action"])) {
    if($_GET['action'] === "get-all-products") {
        $query = "SELECT * FROM products";
        $products = mysqli_query($conn, $query);

        $results = [];

        while($row = mysqli_fetch_assoc($products)) {
            array_push($results, $row);
        }

        $response = array(
            "success" => true,
            "status" => 200,
            "results" => $results 
        );
        header(header: "Content-Type: Application/json", response_code: 200);
        print_r(json_encode($response));
        die;
    }

    if($_GET['action'] === "get-product") {
        $id=$_GET['id'];
        $query = "SELECT * FROM products WHERE product_id=$id";
        $products = mysqli_query($conn, $query);

        $results = [];

        while($row = mysqli_fetch_assoc($products)) {
            array_push($results, $row);
        }

        $response = array(
            "success" => true,
            "status" => 200,
            "results" => $results 
        );
        header(header: "Content-Type: Application/json", response_code: 200);
        print_r(json_encode($response));
        die;
    }
}

if(isset($_POST['request'])) {
    if($_POST['request'] === "create_product") {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $query = "INSERT INTO products (product_name, description, image_url, price) VALUES('$name', '$desc', '$image', '$price')";
        mysqli_query($conn, $query);

        $response = array(
            "success" => true,
            "status" => 200,
            "results" => [] 
        );

        header(header: "Content-Type: Application/json", response_code: 200);
        print_r(json_encode($response));
        die;
    }

    if($_POST['request'] === "delete_product") {
        $prodId = $_POST['productId'];
        $query = "DELETE FROM products WHERE product_id=$prodId";
        mysqli_query($conn, $query);
        $response = array(
            "success" => true,
            "status" => 200,
            "results" => [] 
        );

        header(header: "Content-Type: Application/json", response_code: 200);
        print_r(json_encode($response));
        die;
    }

    if($_POST['request'] === "update_product") {
        $prodId = $_POST['productId']+0;
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $image = $_POST['image'];
        $price = $_POST['price']+0;

        $query = "UPDATE products SET product_name='$name', description='$desc', image_url='$image', price='$price' WHERE product_id=$prodId";
        mysqli_query($conn, $query);
        $response = array(
            "success" => true,
            "status" => 200,
            "results" => [$prodId, $name, $desc, $image, $price] 
        );

        header(header: "Content-Type: Application/json", response_code: 200);
        print_r(json_encode($response));
        die;
    }
}