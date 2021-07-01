<?php 
    include_once('classes/DB.php');
    include_once('classes/Controller.php');

    if(isset($_POST['create_entity'])) {
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        DB::query('INSERT INTO entities VALUES (NULL, :name, :birthday)', array(':name'=>$name, ':birthday'=>$birthday));
        
        Controller::redirect('show', false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="action" value="insert">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        <label for="birthday">Birthday</label>
        <input type="date" id="birthday" name="birthday" min="1901-01-01" max="2021-06-30" required>
        <input type="submit" name="create_entity" value="Create">
    </form>
</body>
</html>