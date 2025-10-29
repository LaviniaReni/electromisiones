<?php
// ============================================
// ARCHIVO: guardar_sucursal.php
// Guardar nueva sucursal
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreSucursal = $_POST['nombreSucursal'];
    $direccionSucursal = $_POST['direccionSucursal'];
    $ciudadSucursal = $_POST['ciudadSucursal'];
    $provinciaSucursal = $_POST['provinciaSucursal'];
    $telefonoSucursal = $_POST['telefonoSucursal'];
    $horarioSucursal = $_POST['horarioSucursal'];
    
    $sql = "INSERT INTO Sucursales (NombreSucursal, Direccion, Ciudad, Provincia, Telefono, Horario) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssss", $nombreSucursal, $direccionSucursal, $ciudadSucursal, $provinciaSucursal, $telefonoSucursal, $horarioSucursal);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Sucursal guardada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>