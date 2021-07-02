<?php 
    include_once('classes/DB.php');

    $id = $_GET['id'];
    $query_string = 'SELECT * FROM entities WHERE id =' . $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- VueJs -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <!-- VueJs -->
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Google Fonts -->
    <title>Show</title>
</head>
<style>
    <?php  include('views/css/style.css'); ?>
</style>
<body>
    <header>
        <nav>
            <li><a href="create">Back</a></li>
        </nav>
    </header>
    <main id="app">
        <div class="container">
            <div class="container__helper">
                <p>Nome: {{name}}</p>
                <p>Anni: {{birth}}</p>
                <p v-if="nextBdD == 0">Non ti ricordi che giorno è oggi?</p>
                <p v-else>Giorni al prossimo compleanno: {{nextBdD}}</p>
            </div>
        </div>
    </main>
    <?php  include('views/script/show_script.php'); ?>
</body>
</html>