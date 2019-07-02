<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "db.inc.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $sector = $_REQUEST['sector'];
    $azimuth = $_REQUEST['azimuth'];
    $tilt = $_REQUEST['tilt'];
    $hori_bw = $_REQUEST['hori_bw'];
    $vert_bw = $_REQUEST['vert_bw'];
    $fk_Torre = $_REQUEST['torre'];


    // checking empty fields
    if (empty($sector) || empty($azimuth) || empty($tilt) || empty($hori_bw) || empty($vert_bw) || empty($fk_Torre)) {
        if (empty($sector)) {
            echo "<font color='red'>Setor esta vazio.</font><br/>";
        }

        if (empty($azimuth)) {
            echo "<font color='red'>Azimute está vazio.</font><br/>";
        }

        if (empty($tilt)) {
            echo "<font color='red'>Tilt está vazio.</font><br/>";
        }
        if (empty($hori_bw)) {
            echo "<font color='red'>hori_bw está vazio.</font><br/>";
        }
        if (empty($vert_bw)) {
            echo "<font color='red'>vert_bw está vazio.</font><br/>";
        }
        if (empty($fk_Torre)) {
            echo "<font color='red'>Torre está vazio.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE antena SET sector='$sector' , azimuth='$azimuth' , tilt='$tilt', hori_bw='$hori_bw', vert_bw='$vert_bw', fk_Torre='$fk_Torre'  WHERE id_antena=$id";
        $result = $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            echo "antena alterada com sucesso";
            header("location:../admin/antena.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {
    
    if (!isset($_REQUEST['sector']) && !isset($_REQUEST['azimuth']) && !isset($_REQUEST['tilt']) && !isset($_REQUEST['hori_bw'])&& !isset($_REQUEST['vert_bw'])&& !isset($_REQUEST['torre']))
        die("Wrong request!");

    $sector = $_REQUEST['sector'];
    $azimuth = $_REQUEST['azimuth'];
    $tilt = $_REQUEST['tilt'];
    $hori_bw = $_REQUEST['hori_bw'];
    $vert_bw = $_REQUEST['vert_bw'];
    $fk_Torre = $_REQUEST['torre'];

    $sql = "INSERT INTO antena (sector, azimuth, tilt, hori_bw, vert_bw, fk_Torre) VALUES ('$sector', '$azimuth', '$tilt', '$hori_bw','$vert_bw','$fk_Torre')";

    if ($conn->query($sql) === TRUE) {
        echo "Antena Criada com sucesso";
        header("location:../admin/antena.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
