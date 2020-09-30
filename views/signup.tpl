<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
<div class="container">
    <div class="form-container">
        <form action="../controllers/signup.php" method="POST">
            <h1>Create an account</h1>
            <div class="form-control">
                <input class="" type="text" name="lastName" placeholder="Last name" value="<?php echo $user['lastName'] ?? "" ?>">
                <div class="error"><?php echo $errors['lastName'] ?? "" ?></div>
            </div>
            <div class="form-control">
                <input class="" type="text" name="firstName" placeholder="First name" value="<?php echo $user['firstName'] ?? "" ?>">
                <div class="error"><?php echo $errors['firstName'] ?? "" ?></div>
            </div>
            <div class="form-control">
                <input class="" type="text" name="number" placeholder="Number" value="<?php echo $user['number'] ?? "" ?>">
                <div class="error"><?php echo $errors['number'] ?? "" ?></div>
            </div>
            <div class="form-control">
                <input class="" type="text" name="email" placeholder="Email" value="<?php echo $user['email'] ?? "" ?>">
                <div class="error"><?php echo $errors['email'] ?? "" ?></div>
            </div>
            <button type="submit" class="form-btn">Send</button>
        </form>
    </div>
</div>


</body>

</html>