<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['username'])) {
  header("location: loginPage.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $name = $_POST['name'];
  $genre = $_POST['genre'];
  $releaseYear = $_POST['release_year'];
  $rating = $_POST['rating'];

  $filmObj = new Film();
  $result = $filmObj->addFilm($name, $genre, $releaseYear, $rating);

  if ($result){
    header("location: index.php");
    exit();
  }
  else{
    echo $name, $genre, $releaseYear, $rating;
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
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

  <h2 style="text-align: center; padding-top:30px;">Input Data Film</h2>

  <form id="form" onsubmit="validateForm()" method="post" action="create.php">
    <label for="name">Nama Film:</label>
    <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['input_data']['name']) ? $_SESSION['input_data']['name'] : ''; ?>">
    <br>

    <label for="genre">Genre:</label>
    <select id="genre" name="genre">
    <option value="">Pilih Genre</option>
      <option value="action">Action</option>
      <option value="sci-fi">Sci-Fi</option>
      <option value="horror">Horror</option>
    </select>
    <br>

    <label for="release_year">Tahun Rilis:</label>
    <input type="text" id="release_year" name="release_year" value="<?php echo isset($_SESSION['input_data']['release_year']) ? $_SESSION['input_data']['release_year'] : ''; ?>">
    <br>

    <label for="rating">Rating:</label>
    <input type="text" id="rating" name="rating" value="<?php echo isset($_SESSION['input_data']['rating']) ? $_SESSION['input_data']['rating'] : ''; ?>">
    <br>

    <button type="submit">Submit</button>
  </form>

  <script>
    // Save input data to local storage on form submission
    document.getElementById('form').addEventListener('submit', function() {
      localStorage.setItem('input_data', JSON.stringify({
        name: document.getElementById('name').value,
        release_year: document.getElementById('release_year').value,
        rating: document.getElementById('rating').value
      }));
    });

    // Load saved input data from local storage
    window.addEventListener('load', function() {
      const inputData = JSON.parse(localStorage.getItem('input_data'));
      if (inputData) {
        document.getElementById('name').value = inputData.name;
        document.getElementById('release_year').value = inputData.release_year;
        document.getElementById('rating').value = inputData.rating;
      }
    });
  </script>
  <script src="formValidation.js"></script>
</body>

</html>