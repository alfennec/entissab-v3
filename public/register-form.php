<?php

    include_once('includes/config.php');


    // if user click Login button
    if(isset($_POST['btnLogin'])) 
    {
        // get username and password
        $email  = $_POST['email'];
        $pass   = $_POST['pass'];
        $repass = $_POST['repass'];

        // create array variable to handle error
        $error = array();

        // check whether $username is empty or not
        if(empty($email)) {
            $error['email'] = "*Enter votre un email valide .";
        }

        if(empty($pass)) {
            $error['pass'] = "*Enter un mot de passe valide.";
        }

        if(empty($pass2)) {
            $error['pass2'] = "*Enter un mot de passe qui correspont au premier.";
        }

       

        if($pass == $repass)
        {
            // if username and password is not empty, check in database
            if(!empty($email) && !empty($pass)) 
            {
                // get data from user table
                $sql_query = "SELECT email, pass FROM account WHERE email = ? and pass = ?";

                $stmt = $connect->stmt_init();
                if($stmt->prepare($sql_query)) 
                {
                    // Bind your variables to replace the ?s
                    $stmt->bind_param('ss', $email, $pass);
                    // Execute query
                    $stmt->execute();
                    /* store result */
                    $stmt->store_result();
                    $num = $stmt->num_rows;
                    // Close statement object
                    $stmt->close();
                    
                    if($num == 0) 
                    {
                        $sql_query = "INSERT INTO account (email, pass) VALUES(?,?)";
                        $stmt = $connect->stmt_init();
                        if($stmt->prepare($sql_query)) 
                        {    
                            // Bind your variables to replace the ?s
                            $stmt->bind_param('ss', 
                                        $email, 
                                        $pass
                                        );
                            // Execute query
                            $stmt->execute();
                            // store result 
                            $result = $stmt->store_result();
                            $stmt->close();
                        }           
                        
                        if ($result) 
                        {
                            header("location: index.php?msg=1");
                        } else {
                            $error['failed'] = " Une erreur c'est produite lors de l'inscription, Veuillez réeseyer ultérieurement ";
                        }

                       
                    }else 
                    {
                        $error['failed'] = " Vous etes déjà inscrit sur la platforme ";
                    }
                }

            }
        }

        
    }
?>

    <div class="login-box">
        <div class="card">
            <div class="body">
                <form method="POST">

                    <center>
                        <img src="images/ic_launcher.png" width="200px" height="200px">
                        <br><br><br>
                        <div class="custom-padding1">
                           Inscription pour l'année universitaire 2020/2021
                        </div>
                        <div class="custom-padding2 col-pink"><?php echo isset($error['failed']) ? $error['failed'] : '';?></div>
                    </center>
                    
                    <br><br><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Adresse éléctronique ( email )" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Mot de Passe" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="repass"  placeholder="Retaper le mot de Passe" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-8 p-t-5"></div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" type="submit" name="btnLogin">Valider</button>
                        </div>
                    </div>

                    <div class="custom-padding1 pull-right">
                        <a href="index.php" style="color:#337ab7">Vous avez un compte , cliquer ici !</a>
                    </div>
                    <br>


                </form>
            </div>
        </div>
    </div>