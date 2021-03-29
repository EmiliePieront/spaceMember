<?php 

        if(isset($_COOKIE["log"])){

            $secret = htmlspecialchars($_COOKIE["log"]);

            require("components/dbconnect.php");
            $req = $bddLocal->prepare('SELECT count(*) as numberAccount FROM users WHERE secret = ?');
            $req->execute(array($secret));

            while($user = $req->fetch()){

                if($user['numberAccount'] == 1){
                    $reqUser = $bddLocal->prepare("SELECT * from users where secret = ?");
                    $reqUser->execute(array($secret));
                    
                    while ($userAccount = $reqUser->fetch()){
                        $_SESSION['connect'] = 1;
                        $_SESSION['email'] = $userAccount['email'];
                    }
                }
            }
        }
?>