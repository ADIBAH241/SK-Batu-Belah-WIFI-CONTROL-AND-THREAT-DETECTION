<?
include "../db.php";

$data = $conn->query("SELECT COUNT(*) as total FROM devices WHERE status 'active'");
$Row = $data->fetch_assoc();
$total = $row['total'];
?>

<canvas id="trafficChart"></canvas>

<script>
const ctx = document.getElementById('trafficChart');

new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ['Active Devices'],
		dataset: [{
			label: 'Total Active Users',
			data; [<?php echo $total; ?>]
		}]
	}
})
</script>
