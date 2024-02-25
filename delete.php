<?php
require("database.php");
$id = $_GET['id'];
$query = $db->prepare("DELETE FROM `blog` WHERE id = ?");
$query->execute([$id]);
header("Location: adminindex.php");
