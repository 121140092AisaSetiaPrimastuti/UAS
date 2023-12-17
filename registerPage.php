<?php
session_start();

include "koneksi.php"; // Assuming koneksi.php includes the User class

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirmed-password'];

    $userObj = new User();

    // Validation (you can add more validation if needed)
    if (empty($fullName) || empty($username) || empty($password) || empty($confirmedPassword)) {
        echo "Please fill in all fields.";
    } elseif ($password !== $confirmedPassword) {
        echo "Password and Confirmed Password do not match.";
    } else {
        // Call the createUser method from the User class
        $password = md5($password); // Kita enkripsi (encrypt) password tadi dengan md5

        $userObj->createUser($fullName, $username, $password);

        echo "Registration successful!";
        header("Location: loginPage.php");
    }
}
?>

<html>

<head>
    <title>Register</title>
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
            <h1 style="text-align: center; color: #333;">Daftar Akun Baru</h1>

            <form id="form" action="registerPage.php" name="registrationForm" onsubmit="return validateForm()"
                method="post">
                <div class="full-name" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Full Name</label>
                    <input type="text" name="full_name" id="full_name" placeholder="Full Name"
                        style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;">
                    <div id="fullNameError" class="error"></div>
                </div>
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
                <div class="confirmed-password" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Confirm Password</label>
                    <input type="password" name="confirmed-password" id="confirmedPassword"
                        placeholder="confirmed-password"
                        style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;">
                    <div id="confirmedPasswordError" class="error"></div>
                </div>

                <button type="submit"
                    style="background-color: #333; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Daftar</button>
            </form>

            <p id="formMessage" style="text-align: center; margin-top: 15px;"></p>
            <p style="text-align: center; margin-top: 15px;">Sudah punya akun? <a href="loginPage.php">Login di sini</a>
            </p>
        </div>
    </div>

    <script>
        function validateForm() {
            document.getElementById("fullNameError").innerHTML = "";
            document.getElementById("usernameError").innerHTML = "";
            document.getElementById("passwordError").innerHTML = "";
            document.getElementById("confirmedPasswordError").innerHTML = "";
            document.getElementById("formMessage").innerHTML = "";

            var fullName = document.getElementById("full_name").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmedPassword = document.getElementById("confirmedPassword").value;

            if (fullName === "") {
                document.getElementById("fullNameError").innerHTML = "Full Name is required";
                return false;
            }

            // Validate username
            if (username === "") {
                document.getElementById("usernameError").innerHTML = "Username is required";
                return false;
            }

            // Validate password
            if (password === "") {
                document.getElementById("passwordError").innerHTML = "Password is required";
                return false;
            }

            // Validate confirmed password
            if (confirmedPassword === "") {
                document.getElementById("confirmedPasswordError").innerHTML = "Confirmed Password is required";
                return false;
            } else if (password !== confirmedPassword) {
                document.getElementById("confirmedPasswordError").innerHTML = "Password and Confirmed Password do not match";
                return false;
            }

            // Display success message
            document.getElementById("formMessage").innerHTML = "Form submitted successfully!";
            document.getElementById("formMessage").className = "success";

            return true;
        }
    </script>


</body>

</html>