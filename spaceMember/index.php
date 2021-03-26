
                <?php include "components/header.php";?>

                <section class="body">
                        <div class="box">
                                <div class="borderColor marginRight">
                                        <div class="content">
                                                <title>Lorem Ipsum</title>
                                                <p>What a very good day</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti iste repudiandae at dolorem itaque sed id nulla, quae, rerum nisi laudantium. Nulla optio labore delectus a ab illum! Voluptate, impedit! Laudantium quibusdam quia ea quae repellendus at cum cupiditate atque!</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit suscipit autem maiores soluta adipisci provident quasi. Reprehenderit architecto at accusamus?</p>
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