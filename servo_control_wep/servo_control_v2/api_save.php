<?php
// api_save.php
header('Content-Type: application/json');
$body = json_decode(file_get_contents('php://input'), true);
if(!$body) { echo json_encode(['success'=>false,'error'=>'no input']); exit; }

$s1 = (int)$body['s1']; $s2 = (int)$body['s2'];
$s3 = (int)$body['s3']; $s4 = (int)$body['s4'];

$conn = new mysqli('localhost','root','','servo_db');
if($conn->connect_errno){ echo json_encode(['success'=>false,'error'=>'db']); exit; }

$stmt = $conn->prepare("INSERT INTO saved_positions (servo1,servo2,servo3,servo4) VALUES (?,?,?,?)");
$stmt->bind_param('iiii',$s1,$s2,$s3,$s4);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

echo json_encode(['success'=>$ok]);
