<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['formType'] === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validar inicio de sesion
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['user'] = $email;
            header("Location: index.php");
        } else {
            echo "Usuario o contrase&ntilde;a incorrectos";
        }
    }
}

$conn->close();
?>
