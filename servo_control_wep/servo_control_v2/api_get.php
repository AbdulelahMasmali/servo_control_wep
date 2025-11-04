<?php
header('Content-Type: application/json');
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn = new mysqli('localhost','root','','servo_db');
$stmt = $conn->prepare("SELECT id,servo1,servo2,servo3,servo4,created_at FROM saved_positions WHERE id=? LIMIT 1");
$stmt->bind_param('i',$id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
echo json_encode($row ?: []);
