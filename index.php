<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog</title>
	<meta name="author" content="name">
	<meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">


</head>
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
		margin-left: -20px;
		margin-right: 1px;
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

	label.required {
		color: white;
		padding-left: 1px;


	}

	#btn_i {
		width: 125px;
		margin-left: 100px;
		margin-right: 100px;
		margin-bottom: 25px;
	}
</style>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">

	<!--Header-->
	<div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url('cover.jpg'); height: 60vh; max-height:460px;">
		<div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
			<!--Title-->
			<p class="text-white font-extrabold text-3xl md:text-5xl">
				Blog Siteme Hoşgeldiniz.
			</p>
			<p class="text-xl md:text-2xl text-gray-500">Batuhan Çelik</p>
		</div>
	</div>

	<!--Container-->
	<div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">

		<div class="mx-0 sm:mx-6">

			<!--Nav-->
			<nav class="mt-0 w-full">
				<div class="container mx-auto flex items-center">

					<div class="flex w-1/2 pl-4 text-sm">
						<ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
							<li class="mr-2">
								<a class="inline-block py-2 px-2 text-white no-underline hover:underline" href="index.php">Ana Sayfa</a>
								<a class="inline-block py-2 px-2 text-white no-underline hover:underline" href="aboutme/">Hakkımda</a>
								<a class="inline-block py-2 px-2 text-white no-underline hover:underline" href="admin.php">Admin Giriş</a>
							</li>

						</ul>
					</div>
				</div>
			</nav>
		</div>

		<!--Posts Container-->
		<div class="flex flex-wrap justify-between pt-12 -mx-6">

			<!--1/2 col -->
			<div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
				<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
					<a href="" class="flex flex-wrap no-underline hover:no-underline">
						<p class="w-full text-gray-600 text-xs md:text-sm px-6"></p>
						<?php
						require_once("database.php");
						$query = $db->prepare("SELECT * FROM blog ");
						$query->execute();
						$todos = $query->fetchAll(PDO::FETCH_ASSOC);
						foreach ($todos as $todo) {
							//show blogs
							echo "<div class='w-full md:w-1/2 p-6'>";
							echo "<div class='flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg'>";
							echo "<img src='" . $todo['resim'] . "' class=flex flex-wrap no-underline hover:no-underline'>";
							echo "<div class='w-full font-bold text-xl text-gray-900 px-6'>" . $todo['baslık'] . "</div>";
							echo "<p class='w-full text-gray-600 text-xs md:text-sm px-6'>Blog Icerigi: " . $todo['icerik'] . "</p>";
							echo "<p class='text-gray-800 font-serif text-base px-6 mb-5'>Yayinlanlan tarih: " . $todo['date'] . "</p>";
							echo "</div>";
							echo "</div>";
						}
						?>
					</a>
					<footer class="bg-gray-900">
						<div class="container max-w-6xl mx-auto flex items-center px-2 py-8">

							<div class="w-full mx-auto flex flex-wrap items-center">
								<div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
									<a class="text-gray-900 no-underline hover:text-gray-900 hover:no-underline" href="#">
										<span class="text-base text-gray-200">By Batuhan Çelik</span>
									</a>
								</div>
								<div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
									<ul class="list-reset flex justify-center flex-1 md:flex-none items-center">
									</ul>
								</div>
							</div>
						</div>
						<div class="container">
							<form action="contact.php" align="center" style="margin:auto;  width:750px;" method="post">
								<label class="required" for="fname">İsim - Soyisim</label>
								<input type="text" id="fname" name="name" placeholder="İsim - Soyisim">
								<label class="required" for="lname">Başlık</label>
								<input type="text" id="lname" name="baslik" placeholder="E-Posta">
								<label class="required" for="subject">Mesajınız</label>
								<textarea id="subject" name="subject" placeholder="Mesaj Yazınız" style="height:200px"></textarea>
								<input type="submit" class="button1" value="Gönder" id="btn_i">
							</form>
						</div>
					</footer>
					<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
					<script src="https://unpkg.com/tippy.js@4"></script>
</body>

</html>