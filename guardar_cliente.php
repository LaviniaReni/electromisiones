<?php
// ============================================
// ARCHIVO: guardar_cliente.php
// Guardar nuevo cliente
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCliente = $_POST['nombreCliente'];
    $emailCliente = $_POST['emailCliente'];
    $telefonoCliente = $_POST['telefonoCliente'];
    $tipoCliente = $_POST['tipoCliente'];
    $direccionCliente = $_POST['direccionCliente'];
    $ciudadCliente = $_POST['ciudadCliente'];
    
    $sql = "INSERT INTO Clientes (NombreCliente, Email, Telefono, TipoCliente, Direccion, Ciudad) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssss", $nombreCliente, $emailCliente, $telefonoCliente, $tipoCliente, $direccionCliente, $ciudadCliente);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Cliente guardado exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>