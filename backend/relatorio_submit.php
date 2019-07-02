<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "db.inc.php";

if (isset($_REQUEST['export'])) {

    $sql = "select * from relatorio ";
    $result = $conn->query($sql);
    if (!$result)
        die('Couldn\'t fetch records');

    $fp = fopen('php://output', 'w');
    if ($fp && $result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');
        while ($row = $result->fetch_assoc()) {
            fputcsv($fp, array_values($row));
        }
        die;
    }
}

if (isset($_REQUEST['cleanlogs'])) {
    session_start();
    if ($_SESSION["role"] == 1) {
        $sql = "delete from relatorio";
        $result = $conn->query($sql);
    } else {
        echo "Sem permissao de delete";
    }
    header("location:../admin/relatorio.php");
}
?>