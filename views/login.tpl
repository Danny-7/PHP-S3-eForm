<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="form-container">
        <form action="../controllers/login.php" method="post">
            <h1>Login</h1>
            <div class="form-control">
                <input type="text" name="email" placeholder="Email" value="<?php echo $user['email'] ?? "" ?>">
                <div class="error"><?php echo $errors['email'] ?? "" ?></div>
            </div>
            <div class="form-control">
                <input type="text" name="number" placeholder="Number" value="<?php echo $user['number'] ?? "" ?>">
                <div class="error"><?php echo $errors['number'] ?? "" ?></div>
            </div>
            <button type="submit">Login</button>
            <div class="error"><?php echo $errors['user'] ?? "" ?></div>
        </form>
    </div>
</div>


</body>
</html>