<form id="form-add" method="post" action="">
    <strong>
        <p>Adicione a sua tarefa:</p>
    </strong>
    <div class="form-control">
        <input type="text" id="form-input-text" placeholder="Escreva a descrição da tarefa aqui..." name="inputText" maxlength="250">
        <input type="date" id="form-input-date" max="9999-12-31" title="Data de Conclusão" name="inputDate">
        <button type="submit" id="save-task">
            <i class="fa-solid fa-check"></i>
        </button>
    </div>
</form>

<?php include "../includes/functions.php"; ?>
