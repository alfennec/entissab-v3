<?php

    include_once('includes/config.php');


    // if user click Login button
    if(isset($_POST['btnLogin'])) 
    {
        // get username and password
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        // set time for session timeout
        $currentTime = time() + 25200;
        $expired = 3600;


        // create array variable to handle error
        $error = array();

        // check whether $username is empty or not
        if(empty($email)) {
            $error['email'] = "*Enter votre Massar.";
        }

        if(empty($pass)) {
            $error['pass'] = "*Enter Date de naissance.";
        }

       

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
                
                if($num == 1) 
                {
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['timeout'] = $currentTime + $expired;
                    header("location: dashboard.php");
                }else 
                {
                    $error['failed'] = "Votre code Massar ou date de naissance n'est pas valide !";
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
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Adresse éléctronique (email)" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Mot de passe" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-8 p-t-5"></div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" type="submit" name="btnLogin">Valider</button>
                        </div>
                    </div>
                </form>

                <div class="custom-padding1 pull-right">
                    <a href="inscription.php" style="color:#337ab7">Vous n'avez pas un compte , cliquer ici !</a>
                </div>
                <br><br>
            </div>
        </div>
    </div>