<?php
require("database.php");
$sql = "SELECT COUNT(*) AS count FROM contact";
$stmt = $db->prepare($sql);
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
echo $count;
