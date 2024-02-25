<?php
session_start();
if (isset($_POST['title']) && isset($_POST['category'])) {
    require("database.php");
    $id = $_GET['id'];
    $baslık = $_POST['title'];
    $icerik = $_POST['category'];
    $createdAt = date('Y-m-d H:i:s');
    $query = $db->prepare("UPDATE `blog` SET `baslık` = ?, `icerik` = ?, `date` = ? WHERE `blog`.`id` = ?");
    $query->execute(array(
        $baslık,
        $icerik,
        $createdAt,
        $id
    ));

    if ($query) {
        echo '<script>
            alert("Güncelleme Başarılı.");
            window.location.href="adminindex.php";
            </script>';
    } else {
        echo '<script>
            alert("Hata Meydana Geldi!");
            window.location.href="adminindex.php";
            </script>';
    }
}
?>

<!doctype html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Blog Güncelleme</title>
</head>

<body class="bg-light">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Blog Güncelleme</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="adminindex.php" class="nav-link active" aria-current="page">Ana Sayfa</a></li>

            </ul>
        </header>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card bg-white rounded border shadow">
                    <div class="card-header px-4 py-3">
                        <h4 class="card-title">Blog Düzenleme</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Başlık</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?PHP
                                require("database.php");
                                $id = $_GET['id'];
                                $query = $db->prepare("SELECT * FROM `blog` WHERE `id`= ?");
                                $query->execute(array(
                                $id
                                ));
                                $row = $query->fetch();
                                $title_info = $row['baslık'];
                                echo $title_info; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Açıklama</label>
                                <textarea class="form-control" id="desc" name="category" rows="3" required><?PHP
                                require("database.php");
                                $id = $_GET['id'];
                                $query = $db->prepare("SELECT * FROM `blog` WHERE `id`= ?");
                                $query->execute(array(
                                $id
                                ));
                                $row = $query->fetch();
                                $category_info = $row['icerik'];
                                echo $category_info; ?></textarea>
                            </div>
                            <div>
                                <button type="submit" name="addTodo" class="btn btn-primary me-2">Güncelle</button>
                                <button type="reset" class="btn btn-danger">Sıfırla</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>