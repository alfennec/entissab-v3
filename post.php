<?php

        $id_account = $_POST['id_account'];

        $nom_fr = $_POST['nom_fr'];
        $prenon_fr = $_POST['prenon_fr'];
        $nom_ar = $_POST['nom_ar'];
        $prenom_ar = $_POST['prenom_ar'];
        $cin = $_POST['cin'];
        $date_naiss = $_POST['date_naiss'];
        $lieux_naiss = $_POST['lieux_naiss'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $adress = $_POST['adress'];
        $adress_ar = $_POST['adress_ar'];
        $fct_pere = $_POST['fct_pere'];
        $fct_mere = $_POST['fct_mere'];
        $pays = $_POST['pays'];

        $annee_bac = $_POST['annee_bac'];
        $serie_bac = $_POST['serie_bac'];
        $montion_bac = $_POST['montion_bac'];


        $img_bac = $_FILES['img_bac']['name'];
        $img_bac_error = $_FILES['img_bac']['error'];
        $img_bac_type = $_FILES['img_bac']['type'];

        $img_cin = $_FILES['img_cin']['name'];
        $img_cin_error = $_FILES['img_cin']['error'];
        $img_cin_type = $_FILES['img_cin']['type'];

        $img_relever = $_FILES['img_relever']['name'];
        $img_relever_error = $_FILES['img_relever']['error'];
        $img_relever_type = $_FILES['img_relever']['type'];

        $img_etudiant = $_FILES['img_etudiant']['name'];
        $img_etudiant_error = $_FILES['img_etudiant']['error'];
        $img_etudiant_type = $_FILES['img_etudiant']['type'];

        $terms = $_POST['terms'];

        $section = "A";

        // create array variable to handle error
        $error = array();

        $msg_erreur1 = "Obligatoire, veuillez remplir ce champ !!";
        
        /*if(empty($intituler)){
            $error['intituler'] = $msg_erreur1;
        }*/

        
        // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        error_reporting(E_ERROR | E_PARSE);
        $extension_bac = end(explode(".", $_FILES["img_bac"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_cin = end(explode(".", $_FILES["img_cin"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_relever = end(explode(".", $_FILES["img_relever"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_etudiant = end(explode(".", $_FILES["img_etudiant"]["name"]));

        //---------------- get image file extension bac
        if($image_error > 0) 
        {
            $error['img_bac'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_bac_type == "image/gif") ||
                ($img_bac_type == "image/jpeg") ||
                ($img_bac_type == "image/jpg") ||
                ($img_bac_type == "image/x-png") ||
                ($img_bac_type == "image/png") ||
                ($img_bac_type == "image/pjpeg")) &&
            !(in_array($extension_bac, $allowedExts)))
            {
                $error['img_bac'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
            }

        //---------------- get image file extension cin
        if($image_error > 0) 
        {
            $error['img_cin'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_cin_type == "image/gif") ||
                ($img_cin_type == "image/jpeg") ||
                ($img_cin_type == "image/jpg") ||
                ($img_cin_type == "image/x-png") ||
                ($img_cin_type == "image/png") ||
                ($img_cin_type == "image/pjpeg")) &&
            !(in_array($extension_cin, $allowedExts)))
            {
                $error['img_cin'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
            }

        //---------------- get image file extension cin
        if($image_error > 0) 
        {
            $error['img_relever'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_relever_type == "image/gif") ||
                ($img_relever_type == "image/jpeg") ||
                ($img_img_relever_typecin_type == "image/jpg") ||
                ($img_relever_type == "image/x-png") ||
                ($img_relever_type == "image/png") ||
                ($img_relever_type == "image/pjpeg")) &&
            !(in_array($extension_relever, $allowedExts)))
            {
                $error['img_relever'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
            }

        
        //---------------- get image file extension cin
        if($image_error > 0) 
        {
            $error['img_etudiant'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_etudiant_type == "image/gif") ||
                ($img_etudiant_type == "image/jpeg") ||
                ($img_etudiant_type == "image/jpg") ||
                ($img_etudiant_type == "image/x-png") ||
                ($img_etudiant_type == "image/png") ||
                ($img_etudiant_type == "image/pjpeg")) &&
            !(in_array($extension_etudiant, $allowedExts)))
            {
                $error['img_etudiant'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
            }

        
        if (!empty($id_account) && 
            !empty($nom_fr) && 
            !empty($prenon_fr) && 
            !empty($nom_ar) && 
            !empty($prenom_ar) && 
            !empty($cin) && 
            !empty($date_naiss) &&
            !empty($lieux_naiss) &&
            !empty($tel) &&
            !empty($email) &&
            !empty($adress) &&
            !empty($adress_ar) &&
            !empty($fct_pere) &&
            !empty($fct_mere) &&
            !empty($pays) &&
            !empty($annee_bac) &&
            !empty($serie_bac) &&
            !empty($montion_bac)&&
            !empty($terms))
            { 
                
                
                // create random image file name bac
                $file = preg_replace("/\s+/", "_", $_FILES['img_bac']['name']);
                $img_bac_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_bac;
                $upload = move_uploaded_file($_FILES['img_bac']['tmp_name'], 'upload/bac/'.$img_bac_up);

                // create random image file name cin
                $file = preg_replace("/\s+/", "_", $_FILES['img_cin']['name']);
                $img_cin_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_cin;
                $upload = move_uploaded_file($_FILES['img_cin']['tmp_name'], 'upload/cin/'.$img_cin_up);

                // create random image file name relever
                $file = preg_replace("/\s+/", "_", $_FILES['img_relever']['name']);
                $img_relever_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_relever;
                $upload = move_uploaded_file($_FILES['img_relever']['tmp_name'], 'upload/relever/'.$img_relever_up);

                // create random image file name etudiant
                $file = preg_replace("/\s+/", "_", $_FILES['img_etudiant']['name']);
                $img_etudiant_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_etudiant;
                $upload = move_uploaded_file($_FILES['img_etudiant']['tmp_name'], 'upload/etudiant/'.$img_etudiant_up);

            // insert new data to menu table
            $sql_query = "INSERT INTO inscription_nv (
                id_account, 
                nom_fr, 
                prenon_fr, 
                nom_ar, 
                prenom_ar, 
                cin, 
                date_naiss, 
                lieux_naiss,
                tel,
                email,
                adress,
                adress_ar,
                fct_pere,
                fct_mere, 
                pays,
                annee_bac,
                serie_bac,
                montion_bac,
                img_bac,
                img_cin,
                img_relever,
                img_etudiant,
                terms,
                section
                ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) 
            {    
                // Bind your variables to replace the ?s
                $stmt->bind_param('ssssssssssssssssssssssss', 
                        $id_account, 
                        $nom_fr, 
                        $prenon_fr, 
                        $nom_ar, 
                        $prenom_ar, 
                        $cin, 
                        $date_naiss, 
                        $lieux_naiss,
                        $tel,
                        $email,
                        $adress,
                        $adress_ar,
                        $fct_pere,
                        $fct_mere, 
                        $pays,
                        $annee_bac,
                        $serie_bac,
                        $montion_bac,
                        $img_bac_up,
                        $img_cin_up,
                        $img_relever_up,
                        $img_etudiant_up,
                        $terms,
                        $section
                            );
                // Execute query
                $stmt->execute();
                // store result 
                $result = $stmt->store_result();
                $stmt->close();
            }           
            
            if ($result) 
            {
                $error['add_radio'] = "<br><div class='alert alert-info'>Votre Inscription est ajoutée avec succès ...</div>";
                header("location: dashboard.php");
            } else {
                $error['add_radio'] = "<br><div class='alert alert-danger'>Échec de l'inscription Veuillez Réeseyer ultérierement</div>";
            }
        }else
        {
            $error['add_radio'] = $msg_erreur1;
        }

?>