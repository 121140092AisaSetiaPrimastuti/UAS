<?php
session_start();
include 'koneksi.php';


if (!isset($_SESSION['username'])) {
	header("location: loginPage.php");
}

$filmObj = new Film();
$films = $filmObj->getAllFilms();
$no = 1;
?>

<html>

<head>
	<link rel="stylesheet" href="style.css">
	<title>Halaman Setelah Login</title>
</head>

<body>
	<?php include_once './components/navbar.php'; ?>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama Film</th>
				<th>Genre</th>
				<th>Tahun Rilis</th>
				<th>Rating</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($films as $film): ?>
				<tr>
					<td data-label="No">
						<?php echo $no++ ?>
					</td>
					<td data-label="Nama Film">
						<?php echo $film['name']; ?>
					</td>
					<td data-label="Genre">
						<?php echo $film['genre']; ?>
					</td>
					<td data-label="Tahun Rilis">
						<?php echo $film['release_year']; ?>
					</td>
					<td data-label="Rating">
						<?php echo $film['rating']; ?>
					</td>
					<td data-label="Action">
						<a href="edit.php?id=<?php echo $film['id']; ?>" class="btn btn__active">Edit</a>
						<a href="delete.php?id=<?php echo $film['id']; ?>" class="btn btn__pledged"
							onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>


	</div>
	<div id="cookie-notice">
		<p>Kami menggunakan cookie untuk meningkatkan pengalaman Anda di situs web ini. Dengan melanjutkan, Anda setuju
			dengan kebijakan cookie kami.</p>
		<button onclick="acceptCookies()">Setuju</button>
	</div>

	<script>
		function acceptCookies() {
			setCookie("cookie", "true", 30);
			document.getElementById("cookie-notice").style.display = "none";
		}

		function setCookie(name, value, days) {
			var expires = "";
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				expires = "; expires=" + date.toUTCString();
			}
			document.cookie = name + "=" + (value || "") + expires + "; path=/";
		}

		function getCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') c = c.substring(1, c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
			}
			return null;
		}

		var cookieAccepted = getCookie("cookie");
		if (cookieAccepted === "true") {
			document.getElementById("cookie-notice").style.display = "none";
		}
	</script>
</body>

</html>