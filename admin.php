<?php
session_start();
error_reporting(error_level: 0);
require("database.php");
if (isset($_POST['username']) && isset($_POST['pass'])) {
  require("database.php");
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $query = $db->prepare("SELECT COUNT(*) as count FROM `users` WHERE `username`= ? AND `pass`=?");
  $query->execute(array(
    $username,
    $pass
  ));
  $row = $query->fetch();
  $count = $row['count'];
  if ($count > 0) {
    $query = $db->prepare("SELECT * FROM `users` WHERE `username` = '$username'");
    $row = $query->fetch();
    $u_uname = $row['username'];
    $_SESSION['username'] = $username;

    echo '<script>
                alert("Giriş Başarılı");
                window.location.href="adminindex.php";
                </script>';
  } else {
    echo '<script>
                alert("Giriş yapılırken hata oluştu. Lütfen tekrar deneyiniz");
                window.location.href="admin.php";
                exit;
                </script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Oturum Açma</title>
</head>

<body>
  <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <h2 class="fw-bold mb-0">Hoşgeldiniz</h2>
        </div>

        <div class="modal-body p-5 pt-0">
          <form action="" method="post" align="center" enctype="multipart/form-data">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" name="username" id="username" placeholder="name@example.com" required>
              <label for="floatingInput">Kullanıcı Adı</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" name="pass" id="pass" placeholder="Password" required>
              <label for="floatingPassword">Şifre</label>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Giriş Yap</button>
            <hr class="my-4">
            <a class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" href="index.php">Ana Sayfa</a>
          </form>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>