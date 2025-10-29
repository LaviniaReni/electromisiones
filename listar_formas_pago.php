<?php
// ============================================
// ARCHIVO: listar_formas_pago.php
// Listar todas las formas de pago
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT * FROM FormasDePago WHERE Activa = 1 ORDER BY NombreFormaPago";
$resultado = $conexion->query($sql);

$formas = [];
while ($fila = $resultado->fetch_assoc()) {
    $formas[] = $fila;
}

echo json_encode($formas);
$conexion->close();
?>