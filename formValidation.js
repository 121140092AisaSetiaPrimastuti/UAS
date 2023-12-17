const form = document.getElementById('form');
form.addEventListener('submit', e => {
  e.preventDefault();
  if (validateForm()) {
    form.submit();
  }
});
function validateForm() {
  var name = document.getElementById("name");
  var genre = document.getElementById("genre");
  var releaseYear = document.getElementById("release_year");
  var rating = document.getElementById("rating");

  var isValid = true;

  if (name.value.trim() === "") {
    isValid = false;
    name.classList.add("input-error");
  } else {
    name.classList.remove("input-error");
    name.classList.add("input-success");
  }

  if (genre.value === "") {
    isValid = false;
    genre.classList.add("input-error");
  } else {
    genre.classList.remove("input-error");
    genre.classList.add("input-success");
  }

  if (releaseYear.value.trim() === "" || isNaN(releaseYear.value)) {
    isValid = false;
    releaseYear.classList.add("input-error");
  } else {
    releaseYear.classList.remove("input-error");
    releaseYear.classList.add("input-success");
  }

  if (rating.value.trim() === "" || isNaN(rating.value) || rating.value < 0 || rating.value > 10) {
    isValid = false;
    rating.classList.add("input-error");
  } else {
    rating.classList.remove("input-error");
    rating.classList.add("input-success");
  }

  return isValid;
}