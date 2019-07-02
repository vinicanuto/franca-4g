<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "db.inc.php";

if (isset($_POST['adduser'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $type = $_POST['user_type'];

    // checking empty fields
    if (empty($nome) || empty($sobrenome) || empty($login) || empty($senha)) {
        if (empty($nome)) {
            echo "<font color='red'>Nome esta vazio.</font><br/>";
        }

        if (empty($sobrenome)) {
            echo "<font color='red'>Sobrenome está vazio.</font><br/>";
        }

        if (empty($login)) {
            echo "<font color='red'>Login está vazio.</font><br/>";
        }
        if (empty($senha)) {
            echo "<font color='red'>Senha está vazio.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "INSERT INTO usuario (nome, sobrenome, login,senha,fl_admin,status) VALUES ('$nome', '$sobrenome', '$login', '$senha','$type','A')";
        if ($conn->query($sql) === TRUE) {
            echo "usuario cadastrado com sucesso";
            header("location:../admin/users.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {
    if (!isset($_REQUEST['fullname']) && !isset($_REQUEST['email']) && !isset($_REQUEST['senha']))
        die("Wrong request!");

    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];


    $sql = "INSERT INTO usuario (nome, sobrenome, login,senha,fl_admin,status) VALUES ('$firstname', '$lastname', '$email', '$senha',0,'A')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        sleep(2);
        header("location:../admin/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
//#########################################

//
//$email = $_REQUEST['email'];
//$senha = $_REQUEST['senha'];
//
//if (!isset($email) && !isset($password))
//    die("Wrong request!");
//
//$sql = "select * from usuario where login='$email' and senha='$senha';";
//
//$result = $conn->query($sql);
//
//if ($result->num_rows != 1) {
//    header("location:../admin/login.php?error=1");
//} else {
//    $data = mysqli_fetch_assoc($result);
//    session_start();
//    $_SESSION['email'] = $data['login'];
//    $_SESSION['role'] = $data['fl_admin'];
//    header("location:../admin/index.php");
//}


