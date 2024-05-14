<?php
session_start();
error_reporting(0);

// Inicializar las variables de sesión si no están definidas
if (!isset($_SESSION['voly'])) {
    $_SESSION['voly'] = 0;
}
if (!isset($_SESSION['Basquet'])) {
    $_SESSION['Basquet'] = 0;
}
if (!isset($_SESSION['FUT'])) {
    $_SESSION['FUT'] = 0;
}
if (!isset($_SESSION['Tae'])) {
    $_SESSION['Tae'] = 0;
}

// Verificar cuál botón fue presionado y actualizar los votos en consecuencia
if (filter_input(INPUT_POST, 'btnBoton1')) {
    $_SESSION['voly'] += 1;
}
if (filter_input(INPUT_POST, 'btnBoton2')) {
    $_SESSION['Basquet'] += 1;
}
if (filter_input(INPUT_POST, 'btnBoton3')) {
    $_SESSION['FUT'] += 1;
}
if (filter_input(INPUT_POST, 'btnBoton4')) {
    $_SESSION['Tae'] += 1;
}

// Actualizar el total de votos
$_SESSION['total'] = $_SESSION['voly'] + $_SESSION['Basquet'] + $_SESSION['FUT'] + $_SESSION['Tae'];

// Redireccionar a index.php
header('Location: index.php');
exit();
?>