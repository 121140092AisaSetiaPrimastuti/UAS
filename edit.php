<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("location: loginPage.php");
}

// Mendapatkan ID film yang akan diedit dari URL
if (isset($_GET['id'])) {
    $filmId = $_GET['id'];

    // Memproses form pengeditan saat data dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $releaseYear = $_POST['release_year'];
        $rating = $_POST['rating'];

        // Memanggil fungsi updateFilm untuk melakukan pengeditan
        $filmObj = new Film();
        $result = $filmObj->updateFilm($filmId, $name, $genre, $releaseYear, $rating);

        if ($result) {
            header("location: index.php");
            exit();
        } else {
            echo "Gagal mengedit data film.";
        }
    }

    // Mendapatkan data film yang akan diedit
    $filmObj = new Film();
    $film = $filmObj->getFilmById($filmId);
} else {
    // Redirect ke halaman lain jika ID tidak tersedia
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .input-error {
            border: 1px solid red;
        }

        .input-success {
            border: 1px solid green;
        }
    </style>
</head>

<body>
    <?php include_once './components/navbar.php'; ?>

    <h2 style="text-align: center; padding-top:30px;">Edit Data Film</h2>
    <form id="form" onsubmit="validateForm()" method="post" action="edit.php?id=<?php echo $filmId; ?>">
        <label for="name">Nama Film:</label>
        <input type="text" id="name" name="name" value="<?php echo $film['name']; ?>">
        <br>

        <label for="genre">Genre:</label>
        <select id="genre" name="genre">
            <option value="">Pilih Genre</option>
            <option value="action" <?php echo ($film['genre'] == 'action') ? 'selected' : ''; ?>>Action</option>
            <option value="sci-fi" <?php echo ($film['genre'] == 'sci-fi') ? 'selected' : ''; ?>>Sci-Fi</option>
            <option value="horror" <?php echo ($film['genre'] == 'horror') ? 'selected' : ''; ?>>Horror</option>
        </select>
        <br>

        <label for="release_year">Tahun Rilis:</label>
        <input type="text" id="release_year" name="release_year" value="<?php echo $film['release_year']; ?>">
        <br>

        <label for="rating">Rating:</label>
        <input type="text" id="rating" name="rating" value="<?php echo $film['rating']; ?>">
        <br>

        <button type="submit">Submit</button>
    </form>

    <script src="formValidation.js"></script>
</body>

</html>
