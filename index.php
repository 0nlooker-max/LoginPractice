<?php
include 'database.php';

session_start();

if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script defer src="main.js"></script>
    <title>Sign Up & Sign In</title>
</head>
<body> 
    <div class="container right-panel-active">
        <!-- Sign Up Form -->
        <div class="container__form container--signup">
            <form action="process_signup.php" method="POST" class="form" id="form1">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" name="username" placeholder="Username" class="input" required />
                <input type="email" name="email" placeholder="Email" class="input" required />
                <input type="password" name="password" placeholder="Password" class="input" required />
                <button class="btn">Sign Up</button>
            </form>
        </div>

        <!-- Sign In Form -->
        <div class="container__form container--signin">
            <form action="process_signin.php" method="POST" class="form" id="form2">
                <h2 class="form__title">Sign In</h2>
                <input type="email" name="email" placeholder="Email" class="input" required />
                <input type="password" name="password" placeholder="Password" class="input" required />
                <a href="#" class="link">Forgot Your Password?</a>
                <button class="btn">Sign In</button>
            </form>
        </div>

        <!-- Overlay for Sign In/Sign Up switching -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
