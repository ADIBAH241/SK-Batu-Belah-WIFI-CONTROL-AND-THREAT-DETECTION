<?php
include "../db.php";

$result = $conn->query("SELECT * FROM trrafic_logs ORDER BY id DESC LIMIT 6");

$labels = [];
$values = [];

while($row = $result->fetch_assoc()){
	$labels[] = date("H:i", strtotime($row['created_at']));
	$values[] = $row['bandwidth'];
}

echo json_encode([
	"labels" => array_reverse($labels),
	"values" => array_reverse($values)
]);
?>
