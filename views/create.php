<?php 
    include_once('classes/DB.php');
    include_once('classes/Controller.php');

    if(isset($_POST['create_entity'])) {
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        DB::query('INSERT INTO entities VALUES (NULL, :name, :birthday)', array(':name'=>$name, ':birthday'=>$birthday));
        
        $last_inserted = DB::query('SELECT MAX(id) as max_id FROM entities');

        $url_query = 'show?id='. $last_inserted[0]['max_id'];
        Controller::redirect($url_query, false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<style>
    <?php  include('views/css/style.css'); ?>
</style>
<body>
    <header>
        <nav>
            <li><a href="show">Home</a></li>
        </nav>
    </header>
    <main>
        <div class="container">
            <!-- form -->
            <div class="form">
                <form action="" method="POST">
                    <!-- insert name -->
                    <div>
                        <label for="name">Name</label>
                        <input class="input" type="text" id="name" name="name" required>
                    </div>
                    <!-- /insert name -->
                    <!-- insert birthday -->
                    <div>
                        <label for="birthday">Birthday</label>
                        <input class="input" type="date" id="birthday" name="birthday" min="1901-01-01" max="2021-06-30" required>
                    </div>
                    <!-- /insert birthday -->
                    <!-- create entity -->
                    <div class="submit">
                        <input class="btn" type="submit" name="create_entity" value="Create">
                    </div>
                    <!-- /create entity -->
                </form>
            </div>
            <!-- /form -->
        </div>
    </main>
</body>
</html>