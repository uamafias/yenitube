<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php"); 
require_once("includes/classes/Account.php"); 
require_once("includes/classes/Constants.php"); 

$account = new Account($con);


if(isset($_POST["submitButton"])){
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);

    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);

    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
    
    
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
    
    $wasSuccessful = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

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
            <h3>Sign Up</h3>
            <span>to continue to YeniTube</span>

             </div>


            <div class="loginForm">
                <form action="signUp.php" method="POST">
                    <?php echo $account->getError(Constants::$firstNameCharacters);   ?>
                    <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue('firstName');?>" autocomplete="off" required>
                    
                    <?php echo $account->getError(Constants::$lastNameCharacters);   ?>
                    <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue('lastName');?>" autocomplete="off" required>

                    <?php echo $account->getError(Constants::$userNameCharacters);   ?>
                    <?php echo $account->getError(Constants::$usernameTaken);   ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue('username');?>" autocomplete="off" required>

                    <?php echo $account->getError(Constants::$emailsDoNotMatch);   ?>
                    <?php echo $account->getError(Constants::$emailsInvalid);   ?>
                    <?php echo $account->getError(Constants::$emailTaken);   ?>
                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue('email');?>" autocomplete="off" required>
                    <input type="email" name="email2" placeholder="Confirm email" value="<?php getInputValue('email2');?>" autocomplete="off" required>

                    <?php echo $account->getError(Constants::$passwordsDoNotMatch);   ?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric);   ?>
                    <?php echo $account->getError(Constants::$passwordLength);   ?>
                    <input type="password" name="password" placeholder="Password"  autocomplete="off" required>
                    <input type="password" name="password2" placeholder="Confirm password"  autocomplete="off" required>
   
                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>

            </div>

                <a class="signInMessage" href="signIn.php">Already have an account? Sign in here!</a>

           
        </div>



    </div>


</body>
</html>