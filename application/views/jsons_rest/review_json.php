<?php
header('Content-Type: application/json');
$data['review']=array($review);
echo json_encode($data);
?>