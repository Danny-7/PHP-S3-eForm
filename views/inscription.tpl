<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="../controllers/inscription.php" method="POST">
        <h1>Inscription</h1>
        <div class="input-form">
            <label>Last name</label>
            <input type="text" name="lastName" required>
        </div>
        <div class="input-form">
            <label>First name</label>
            <input type="text" name="firstName" required>
        </div>
        <div class="input-form">
            <label>Number</label>
            <input type="text" name="number" required>
        </div>
        <div class="input-form">
            <label>Email</label>
            <input type="text" name="email" required>
        </div>
    </form>
</body>
</html>