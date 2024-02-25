<?php
require("database.php");
$name = $_POST['name'];
echo $name;
$subject_title = $_POST['baslik'];
$subject_description = $_POST['subject'];
$db->exec("INSERT INTO contact (name, subject_title, description) VALUES ('$name','$subject_title','$subject_description')");
if ($db) {
    echo "Mesaj Gönderildi";
    header("Location: index.php");
} else {
    echo "Mesaj Gönderilemedi";
    header("Location: index.php");
}
