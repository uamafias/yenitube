<?php require_once("includes/config.php"); ?>
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
    <script src="assets/js/commonActions.js"></script>

</head>
<body>
        <div id="pageContainer">

                <div id="mastHeadContainer">
                        <button class="navShowHide"> 
                            <img src="assets/images/icons/menu.png" alt="menu.png">
                        </button>

                        <a class="logoContainer" href="index.php">
                            <img src="assets/images/icons/YeniTube-logo.png" alt="Site logo" title="logo">
                        </a>


                        <div class="searchBarContainer">
                            <form action="search.php" method="GET">
                                    <input type="text" class="searchBar" name="term" placeholder="Search...">
                                    <button class="searchButton">
                                        <img src="assets/images/icons/search.png" alt="Search">
                                    </button>
                            </form>
                        </div>

                        <div class="rightIcons">
                            <a href="upload.php">
                                <img class="upload" src="assets/images/icons/upload.png" alt="Upload Icon">
                            </a>

                            <a href="#">
                                <img class="upload" src="assets/images/profilePictures/default.png" alt="Upload Icon">
                            </a>
                        </div>
                </div>

                <div id="sideNavContainer" style="display:none;">

                </div>

                <div id="mainSectionContainer">

                    <div id="mainContentContainer">