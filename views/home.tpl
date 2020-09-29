<?php
        $user = $_SESSION['user'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
</head>

<body>
<div>
    <header>
        <div class="nav__title">
            PHP 2020 EXERCISE - DANIEL AGUIAR 204
        </div>
    </header>
    <section class="content">
        <h1>Welcome <?php echo "{$user['prenom']} {$user['nom']} !" ?></h1>
    </section>

</div>
</body>
</html>