<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost','root','','servo_db');
$res = $conn->query("SELECT id,servo1,servo2,servo3,servo4,created_at FROM saved_positions ORDER BY id DESC");
$out = [];
while($r=$res->fetch_assoc()) $out[] = $r;
echo json_encode($out);
