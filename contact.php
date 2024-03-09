<?php
session_start();

// Check if the user is logged in and retrieve their email from the session
if (isset($_SESSION["user"])) {
    $userEmail = $_SESSION["user"];
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
    echo "<script>openSuccessModal();</script>";
}

// Retrieve user's email from the query parameter if available
if (isset($_GET["email"])) {
    $userEmail = $_GET["email"];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Contact me</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(skins/love.gif);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        

        .container {
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add shadow for depth */
            max-width: 600px; /* Limit container width */
            border: solid 1px;
            box-shadow: 0px 0px 10px #33a5cb;
            font-family: Newsreader;
        }

        form {
            padding: 20px 40px; /* Adjust padding for better spacing */
        }

        input, textarea, button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 200px; /* Set the height of the message input box */
        }

        button {
            background-color: #33a5cb;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: solid 1px;
            border-color: black;
        }

        button:hover {
            background-color: #1b5569;
        }
        .heading {
            background-color: white;
            margin-top: 0; /* Remove default margin */
            border: ridge 2px;
            padding: 10px;
            font-family: Newsreader;
            text-align: center;
            margin-left: 45px;
            margin-right: 45px;
            border-radius: 5px;

        }
        h1 {
            font-size: xx-large;
            
        }
        h2 {
            font-size: medium;
        }

        /* Custom modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            
            
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 15px;
            width: 40%;
            height: 20%;
            border-radius: 10px;
            border: solid 2px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 25px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            
            text-decoration: none;
            background-color: #fefefe;
            cursor: pointer;
            align-items: right;

        }
        p {
            font-family: Newsreader;
            font-size: 30px;
            text-align: center;
            margin: 0;
        }
        .logout-button {
            position: absolute;
            display: inline-block;
            padding: 10px 20px;
            background-color: #33a5cb; /* Red color */
            color: white;
            text-decoration: none;
            border: solid 1px;
            cursor: pointer;
            transition: background-color 0.3s;
            bottom: 90%;
            left: 93%;
            border-radius: 15px;
            border-color: black;
            font-family: Newsreader;
        }
        .logout-button:hover {
            background-color: #1b5569; 
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #F2F2F2;
            padding: 10px 0;
            font-family: IBM Plex Mono;
            font-size: 10px;
            text-align: center;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
        <h1>Good day!</h1>
        <h2>Type your message here.</h2></div>
        <form class="" action="send.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="email" value="<?php echo $userEmail; ?>">
            Subject <input type="text" name="subject" id="subject"> <br>
            Message <textarea name="message" id="message"></textarea> <!-- Use textarea for multiline input -->
            <button type="submit" name="send">Send</button>
        </form>
    </div>

    <!-- Modal for displaying error message -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="error-msg"></p>
        </div>
    </div>



    <a href="loginpg.html" class="logout-button">Logout</a>
    <footer>
        <span class="char">%C2%A9 </span> 2024 by Rhealyn Nabual All rights reserved.
    </footer>
    <script>
    var specialChars = document.querySelectorAll("span.char"); for(var c=0; c<specialChars.length; c++){ specialChars[c].innerHTML = decodeURIComponent(specialChars[c].innerHTML); }
        function validateForm() {
            var subject = document.getElementById("subject").value;
            var message = document.getElementById("message").value;

            if (subject.trim() === '' || message.trim() === '') {
                // Display error modal
                document.getElementById("error-msg").innerHTML = "Subject/Message are required!";
                document.getElementById("myModal").style.display = "block";
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }

        function closeModal() {
            // Hide error modal
            document.getElementById("myModal").style.display = "none";
        }
    </script>
</body>
</html>
