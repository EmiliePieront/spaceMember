        <?php 
        if(isset($_SESSION["connect"])){
            header("location: ../spaceMember/index.php");
            exit();
        }

        ?>
        
        <?php include "components/header.php";?>
        <?php include "components/dbconnectLocal.php";?>
        <?php
        if(!empty($_POST["email"]) && !empty($_POST["password"])){
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);

            //Password crypt : 
            $password = htmlspecialchars("naxx".sha1($password."geek")."1990");
            $req = $bddLocal->prepare("SELECT * FROM users WHERE email = ?");
            $req->execute(array($email));
            while($user = $req->fetch()){
                if($password == $user["password"]){
                    $_SESSION["connect"] = 1;
                    $_SESSION["username"] = $user["username"];

                    //Set cookie
                    if(isset($_POST['stayConnected'])) {
                        // name, what we take as variable, time + 1 year
                        setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);
                    }
                    header('location: ?success=1');
                    exit();
                }
            }
            header('location: ?error=1');
            exit();
            
        }
        ?>
        
        <div class="sectionConnectionLogin">
            <div class="connection borderColor m-3">
                <div class="container p-4">
                    <h1 class="text-center mb-2">Connection</h1>
                    <p class="m-0 text-center">Welcome ! Glad to see you.</p>

                    <?php 
                        if (isset($_GET["error"])){
                    ?>
                            <div class="mt-3 passError center">
                                <p>Incorrect Email or Password</p>
                            </div>
                    <?php 
                        } else if (isset($_GET["success"])){
                            header("location: ../spaceMember/index.php");
                        }
                    ?>
                    <form class="inscriptionForm d-flex flex-column justify-content-center" action="login.php" method="post">
                        <div class="mt-3 center">
                            <label for="email">Email*</label>
                            <input type="email" name="email" placeholder="Enter your Email" required>
                        </div>
                        <div class="mt-3 center">
                            <label for="password">Password *</label>
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mt-3 center form-check d-flex flex-row">
                        <label class="form-check-label" for="stayConnected">
                            <input class="form-check-input me-2" name="stayConnected" type="checkbox" value="" id="stayConnected" checked>
                            Stay Connected
                        </label>
                        </div>
                        <button title="Send form" class="btn btn-success mt-3">Connection</button>
                        <p class="postScriptum">* All field marked with a " * " are required.</p>
                    </form>
                    <p class="p-0 m-0">Not already registered ? </p>
                    <a href="../spaceMember/signin.php"><input type="submit" value="Signin" id="btnSignin" class="btn btn-success mt-2 mb-2 windowConnexion"></a>
                </div>
            </div>
        </div>

        <?php include "components/footer.php";?>