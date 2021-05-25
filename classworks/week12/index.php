<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <title>POST</title>
</head>
<body>
    <div>
        <input type="text" id="user">
        <button onclick="send()">Submit</button>
    </div>    

    <script>
        function send() {
            let user = document.getElementById("user").value;

            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    user: user,
                },
                success: function(response) {
                    console.log(response);
                }
            });

        }

    </script>
</body>
</html>