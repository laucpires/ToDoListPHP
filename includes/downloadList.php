<?php

session_start();

function downloadListToCsv($delimiter)
{
    $headers = ["Nome", "Data"];

    $filePath = $_SERVER["DOCUMENT_ROOT"] . "/Tarefas.csv";

    $f = fopen($filePath, 'w');

    fputcsv($f, $headers, $delimiter);

    $displayedTasks = [];
    foreach ($_SESSION["taskList"] as $task) {
        $taskIdentifier = $task['name'] . '-' . $task['date'];
        if (!array_key_exists($taskIdentifier, $displayedTasks)) {
            fputcsv($f, explode('-', $taskIdentifier), $delimiter);
            $displayedTasks[$taskIdentifier] = true;
        }
    }

    fclose($f);
}

if (isset($_POST["download"])) {
    downloadListToCsv(',');
    header('Location: ../app/AddTask.php');
}
