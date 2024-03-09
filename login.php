<?php
session_start();

$hostName = "sql112.infinityfree.com";
$dbUser = "if0_36117864";
$dbPassword = "Putanginamo30";
$dbName = "if0_36117864_website";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT registration_id, email, password FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $registration = mysqli_fetch_assoc($result);

    if ($registration && password_verify($password, $registration["password"])) {
        $_SESSION["user"] = $email; // $email is the user's email retrieved from the database

        // After setting $_SESSION["user"]
        header("Location: contact.php?email=" . urlencode($_SESSION["user"]));

    } else {
        $errorMessage = "Invalid email or password";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        background-image: url("skins/love.gif");
        background-size: 100%;
        position: relative;
        overflow: hidden;
    }

    .container {
        max-width: 500px;
        margin: 0 auto;
        padding:50px;
        background-color: #d4ecf4;
        opacity: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        position: relative;
        border: solid 1px;
        box-shadow: 0px 0px 10px #33a5cb;
        text-align: left; /* Center align text */
    }

    .form-group {
        margin-bottom:30px;
        font-family: Newsreader;    
    }

    .btn-custom {
        background-color: #33a5cb;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-custom:hover {
        background-color: #1b5569;
    }

    .custom-image {
        width: 200px; /* Set the width of the image */
        height: none; /* Maintain aspect ratio */
        border-radius: 20px; /* Add border radius */
        margin-bottom: 15px; /* Add margin bottom for spacing */
        margin-left: 650px;
        margin-top:30px;
        position: relative;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 10px;
        font-size: 16px;
        background-color: #33a5cb;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .back-button i {
        vertical-align: middle;
    }

    .back-button:hover {
        background-color: #1b5569;
    }

    p {
        margin-top: 10px;
        font-family: Newsreader;
    }

    .error-message {
        color: red;
        bottom: 100px;
        font-size: 15px;
        text-align: center;
    }
</style>
<body>
    <button class="back-button" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
    <img src="skins/logo.png" alt="Custom Image" class="custom-image">
    
    <?php if(isset($errorMessage)): ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    
    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class= "form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class= "form-control" required>
            </div>

            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn-custom">
            </div>
        </form>
        <div><p>Not Registered Yet? <a href="registration.php"> Register Here</a></div>
    </div>
    <script>
        function goBack() {
            window.location.href = "loginpg.html";
        }
    </script>
</body>
</html>
