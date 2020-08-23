<style>
    input[type=date]:required:invalid::-webkit-datetime-edit 
    {
        color: transparent;
    }

    input[type=date]:focus::-webkit-datetime-edit 
    {
        color: black !important;
    }
</style>

<?php include ('functions.php'); ?>

<?php


     
    if(isset($_POST['btnAdd']))
    {
                
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
            } else {
                $error['add_radio'] = "<br><div class='alert alert-danger'>Échec de l'inscription Veuillez Réeseyer ultérierement</div>";
            }
        }else
        {
            $error['add_radio'] = $msg_erreur1;
        }
            
    }
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>

                </h2>
            </div>

            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Formulaire d'inscription</h2>

                            <?php echo isset($error['add_radio']) ? $error['add_radio'] : '';?>

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            <div class="text-success">
                                <strong>Consigne à suivre !</strong> le candidat est invité à saisir ses informations personnelles, Cliquez sur suivant et compléter vos informations personnelles et diplôme puis scannée vos documents et valider le formulaire.
                            </div>

                            <br>
                                
                            <div class="text-danger">
                                <strong>N.B:</strong> Toute fausse information entraînera l'annulation de votre inscription.
                            </div>

                            <br>

                            <form id="wizard_with_validation" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_account"  value="<?php echo $data['id']; ?>">

                                <h3>Vos informations</h3>
            
                                <fieldset>

                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="nom_fr" class="form-control" required>
                                                    <label class="form-label">Nom *</label>
                                                </div>
                                            </span>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label" style="width:100%;text-align:right">* الاسم العائلي</label>
                                                    <input type="text" class="form-control" name="nom_ar" style="" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Prénom *</label>
                                                    <input type="text" class="form-control" name="prenon_fr" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label" style="width:100%;text-align:right">* الاسم الشخصي</label>
                                                    <input type="text" class="form-control" name="prenom_ar" style="text-align:right" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">CIN *</label>
                                                    <input type="text" class="form-control" name="cin" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Date de naissance *</label>
                                                    <input type="date" class="form-control" name="date_naiss" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Lieux de naissance *</label>
                                                    <input type="text" class="form-control" name="lieux_naiss" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Tél *</label>
                                                    <input type="text" class="form-control" name="tel" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Email *</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Pays *</label>
                                                    <input type="text" class="form-control" name="pays" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Adresse *</label>
                                                    <input type="text" class="form-control" name="adress" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label" style="width:100%;text-align:right">* العنوان الشخصي</label>
                                                    <input type="text" class="form-control" name="adress_ar" style="text-align:right" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Fonction du père *</label>
                                                    <input type="text" class="form-control" name="fct_pere" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Fonction de la mère *</label>
                                                    <input type="text" class="form-control" name="fct_mere" required>
                                                </div>
                                            </span>
                                        </div>

                                    </div>
                                    
                                </fieldset>

                                <h3>Information du diplôme </h3>
                                <fieldset>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Serie du bacalauriat *</label>
                                                <input type="text" class="form-control" name="serie_bac" required>
                                            </div>
                                        </span>
                                    </div>  

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Année d'obtention du bacalauriant</label>
                                                <input type="text" class="form-control" name="annee_bac" required>
                                            </div>
                                        </span>
                                    </div>    
            
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Montion du bacalauriat *</label>
                                                <input type="text" class="form-control" name="montion_bac" required>
                                            </div>
                                        </span>
                                    </div>   

                                   
                                </fieldset>

                                <h3>Fichier scanées </h3>
                                <fieldset>

                                    
                                    <div class="col-sm-6">
                                        <div class="font-12">Bacalauriat</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_bac" id="img_bac" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_bac']) ? $error['img_bac'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Carte d'Identité Nationale</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_cin" id="img_cin" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_cin']) ? $error['img_cin'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Relever de note (Optionel )</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_relever" id="img_relever" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif"/>
                                                <div class="div-error"><?php echo isset($error['img_relever']) ? $error['img_relever'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Photo </div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_etudiant" id="img_etudiant" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_etudiant']) ? $error['img_etudiant'] : '';?></div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <input id="terms-2" name="terms" type="checkbox" required>
                                        <label for="terms-2">Je certifie sur l'honneur l'exactitude des renseignements fournis .</label>
                                    </div>

                                    <div class="col-sm-12">
                                        <center>
                                            <button type="submit" name="btnAdd" class="btn bg-blue waves-effect pull-center"><h4>Valider votre inscription ici ...</h4></button>
                                        </center>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>