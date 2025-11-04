<?php
header('Content-Type: application/json');
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn = new mysqli('localhost','root','','servo_db');
$stmt = $conn->prepare("DELETE FROM saved_positions WHERE id=?");
$stmt->bind_param('i',$id);
$ok = $stmt->execute();
echo json_encode(['success'=>$ok]);
