<?php
require_once "../../model/Message.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharpeners - Log in or Sign up</title>
    <link rel="stylesheet" href="../../assets/css/StyleSheet.css">
    <script src="../../assets/js/login.js"></script>
</head>

<body>
    <h1 id="logo">SHARPENERS</h1>
    <form id="login-form" method="post" action="../../controller/CommonFile/loginCheck.php" autocomplete="off" onsubmit="return Login()" enctype="multipart/form-data">
        <fieldset>
            <p class="inc-pass" id="<?php Condition() ?>"><?php ShowHeadMessage() ?></p>
            <label id="email-label">Email<input type="email" id="login-email" name="Email" placeholder="you@example.com" value="<?php ShowMessage() ?>" onclick="Hide()"></label>
            <p class="err" id="login-email-err"></p>
            <label id="pass-label">Password<input type="password" id="login-password" name="Password" placeholder="Enter Password Here" onclick="Hide()"></label>
            <p class="err" id="login-password-err"></p>
            <input type="submit" value="Login">
            <a href="forgotpass.html" id="forget-btn">Forgot Password?</a>
        </fieldset>
    </form>
    <div class="option" id="option">
        <p>Don't have an account?</p>
        <a href="UserType.html" id="login-btn">Sign Up</a>
    </div>
    <footer>
        <p id="footer">Sharpeners | By Emon Singha | &copy; <?php echo date('Y') ?></p>
    </footer>
</body>

</html>