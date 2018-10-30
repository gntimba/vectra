<?php
header('Content-Type: application/json');
$data['feedback']=array($feedback,$success);
echo json_encode($data);
?>