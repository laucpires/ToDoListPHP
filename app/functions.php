<?php

// INICIA A SESSÃO
if ($_POST) {
    $arr = [];
    if (isset($_SESSION['taskList'])) {
        $arr = $_SESSION['taskList'];
    }
    $arrInputs = ['name' => $_POST['inputText'], 'date' => date('d/m/Y', strtotime($_POST['inputDate']))];
    array_push($arr, $arrInputs);
    $_SESSION['taskList'] = $arr;
}

// CRIA A LISTA DE TAREFAS
function createTaskList()
{
    $displayedTasks = [];
    foreach ($_SESSION['taskList'] as $task) {
        $displayDate = ($task['date'] === '') ? null : $task['date'];
        $taskIdentifier = $task['name'] . '-' . $displayDate;
        if (!array_key_exists($taskIdentifier, $displayedTasks)) {
            echo "<li><input style='border: 0; font-size: 16px; color: #333; padding: 0;' value='" . $task['name'] . " - " . $displayDate . "'></li>";
            $displayedTasks[$taskIdentifier] = true; // EVITA REPETIÇÃO DE ELEMENTO IGUAL
        }
    }
}

// CRIA O FRAME COM A LISTA DE TAREFAS
function createFrame()
{
    if (isset($_SESSION['taskList'])) {
        echo "<div id='frame'>
            <h3>Lista de Tarefas</h3>
            <ul class='task-list' style='padding: 0 2rem'>";
        createTaskList();
        echo "</ul>
        <div class='btn-frame'>
                <form method='post' action=''>
                    <button id='download-list' type='submit' name='download'>Download</button>";
                    include "../includes/downloadList.php";
                echo "</form>
            </div>
        </div>";
    }
}

createFrame();
