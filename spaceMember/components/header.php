<?php session_start(); ?>
<?php require "components/dbconnectLocal.php";?>
<?php include "components/log.php";?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="design/main.css">
        <link rel="icon" type="image/png" href="img/redo.png">
        <title>Space Member</title>
        <!-- Favicon créé par Pixel Perfect : Icons made by Pixel perfect"https://www.flaticon.com/authors/pixel-perfect"  from www.flaticon.com -->
    </head>
    <body>
        <header class="header borderColor">
            <div class="container">
                <div>
                    <h1 class="text-center">A little project with php</h1>
                    <?php 
                    if (!isset($_SESSION["connect"])){
                    ?>
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Home</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a href="../spaceMember/login.php"><input type="submit" value="Login" id="btnLogin" ></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../spaceMember/signin.php"><input type="submit" value="Signin" id="btnSignin" ></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../spaceMember/index.php"><input type="submit" value="Home" ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                    <?php
                    } else {
                    ?>
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Navbar</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <p class="mt-3">Hello, <?= $_SESSION["username"];?></p>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../spaceMember/index.php"><input type="submit" value="Home" ></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../spaceMember/disconnect.php"><input type="submit" value="Disconnect" name="disconnect" ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </header>