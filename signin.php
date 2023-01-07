<?php 
require_once("includes/config.php"); 
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/FormSanitizer.php");  

$account = new Account($con);

if(isset($_POST["submitButton"])){
    

    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

    $wasSuccessful = $account->login($username, $password);

    if($wasSuccessful){
        $_SESSION["userLoggedIn"] = $username;
        header("Location: index.php");
     } 
}

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YeniTube</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    

</head>
<body>
    <div class="signInContainer">

        <div class="column">

            <div class="header">
      
            <img src="assets/images/icons/YeniTube-logo.png" alt="Site logo" title="logo">
            <h3>SignIn</h3>
            <span>to continue to YeniTube</span>

             </div>


            <div class="loginForm">
                <form action="signIn.php" method="POST">
                <?php echo $account->getError(Constants::$loginFailed);   ?>
                <input type="text" name="username"  placeholder="Username" value="<?php getInputValue('username');?>" required autocomplete="off">
                <input type="password" name="password" placeholder="Password" required autocomplete="off">
                <input type="submit" name="submitButton" value="SUBMIT">


                </form>

            </div>

                <a class="signInMessage" href="signUp.php">Dont have an account yet? Sign Up here!</a>

           
        </div>



    </div>


</body>
</html>