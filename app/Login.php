<?php

session_start();

if (isset($_POST["user"], $_POST["password"])) {
    if ($_POST["user"] == "root" && $_POST["password"] == "root") {
        $_SESSION["user"] = $_POST["user"];
        header("Location: ../app/AddTask.php");
    }
}

?>

<form id="form-login" action="" method="post">
    <strong>
        <p>Faça o seu login:</p>
    </strong>
    <div class="form-control">
        <input class="input-login" type="text" name="user" placeholder="Usuário">
        <input class="input-login" type="password" name="password" placeholder="Senha">
        <button id="btn-login" type="submit" name="login">Login</button>
    </div>
</form>
