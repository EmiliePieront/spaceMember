
                <?php include "components/header.php";?>

                <section class="body">
                        <div class="box">
                                <div class="borderColor marginRight">
                                        <div class="content">
                                                <title>My personnal page made with PHP and MySQL</title>
                                                <p>What a very good day</p>
                                                <p>I try to make this little project to improve my skills with PHP and mySQL.</p>
                                                <p>I have some ideas to complete this project but i have a lot of other projects so i don't have any time to do all of them. </p>
                                        </div>
                                        
                                </div>
                                <div class="aside borderColor">
                                <div class="content">
                                                <h2 Class="h3">To see the last members, please login.</h2>
                                                <?php 
                                                        if(isset($_SESSION["connect"])){
                                                                $x = 1;
                                                                $sql =  'SELECT username, email FROM users ORDER BY creation_date DESC LIMIT 5';
                                                                echo '<ul>';
                                                                foreach  ($bddLocal->query($sql) as $row) {
                                                ?>
                                                                        
                                                                                <li><div><?php echo $x.". ".$row["username"] ;?></li>
                                                <?php      
                                                                        $x++;
                                                                }
                                                                echo "</ul>";
                                                        }
                                                ?>
                                </div>
                                </div>
                        </div>
                </section>

                <?php include "components/footer.php";?>