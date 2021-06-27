<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="." method="POST">
        <input type="hidden" name="action" value="insert">
        <label for="name">Name</label>
        <input type="text" id="newcity" name="city" required>
        <label for="birthday">Birthday</label>
        <input type="date" id="birthday" name="birthday" min="1901-01-01" max="2021-06-30" required>
        <button>Aggiungi</button>
    </form>
</body>
</html>