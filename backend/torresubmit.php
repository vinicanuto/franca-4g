<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "db.inc.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $site_id = $_POST['site_id'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $altura = $_POST['altura'];

    // checking empty fields
    if (empty($site_id) || empty($longitude) || empty($latitude) || empty($altura)) {
        if (empty($site_id)) {
            echo "<font color='red'>Site ID esta vazio.</font><br/>";
        }

        if (empty($longitude)) {
            echo "<font color='red'>Longitude está vazio.</font><br/>";
        }

        if (empty($latitude)) {
            echo "<font color='red'>Latitude está vazio.</font><br/>";
        }
        if (empty($altura)) {
            echo "<font color='red'>Altura está vazio.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE torre SET site_id='$site_id' , longitude='$longitude' , latitude='$latitude', altura='$altura' WHERE id_torre=$id";
        $result = $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            echo "torre alterada com sucesso";
            header("location:../admin/torre.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {

    if (!isset($_REQUEST['siteid']) && !isset($_REQUEST['longitude']) && !isset($_REQUEST['latitude']) && !isset($_REQUEST['altura']))
        die("Wrong request!");

    $siteid = $_REQUEST['siteid'];
    $longitude = $_REQUEST['longitude'];
    $latitude = $_REQUEST['latitude'];
    $altura = $_REQUEST['altura'];

    $sql = "INSERT INTO torre (site_id, longitude, latitude, altura) VALUES ('$siteid', '$longitude', '$latitude', '$altura')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:../admin/torre.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
