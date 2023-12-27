<!DOCTYPE html>
<html>

<head>
    <?php
    include "../includes/links.php"; 
    ?>
    <link rel="shortcut icon" href="../public/assets/img/lista-de-controle.png" type="image/x-icon">
    <title>To Do PHP</title>
</head>

<body>
    <div class="container-header">
        <header>
            <h1>To Do List</h1>
        </header>
        <?php include "../app/AddTask.php"; ?>
    </div>
</body>

</html>
