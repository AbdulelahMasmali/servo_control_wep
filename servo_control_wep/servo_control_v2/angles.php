<?php
// angles.php  -> prints last submitted angles in plain text, comma separated
header('Content-Type: text/plain');
$conn = new mysqli('localhost','root','','servo_db');
$res = $conn->query("SELECT servo1,servo2,servo3,servo4 FROM last_submit WHERE id=1 LIMIT 1");
if($r = $res->fetch_assoc()){
    echo $r['servo1'] . ',' . $r['servo2'] . ',' . $r['servo3'] . ',' . $r['servo4'];
} else {
    echo "90,90,90,90";
}
