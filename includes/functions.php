<?php

// INICIA A SESSÃO
if ($_POST) {
    $arr = [];
    if (isset($_SESSION['taskList'])) {
        $arr = $_SESSION['taskList'];
    }
    $date = $_POST['inputDate'] == null ? '' : date('d/m/Y', strtotime($_POST['inputDate']));
    $arrInputs = ['name' => $_POST['inputText'], 'date' => $date];
    array_push($arr, $arrInputs);
    $_SESSION['taskList'] = $arr;
}

// CRIA A LISTA DE TAREFAS
function createTaskList()
{
    $displayedTasks = [];
    foreach ($_SESSION['taskList'] as $task) {
        $taskIdentifier = $task['name'] . ' - ' . $task['date'];
        if (!array_key_exists($taskIdentifier, $displayedTasks)) {
            echo "<li><input id='inputNameList' style='border: 0; font-size: 16px; color: #333; padding: 0;' value='" . $taskIdentifier . "'></li>";
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
                <div style='display: flex; justify-content: space-around'>
                <form id='btn-form' method='post' action='../includes/downloadList.php'>
                    <button id='download-list' type='submit' name='download'>Download</button>";
        echo "</form>
        <button><a href='../app/Logout.php'>Logout</a></button>
        </div>
        </div>
        </div>";
    }
}

createFrame();
