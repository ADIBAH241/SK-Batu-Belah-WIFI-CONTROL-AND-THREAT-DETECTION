<?
include "db.php";

$bandwidth = rand(50,300); //temporary simulation

$conn->query("INSERT INTO traffic_logs (bandwidth) VALUES ($bandwidth)");
?>
