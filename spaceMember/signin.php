<?php include "components/header.php";
        if(isset($_SESSION["connect"])){
            header("location: ../spaceMember/index.php");
            exit();
        }

        ?>
        <?php require "components/dbconnectLocal.php";?>

        
        <?php
        if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"])){
            $username = htmlspecialchars($_POST["username"]);
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);

            if($password != $confirmPassword){
                header("location: ?error=1&pass=1");
                exit();
    
            }
            // If the email is already used : 
            $req = $bddLocal->prepare("SELECT * FROM users WHERE email = ?");
            $req->execute(array($email));
            while ($email = $req->fetch()){
                if ($_POST["email"] == $email["email"]){
                    header("location: ?error=1&usedemail=1");
                    exit();
                }
            }
            $email = htmlspecialchars($_POST["email"]);
       
            // If the username is already used : 
            $req = $bddLocal->prepare("SELECT * FROM users WHERE username = ?");
            $req->execute(array($username));
            while ($username = $req->fetch()){
                if ($_POST["username"] == $username["username"]){
                    header("location: ?error=1&usedusername=1");
                    exit();
                }
            }
            $username = htmlspecialchars($_POST["username"]);

            //Hash 
            $secret = htmlspecialchars(sha1($email).rand());
            $secret = htmlspecialchars(sha1($secret).time().time());

            //Password hash 
            $password = htmlspecialchars("naxx".sha1($password."geek")."1990");

            //Send request :
            $req = $bddLocal->prepare("INSERT INTO users(username, email, password, secret) VALUES(?, ?, ?, ?)");
            $req->execute(array($username, $email, $password, $secret));
            header('location: ?success=1&user='.$username);
            exit();
        }

        ?>
        
        <div class="sectionConnectionSignin">
            <div class="connection borderColor m-3">
                <div class="container p-4">
                    <h1 class="text-center mb-2">Inscription</h1>
                    <p class="m-0">Welcome ! Do you want to see more content? Please sign up or login</p>

                    <?php 
                        if (isset($_GET["error"])){
                            if(isset($_GET["pass"])){
                    ?>
                                <div class="mt-3 passError center">
                                    <p>Passwords are differents. Please enter the same password.</p>
                                </div>
                    <?php
                            } else if(isset($_GET["usedemail"])){ 
                    ?>
                                <div class="mt-3 passError center">
                                    <p>Email is already used. Please enter an other email.</p>
                                </div>
                    <?php
                            } else if(isset($_GET["usedusername"])){ 
                    ?>
                                <div class="mt-3 passError center">
                                    <p>This username is already used. Please enter an other email.</p>
                                </div>
                    <?php
                            }
                        } else if(isset($_GET["success"])){
                    ?>
                            <div class="mt-3 success center">
                                <p>Your account is successfully created <?php echo $_GET["user"];?>. Please login.</p>
                            </div>                                
                    <?php
                        }
                    ?>

                    <form class="inscriptionForm d-flex flex-column justify-content-center" action="signin.php" method="post">
                        <div class="mt-3 col center">
                            <label for="username">Username *</label>
                            <input type="text" name="username" placeholder="Enter your Username" required>
                        </div>
                        <div class="mt-3 center">
                            <label for="email">Email*</label>
                            <input type="email" name="email" placeholder="Enter your Email" required>
                        </div>
                        <div class="mt-3 center">
                            <label for="password">Password *</label>
                            <input type="password" name="password" placeholder="Enter your password" id="password1" class="passwords" required>
                        </div>
                        <div class="mt-3 center">
                            <label for="confirmPassword">Confirm your password *</label>
                            <input type="password" name="confirmPassword" placeholder="Enter your password" id="password2" class="passwords" required>
                        </div>
                        <button title="Send form" class="btn btn-success mt-3">Inscription</button>
                        <p class="postScriptum">* All field marked with a " * " are required.</p>
                    </form>
                    <a href="../spaceMember/login.php"><input type="submit" value="Login" id="btnLogin2" class="btn btn-success windowConnexion mt-2 mb-2"></a>
                </div>
            </div>
        </div>

        <?php include("components/footer.php");?>