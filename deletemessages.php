<?php
if (isset($_GET['name'])) {
    require 'database.php';
    $name = $_GET['name'];
    $sql = $db->prepare("DELETE FROM contact WHERE name = '$name'");
    $sql->execute();
    header('Location: adminindex.php');
}
