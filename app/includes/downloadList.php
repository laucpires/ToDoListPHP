<?php

function downloadListToCsv($delimiter)
{
    $headers = ["Nome", "Data"];

    $f = fopen("Tarefas.csv", 'w');

    fputcsv($f, $headers, $delimiter);

    $displayedTasks = [];
    foreach ($_SESSION["taskList"] as $task) {
        $displayDate = ($task['date'] !== null && $task['date'] !== '') ? $task['date'] : '';
        $taskIdentifier = $task['name'] . '-' . $displayDate;
        if (!array_key_exists($taskIdentifier, $displayedTasks)) {
            fputcsv($f, explode('-', $taskIdentifier), $delimiter);
            $displayedTasks[$taskIdentifier] = true;
        }
    }

    fclose($f);
}

if (isset($_POST["download"])) {
    downloadListToCsv(',');
}
