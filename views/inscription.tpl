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
                <input class="rounded" type="text" name="lastName" required>
            </div>
            <div class="form-control">
                <label>First name</label>
                <input class="rounded" type="text" name="firstName">
            </div>
            <div class="form-control">
                <label>Number</label>
                <input class="rounded" type="text" name="number" required>
            </div>
            <div class="form-control">
                <label>Email</label>
                <input class="rounded" type="text" name="email" required>
            </div>
            <button type="submit" class="form-btn rounded">Send</button>
        </form>
    </div>

</body>

</html>