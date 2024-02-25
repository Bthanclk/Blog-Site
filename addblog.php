<?php
error_reporting(0);
if (isset($_POST['baslık']) && isset($_POST['icerik'])) {
    require("database.php");
    $baslık = $_POST['baslık'];
    $icerik = $_POST['icerik'];
    $resim = $_POST['resim'];
    $createdAt = date('Y-m-d H:i:s');
    $target_file = "img/";
    $file_name = $_FILES["resim"]["name"];
    $target_file = $target_file . basename($_FILES["resim"]["name"]);
    //create time stamp
    $date = date('Y-m-d H:i:s');
    $file_temp = basename($_FILES["resim"]["tmp_name"]);;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_path_str = "img/" . $file_name; // for db
    if (move_uploaded_file($_FILES["resim"]["tmp_name"], $target_file)) {
        require("database.php");
        $query = "INSERT INTO blog (baslık, icerik, date, resim)
                        VALUES('$baslık', '$icerik','$date','$image_path_str')";
        $db->exec($query);
        echo "<script>alert('Blog Başarılı Bir Şekilde Eklendi')</script>";
        echo "<script>window.location='adminindex.php'</script>";
    } else {
        echo "<script>alert('Hata Meydana Geldi!')</script>";
        echo "<script>window.location='addblog.php'</script>";
    }
}

?>

<HTML5>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <style>
            input[type=text],
            select,
            textarea {
                width: 110%;
                padding: 7px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 10px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" align="center" style="margin:0 auto; width:750px;" method="POST" enctype="multipart/form-data">
                        <label for="Your Name">Başlık</label>
                        <input type="text" id="btitle" name="baslık" placeholder="Başlık">

                        <label for="Your Name">Açıklama</label>
                        <input type="text" id="bsummary" name="icerik" placeholder="Açıklama">

                        <label for="Subject Title">Kapak Fotoğrafı</label>
                        <input type="file" id="bcoverImage" name="resim" placeholder="Resim">
                        <input type="submit" value="Gönder">
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>