<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://ka-f.fontawesome.com" />
    <script src="https://kit.fontawesome.com/7f01f336dd.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    <title>OfStore</title>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">OfStore</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <main>
        <div class="main-actions">
            <button id="toggle-create" class="create-btn"><i class="fas fa-plus"></i> Create</button>        
        </div>
        <div class="product-wrapper"></div>
    </main>

    <?php include("_form.php") ?>
    <?php include("_updateForm.php") ?>
    <script src="app.js"></script>
</body>

</html>