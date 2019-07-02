<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "db.inc.php";

if (!isset($_REQUEST['email']) && !isset($_REQUEST['password']))
    die("Wrong request!");

$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];

if (!isset($email) && !isset($password))
    die("Wrong request!");

$sql = "select * from usuario where login='$email' and senha='$senha';";

$result = $conn->query($sql);

if ($result->num_rows != 1) {
    header("location:../admin/login.php?error=1");
} else {
    $data = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['email'] = $data['login'];
    $_SESSION['role'] = $data['fl_admin'];
    $_SESSION['nome'] =$data['nome'];
    header("location:../admin/index.php");
}


