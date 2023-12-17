<?php

class Connection
{
    public $host = "127.0.0.1";
    public $password = "";
    public $user = "root";
    public $port = "3080";
    public $db_name = "aisa";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db_name", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

class User extends Connection
{
    public function createUser($fullName, $username, $password)
    {
        try {
            // Assuming you have a users table with columns: id, full_name, username, password
            $stmt = $this->conn->prepare("INSERT INTO user (full_name, username, password) VALUES (:full_name, :username, :password)");

            // Use a secure way to bind parameters to prevent SQL injection
            $stmt->bindParam(':full_name', $fullName);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            // Execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getUser($username, $password)
    {
        try {
            // Assuming you have a users table with columns: id, full_name, username, password
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify the password using password_verify
                if ($user['password'] = $password) {
                    // Password is correct, return the user data
                    return $user;
                } else {
                    // Password is incorrect
                    return null;
                }
            } else {
      
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
class Film extends Connection
{
    // Fungsi untuk menambah data film
    public function addFilm($name, $genre, $releaseYear, $rating)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO movies (name, genre, release_year, rating) VALUES (:name, :genre, :releaseYear, :rating)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':releaseYear', $releaseYear);
            $stmt->bindParam(':rating', $rating);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Fungsi untuk mendapatkan semua data film
    public function getAllFilms()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM movies");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // Fungsi untuk mendapatkan data film berdasarkan ID
    public function getFilmById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM movies WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    // Fungsi untuk mengupdate data film berdasarkan ID
    public function updateFilm($id, $name, $genre, $releaseYear, $rating)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE movies SET name = :name, genre = :genre, release_year = :releaseYear, rating = :rating WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':releaseYear', $releaseYear);
            $stmt->bindParam(':rating', $rating);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Fungsi untuk menghapus data film berdasarkan ID
    public function deleteFilm($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM movies WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>
