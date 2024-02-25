<?php
require("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Panel</title>
	<meta name="author" content="name">
	<meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
	<script>
		function updateNotificationCount() {
			fetch('get_notification_count.php')
				.then(response => response.text())
				.then(data => {
					document.getElementById('notificationCount').innerText = data;
				});
		}

		document.addEventListener('DOMContentLoaded', function() {
			updateNotificationCount();
			setInterval(updateNotificationCount, 5000);
		});
	</script>
</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<!-- Container wrapper -->
		<div class="container-fluid">
			<!-- Toggle button -->
			<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class="navbar-brand mt-2 mt-lg-0" href="#"> </a>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0"> </ul>
			</div>
			<div class="d-flex align-items-center">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Anasayfa</a>
					</li>
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="addblog.php">Blog Ekle</a>
						</li>
						<div class="dropdown">
							<a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
								<i class="fas fa-bell"></i>
								<span class="badge rounded-pill badge-notification bg-danger">
									<?php
									include 'database.php';
									$sql = "SELECT COUNT(*) AS count FROM contact";
									$stmt = $db->prepare($sql);
									$stmt->execute();
									$count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
									echo $count;
									?>
								</span>
							</a>
							<!-- message button -->
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
								<?php
								require("database.php");
								$query = $db->prepare("SELECT * FROM contact");
								$query->execute();
								$contact = $query->fetchAll(PDO::FETCH_ASSOC);
								foreach ($contact as $contact) {
									echo '<div class="card">
                         <div class="card-body">
                             <h5 class="card-text">' . $contact['name'] . '</h5>
                             <p class="card-text">' . $contact['subject_title'] . '</p>
                             <p class="card-text">' . $contact['description'] . '</p>
                         </div>
                           <div class="card-footer">
                             <a href="deletemessages.php?name=' . $contact['name'] . '" class="btn btn-danger">Delete</a>
                           </div>
                      </div>';
								}
								?>
							</ul>
						</div>
			</div>
	</nav>
	<!--Header-->
	<div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url('cover.jpg'); height: 60vh; max-height:460px;">
		<div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
			<!--Title-->
			<p class="text-white font-extrabold text-3xl md:text-5xl">
				Admin Panel
			</p>
			<p class="text-xl md:text-2xl text-gray-500">Bloglar</p>
		</div>
	</div>
	<!--1/2 col -->
	<div class="w-full flex flex-wrap justify-between">
		<?php
		require_once("database.php");
		$query = $db->prepare("SELECT * FROM blog ");
		$query->execute();
		$todos = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($todos as $todo) {
			echo "<div class='w-full md:w-1/2 p-6'>";
			echo "<div class='flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg'>";
			echo "<img src='" . $todo['resim'] . "' class='flex flex-wrap no-underline hover:no-underline'>";
			echo "<div class='w-full font-bold text-xl text-gray-900 px-6'>" . $todo['baslık'] . "</div>";
			echo "<p class='w-full text-gray-600 text-xs md:text-sm px-6'>Blog İçeriği: " . $todo['icerik'] . "</p>";
			echo "<p class='text-gray-800 font-serif text-base px-6 mb-5'>Yayınlanma Tarihi: " . $todo['date'] . "</p>";
			// create delete and update buttons
			echo "<div class='w-full text-gray-600 text-xs md:text-sm px-6'>";
			echo "<a href='update.php?id=" . $todo['id'] . "' class='text-blue-500 no-underline hover:underline'>Update</a>";
			echo "<a href='delete.php?id=" . $todo['id'] . "' class='text-red-500 no-underline hover:underline'>Delete</a>";
			echo "</div>";
			echo "</div>"; 
			echo "</div>"; 
		}
		?>
	</div>

	<!-- Css  -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
	<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		tippy('.avatar')
	</script>
</body>

</html>