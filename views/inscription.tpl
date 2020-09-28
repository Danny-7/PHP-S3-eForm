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
    <div class="form-container">
        <form action="../controllers/inscription.php" method="POST">
            <h1>Inscription</h1>
            <div class="form-control">
                <label>Last name</label>
                <input class="" type="text" name="lastName" value="<?php echo $user['lastName'] ?>">
                <div class="error"><?php echo $errors['lastName'] ?></div>
            </div>
            <div class="form-control">
                <label>First name</label>
                <input class="" type="text" name="firstName" value="<?php echo $user['firstName'] ?>">
                <div class="error"><?php echo $errors['firstName'] ?></div>
            </div>
            <div class="form-control">
                <label>Number</label>
                <input class="" type="text" name="number" value="<?php echo $user['number'] ?>">
                <div class="error"><?php echo $errors['number'] ?></div>
            </div>
            <div class="form-control">
                <label>Email</label>
                <input class="" type="text" name="email" value="<?php echo $user['email'] ?>">
                <div class="error"><?php echo $errors['email'] ?></div>
            </div>
            <button type="submit" class="form-btn rounded">Send</button>
        </form>
    </div>

</body>

</html>