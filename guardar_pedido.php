<?php
// ============================================
// ARCHIVO: guardar_pedido.php
// Guardar nuevo pedido
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientePedido = $_POST['clientePedido'];
    $formaPagoPedido = $_POST['formaPagoPedido'];
    $metodoEnvioPedido = $_POST['metodoEnvioPedido'];
    $sucursalPedido = !empty($_POST['sucursalPedido']) ? $_POST['sucursalPedido'] : NULL;
    $estadoPedido = $_POST['estadoPedido'];
    $montoPedido = $_POST['montoPedido'];
    $observacionesPedido = $_POST['observacionesPedido'];
    
    $sql = "INSERT INTO Pedidos (ClienteID, FormaDePagoID, MetodoEnvio, SucursalRetiroID, EstadoPedido, MontoTotal, Observaciones) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iisisds", $clientePedido, $formaPagoPedido, $metodoEnvioPedido, $sucursalPedido, $estadoPedido, $montoPedido, $observacionesPedido);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Pedido guardado exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>