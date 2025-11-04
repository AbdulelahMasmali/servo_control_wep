<?php
header('Content-Type: application/json');
$body = json_decode(file_get_contents('php://input'), true);
if(!$body){ echo json_encode(['success'=>false]); exit; }
$s1=(int)$body['s1']; $s2=(int)$body['s2']; $s3=(int)$body['s3']; $s4=(int)$body['s4'];

$conn = new mysqli('localhost','root','','servo_db');
$stmt = $conn->prepare("UPDATE last_submit SET servo1=?,servo2=?,servo3=?,servo4=? WHERE id=1");
$stmt->bind_param('iiii',$s1,$s2,$s3,$s4);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

echo json_encode(['success'=>$ok]);
