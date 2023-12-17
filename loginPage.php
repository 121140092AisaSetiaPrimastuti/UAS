<?php
session_start();

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
	$password = md5($password); // Kita enkripsi (encrypt) password tadi dengan md5

    $userObj = new User();
    $userData = $userObj->getUser($username, $password);
    if (!empty($userData)) {
        $_SESSION['username'] = $userData['username'];
        $_SESSION['full_name'] = $userData['full_name'];

        setcookie("message", "delete", time() - 1);

        header("location: index.php");
    } else {
        setcookie("message", "Maaf, Username atau Password salah", time() + 3600);

        header("location: loginPage.php");
    }
}
?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error {
            color: red;
            margin-top: 5px;
        }

        .success {
            color: green;
            margin-top: 5px;
        }
    </style>
</head>

<body style="margin: 0; background-color: #f5f5f5;">
    <?php include_once './components/navbar.php'; ?>

    <div style="display: flex; align-items: center; justify-content: center; height: 100vh;">
        <div
            style="max-width: 400px; width: 100%; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
            <h1 style="text-align: center; color: #333;">Silahkan Login</h1>

            <div id="errorMessage" style="color: red; margin-bottom: 15px; text-align: center;">
                <?php
                if (isset($_COOKIE["message"])) {
                    echo $_COOKIE["message"];
                }
                ?>
            </div>

            <form name="loginForm" action="loginPage.php" method="post" onsubmit="return validateForm()">
                <div class="username" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username"
                        style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;">
                    <div id="usernameError" class="error"></div>
                </div>
                <div class="password" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;">
                    <div id="passwordError" class="error"></div>
                </div>

                <button type="submit"
                    style="background-color: #333; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Login</button>
            </form>

            <p style="text-align: center; margin-top: 15px;">Belum punya akun? <a href="registerPage.php">Daftar di sini</a></p>
        </div>
    </div>

    <script>
        function validateForm() {
            // Reset previous errors and success messages
            document.getElementById("usernameError").innerHTML = "";
            document.getElementById("passwordError").innerHTML = "";
            document.getElementById("errorMessage").innerHTML = "";

            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var isValid = true;

            // Validate username
            if (username === "") {
                document.getElementById("usernameError").innerHTML = "Username is required";
                isValid = false;
            }

            // Validate password
            if (password === "") {
                document.getElementById("passwordError").innerHTML = "Password is required";
                isValid = false;
            }

            if (!isValid) {
                document.getElementById("errorMessage").innerHTML = "Please fix the errors in the form.";
                document.getElementById("errorMessage").className = "error";
            }

            return isValid;
        }
    </script>

</body>

</html>
