<?php

    if(isset($_POST['user'])) {
        $user = $_POST['user'];
        $response = json_encode(value: ["user" => $user, "status" => "Success"]);
        header(header: 'Content-Type: Application/json');
        echo $response;
    }