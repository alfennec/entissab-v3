<style>
    input[type=date]:required:invalid::-webkit-datetime-edit 
    {
        color: transparent;
    }

    input[type=date]:focus::-webkit-datetime-edit 
    {
        color: black !important;
    }

    #btn2
    {
        display:none;
    }
</style>

<?php include ('functions.php'); ?>

<?php

    $the_existing_ins= false;

    // get data from user table
    $sql_query = "SELECT * FROM inscription_nv WHERE id_account = ?";

    $stmt = $connect->stmt_init();
    if($stmt->prepare($sql_query)) 
    {
        // Bind your variables to replace the ?s
        $stmt->bind_param('s', $data['id']);
        // Execute query
        $stmt->execute();
        /* store result */
        $stmt->store_result();
        $num = $stmt->num_rows;
        // Close statement object
        $stmt->close();
        
        if($num != 0) 
        {
            $the_existing_ins = true;
        }else 
        {
            $the_existing_ins = false;
        }
    }
     
    if(isset($_POST['btnAdd']))
    {
                
        $id_account = $_POST['id_account'];

        $nom_fr = $_POST['nom_fr'];
        $prenon_fr = $_POST['prenon_fr'];
        $nom_ar = $_POST['nom_ar'];
        $prenom_ar = $_POST['prenom_ar'];
        $cin = $_POST['cin'];
        $massar = $_POST['massar'];
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

        $img_bac_v = $_FILES['img_bac_v']['name'];
        $img_bac_v_error = $_FILES['img_bac_v']['error'];
        $img_bac_v_type = $_FILES['img_bac_v']['type'];

        $img_cin = $_FILES['img_cin']['name'];
        $img_cin_error = $_FILES['img_cin']['error'];
        $img_cin_type = $_FILES['img_cin']['type'];

        $img_cin_v = $_FILES['img_cin_v']['name'];
        $img_cin_v_error = $_FILES['img_cin_v']['error'];
        $img_cin_v_type = $_FILES['img_cin_v']['type'];

        $img_relever = $_FILES['img_relever']['name'];
        $img_relever_error = $_FILES['img_relever']['error'];
        $img_relever_type = $_FILES['img_relever']['type'];

        $img_etudiant = $_FILES['img_etudiant']['name'];
        $img_etudiant_error = $_FILES['img_etudiant']['error'];
        $img_etudiant_type = $_FILES['img_etudiant']['type'];

        $img_entissab = $_FILES['img_entissab']['name'];
        $img_entissab_error = $_FILES['img_entissab']['error'];
        $img_entissab_type = $_FILES['img_entissab']['type'];

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
        $extension_bac_v = end(explode(".", $_FILES["img_bac_v"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_cin = end(explode(".", $_FILES["img_cin"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_cin_v = end(explode(".", $_FILES["img_cin_v"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_relever = end(explode(".", $_FILES["img_relever"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_etudiant = end(explode(".", $_FILES["img_etudiant"]["name"]));

        error_reporting(E_ERROR | E_PARSE);
        $extension_entissab = end(explode(".", $_FILES["img_entissab"]["name"]));

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

        //---------------- get image file extension bac v
        if($image_error > 0) 
        {
            $error['img_bac_v'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_bac_v_type == "image/gif") ||
                ($img_bac_v_type == "image/jpeg") ||
                ($img_bac_v_type == "image/jpg") ||
                ($img_bac_v_type == "image/x-png") ||
                ($img_bac_v_type == "image/png") ||
                ($img_bac_v_type == "image/pjpeg")) &&
            !(in_array($extension_bac_v, $allowedExts)))
            {
                $error['img_bac_v'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
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

        //---------------- get image file extension cin v
        if($image_error > 0) 
        {
            $error['img_cin_v'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_cin_v_type == "image/gif") ||
                ($img_cin_v_type == "image/jpeg") ||
                ($img_cin_v_type == "image/jpg") ||
                ($img_cin_v_type == "image/x-png") ||
                ($img_cin_v_type == "image/png") ||
                ($img_cin_v_type == "image/pjpeg")) &&
            !(in_array($extension_cin_v, $allowedExts)))
            {
                $error['img_cin_v'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
            }

        //---------------- get image file extension cin
        if($image_error > 0) 
        {
            $error['img_relever'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_relever_type == "image/gif") ||
                ($img_relever_type == "image/jpeg") ||
                ($img_relever_type == "image/jpg") ||
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

        //---------------- get image file extension entissab
        if($image_error > 0) 
        {
            $error['img_entissab'] = " <span class='font-12 col-red'>Vous n'avez pas insérer une images !!</span>";
        } else if(!(($img_entissab_type == "image/gif") ||
                ($img_entissab_type == "image/jpeg") ||
                ($img_entissab_type == "image/jpg") ||
                ($img_entissab_type == "image/x-png") ||
                ($img_entissab_type == "image/png") ||
                ($img_entissab_type == "image/pjpeg")) &&
            !(in_array($extension_entissab, $allowedExts)))
            {
                $error['img_entissab'] = " <span class='font-12'>Le type d'image doit etre en jpg, jpeg, ou bien png !</span>";
            }

        
        if (!empty($id_account) && 
            !empty($nom_fr) && 
            !empty($prenon_fr) && 
            !empty($nom_ar) && 
            !empty($prenom_ar) && 
            !empty($cin) && 
            !empty($massar) &&
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

                // create random image file name bac v
                $file = preg_replace("/\s+/", "_", $_FILES['img_bac_v']['name']);
                $img_bac_v_up = $nom_fr."_".$prenon_fr."_verso_".date("Y-m-d").".".$extension_bac_v;
                $upload = move_uploaded_file($_FILES['img_bac_v']['tmp_name'], 'upload/bac/'.$img_bac_v_up);

                // create random image file name cin
                $file = preg_replace("/\s+/", "_", $_FILES['img_cin']['name']);
                $img_cin_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_cin;
                $upload = move_uploaded_file($_FILES['img_cin']['tmp_name'], 'upload/cin/'.$img_cin_up);

                // create random image file name cin
                $file = preg_replace("/\s+/", "_", $_FILES['img_cin_v']['name']);
                $img_cin_v_up = $nom_fr."_".$prenon_fr."_verso_".date("Y-m-d").".".$extension_cin_v;
                $upload = move_uploaded_file($_FILES['img_cin_v']['tmp_name'], 'upload/cin/'.$img_cin_v_up);

                // create random image file name relever
                $file = preg_replace("/\s+/", "_", $_FILES['img_relever']['name']);
                $img_relever_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_relever;
                $upload = move_uploaded_file($_FILES['img_relever']['tmp_name'], 'upload/relever/'.$img_relever_up);

                // create random image file name etudiant
                $file = preg_replace("/\s+/", "_", $_FILES['img_etudiant']['name']);
                $img_etudiant_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_etudiant;
                $upload = move_uploaded_file($_FILES['img_etudiant']['tmp_name'], 'upload/etudiant/'.$img_etudiant_up);

                // create random image file name etudiant
                $file = preg_replace("/\s+/", "_", $_FILES['img_entissab']['name']);
                $img_entissab_up = $nom_fr."_".$prenon_fr."_".date("Y-m-d").".".$extension_entissab;
                $upload = move_uploaded_file($_FILES['img_entissab']['tmp_name'], 'upload/entissab/'.$img_entissab_up);

            // insert new data to menu table
            $sql_query = "INSERT INTO inscription_nv (
                id_account, 
                nom_fr, 
                prenon_fr, 
                nom_ar, 
                prenom_ar, 
                cin,
                massar, 
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
                img_bac_v,
                img_cin,
                img_cin_v,
                img_relever,
                img_etudiant,
                img_entissab,
                terms,
                section
                ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) 
            {    
                // Bind your variables to replace the ?s
                $stmt->bind_param('ssssssssssssssssssssssssssss', 
                        $id_account, 
                        $nom_fr, 
                        $prenon_fr, 
                        $nom_ar, 
                        $prenom_ar, 
                        $cin, 
                        $massar,
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
                        $img_bac_v_up,
                        $img_cin_up,
                        $img_cin_v_up,
                        $img_relever_up,
                        $img_etudiant_up,
                        $img_entissab_up,
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
                $error['add_radio'] = "<br><div class='alert alert-info'>Votre inscription est ajoutée avec succès ...</div>";
                header("location: dashboard.php");
            } else {
                $error['add_radio'] = "<br><div class='alert alert-danger'>Échec de l'inscription veuillez réessayer ultérierement</div>";
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

            <?php if(!$the_existing_ins){?>
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

                                <h3>Informations générales</h3>
            
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
                                                    <input type="text" class="form-control" name="nom_ar" style="text-align:right" id="text1" onkeyup="arabicValue(text1)" required>
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
                                                    <input type="text" class="form-control" name="prenom_ar" style="text-align:right" id="text2" onkeyup="arabicValue(text2)" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">N° de la Carte d'Identité Nationale (C.I.N) *</label>
                                                    <input type="text" class="form-control" name="cin" required>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <span class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Code Massar de l'Etudiant * </label>
                                                    <input type="text" class="form-control" name="massar" required>
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
                                                    <input type="text" class="form-control" name="adress_ar" style="text-align:right" id="text3" onkeyup="arabicValue(text3)" required>
                                                </div>
                                            </span>
                                        </div>

                                        
                                        <div class="form-group col-sm-6">
                                            <div class="font-12">Pays *</div>
                                            <select class="form-control show-tick" name="pays" id="pays" required>
                                                <option>-- Veuillez sélectionner un choix --</option>
                                                <option value="212">
										AFGHANISTAN</option>
																	<option value="303">
										AFRIQUE DU SUD</option>
																	<option value="125">
										ALBANIE</option>
																	<option value="352">
										ALGERIE</option>
																	<option value="109">
										ALLEMAGNE</option>
																	<option value="130">
										ANDORRE</option>
																	<option value="395">
										ANGOLA</option>
																	<option value="441">
										ANTIGUA ET BARBUDA</option>
																	<option value="431">
										ANTILLES NEERLANDAISES</option>
																	<option value="201">
										ARABIE SAOUDITE</option>
																	<option value="415">
										ARGENTINE</option>
																	<option value="252">
										ARMENIE</option>
																	<option value="519">
										ARUBA</option>
																	<option value="501">
										AUSTRALIE</option>
																	<option value="990">
										AUTRES pays</option>
																	<option value="110">
										AUTRICHE</option>
																	<option value="253">
										AZERBAIDJAN</option>
																	<option value="436">
										BAHAMAS</option>
																	<option value="249">
										BAHREIN</option>
																	<option value="246">
										BANGLADESH</option>
																	<option value="434">
										BARBADE</option>
																	<option value="131">
										BELGIQUE</option>
																	<option value="429">
										BELIZE</option>
																	<option value="327">
										BENIN</option>
																	<option value="521">
										BERMUDES</option>
																	<option value="214">
										BHOUTAN</option>
																	<option value="148">
										BIELORUSSIE</option>
																	<option value="418">
										BOLIVIE</option>
																	<option value="118">
										BOSNIE HERZEGOVINE</option>
																	<option value="347">
										BOTSWANA</option>
																	<option value="416">
										BRESIL</option>
																	<option value="225">
										BRUNEI</option>
																	<option value="111">
										BULGARIE</option>
																	<option value="331">
										BURKINA FASO</option>
																	<option value="321">
										BURUNDI</option>
																	<option value="234">
										CAMBODGE</option>
																	<option value="322">
										CAMEROUN</option>
																	<option value="401">
										CANADA</option>
																	<option value="396">
										CAP VERT</option>
																	<option value="323">
										CENTRAFRIQUE</option>
																	<option value="308">
										CHAGOS(ARCHIPEL)</option>
																	<option value="417">
										CHILI</option>
																	<option value="216">
										CHINE POPULAIRE</option>
																	<option value="254">
										CHYPRE</option>
																	<option value="419">
										COLOMBIE</option>
																	<option value="397">
										COMORES</option>
																	<option value="324">
										CONGO</option>
																	<option value="238">
										COREE DU NORD</option>
																	<option value="239">
										COREE DU SUD</option>
																	<option value="406">
										COSTA RICA</option>
																	<option value="326">
										COTE D'IVOIRE</option>
																	<option value="119">
										CROATIE</option>
																	<option value="407">
										CUBA</option>
																	<option value="101">
										DANEMARK</option>
																	<option value="399">
										DJIBOUTI</option>
																	<option value="438">
										DOMINIQUE</option>
																	<option value="301">
										EGYPTE</option>
																	<option value="414">
										EL SALVADOR</option>
																	<option value="247">
										EMIRATS ARABES UNIS</option>
																	<option value="420">
										EQUATEUR</option>
																	<option value="317">
										ERYTHREE</option>
																	<option value="134">
										ESPAGNE</option>
																	<option value="106">
										ESTONIE</option>
																	<option value="404">
										ETATS UNIS</option>
																	<option value="315">
										ETHIOPIE</option>
																	<option value="156">
										EX REPUBLIQUE YOUGOSLAVE DE MACEDOINE I</option>
																	<option value="508">
										FIDJI</option>
																	<option value="105">
										FINLANDE</option>
																	<option value="996">
										FRANCE</option>
																	<option value="328">
										GABON</option>
																	<option value="304">
										GAMBIE</option>
																	<option value="255">
										GEORGIE</option>
																	<option value="329">
										GHANA</option>
																	<option value="133">
										GIBRALTAR</option>
																	<option value="132">
										GRANDE BRETAGNE</option>
																	<option value="126">
										GRECE</option>
																	<option value="435">
										GRENADE ETGRENADINES</option>
																	<option value="522">
										GUADELOUPE</option>
																	<option value="523">
										GUAM</option>
																	<option value="409">
										GUATEMALA</option>
																	<option value="330">
										GUINEE</option>
																	<option value="392">
										GUINEE BISSAU</option>
																	<option value="314">
										GUINEE EQUATORIALE</option>
																	<option value="524">
										GUYANA</option>
																	<option value="428">
										GUYANE</option>
																	<option value="410">
										HAITI</option>
																	<option value="411">
										HONDURAS</option>
																	<option value="230">
										HONG KONG</option>
																	<option value="112">
										HONGRIE</option>
																	<option value="515">
										ILE MARSHALL</option>
																	<option value="390">
										ILE MAURICE</option>
																	<option value="525">
										ILES CAIMAN</option>
																	<option value="526">
										ILES COOK</option>
																	<option value="505">
										ILES DU PACIFIQUE</option>
																	<option value="427">
										ILES MALOUINES</option>
																	<option value="527">
										ILES VIERGES (ETATS UNIS)</option>
																	<option value="528">
										ILES VIERGES (ROYAUME UNIS)</option>
																	<option value="223">
										INDE</option>
																	<option value="231">
										INDONESIE</option>
																	<option value="203">
										IRAK</option>
																	<option value="204">
										IRAN</option>
																	<option value="136">
										IRLANDE</option>
																	<option value="102">
										ISLANDE</option>
																	<option value="207">
										ISRAEL</option>
																	<option value="127">
										ITALIE</option>
																	<option value="426">
										JAMAIQUE</option>
																	<option value="217">
										JAPON</option>
																	<option value="222">
										JORDANIE</option>
																	<option value="256">
										KAZAKHSTAN</option>
																	<option value="332">
										KENYA</option>
																	<option value="257">
										KIRGHISTAN</option>
																	<option value="513">
										KIRIBATI</option>
																	<option value="240">
										KOWEIT</option>
																	<option value="529">
										LA REUNION</option>
																	<option value="241">
										LAOS</option>
																	<option value="348">
										LESOTHO</option>
																	<option value="107">
										LETTONIE</option>
																	<option value="205">
										LIBAN</option>
																	<option value="302">
										LIBERIA</option>
																	<option value="316">
										LIBYE</option>
																	<option value="113">
										LIECHTENSTEIN</option>
																	<option value="108">
										LITHUANIE</option>
																	<option value="137">
										LUXEMBOURG</option>
																	<option value="232">
										MACAO</option>
																	<option value="333">
										MADAGASCAR</option>
																	<option value="227">
										MALAISIE</option>
																	<option value="334">
										MALAWI</option>
																	<option value="229">
										MALDIVES</option>
																	<option value="335">
										MALI</option>
																	<option value="144">
										MALTE</option>
																	<option value="350">
										MAROC</option>
																	<option value="530">
										MARTINIQUE</option>
																	<option value="336">
										MAURITANIE</option>
																	<option value="405">
										MEXIQUE</option>
																	<option value="516">
										MICRONESIE</option>
																	<option value="151">
										MOLDAVIE</option>
																	<option value="138">
										MONACO</option>
																	<option value="242">
										MONGOLIE</option>
																	<option value="393">
										MOZAMBIQUE</option>
																	<option value="224">
										MYANMAR</option>
																	<option value="311">
										NAMIBIE</option>
																	<option value="507">
										NAURU</option>
																	<option value="215">
										NEPAL</option>
																	<option value="412">
										NICARAGUA</option>
																	<option value="337">
										NIGER</option>
																	<option value="338">
										NIGERIA</option>
																	<option value="532">
										NIOUE</option>
																	<option value="103">
										NORVEGE</option>
																	<option value="533">
										NOUVELLE CALEDONIE</option>
																	<option value="502">
										NOUVELLE ZELANDE</option>
																	<option value="250">
										OMAN</option>
																	<option value="339">
										OUGANDA</option>
																	<option value="258">
										OUZBEKISTAN</option>
																	<option value="213">
										PAKISTAN</option>
																	<option value="261">
										PALESTINE</option>
																	<option value="413">
										PANAMA</option>
																	<option value="510">
										PAPOUASIE NOUVELLE GUINEE</option>
																	<option value="421">
										PARAGUAY</option>
																	<option value="135">
										PAY BAS</option>
																	<option value="422">
										PEROU</option>
																	<option value="220">
										PHILIPPINES</option>
																	<option value="122">
										POLOGNE</option>
																	<option value="535">
										POLYNESIE FRANCAISE</option>
																	<option value="432">
										PORTO RICO</option>
																	<option value="139">
										PORTUGAL</option>
																	<option value="248">
										QATAR</option>
																	<option value="517">
										REPUBLIQUE DES ILES PALAOS</option>
																	<option value="116">
										REPUBLIQUE TCHEQUE</option>
																	<option value="114">
										ROUMANIE</option>
																	<option value="123">
										RUSSIE</option>
																	<option value="340">
										RWANDA</option>
																	<option value="408">
										SAINT DOMINGUE</option>
																	<option value="537">
										SAINT KITTS ET NEVIS</option>
																	<option value="128">
										SAINT MARIN</option>
																	<option value="538">
										SAINT SIEGE</option>
																	<option value="440">
										SAINT VINCENT</option>
																	<option value="439">
										SAINTE LUCIE</option>
																	<option value="512">
										SALOMON</option>
																	<option value="540">
										SAMOA AMERICAINES</option>
																	<option value="506">
										SAMOA OCCIDENTALES</option>
																	<option value="394">
										SAO TOME ET PRINCIPE</option>
																	<option value="341">
										SENEGAL</option>
																	<option value="398">
										SEYCHELLES</option>
																	<option value="342">
										SIERRA LEONE</option>
																	<option value="226">
										SINGAPOUR</option>
																	<option value="117">
										SLOVAQUIE</option>
																	<option value="145">
										SLOVENIE</option>
																	<option value="318">
										SOMALIE</option>
																	<option value="343">
										SOUDAN</option>
																	<option value="235">
										SRI LANKA</option>
																	<option value="442">
										ST CHRISTOPHE NIEVES</option>
																	<option value="306">
										STE HELENE</option>
																	<option value="104">
										SUEDE</option>
																	<option value="140">
										SUISSE</option>
																	<option value="437">
										SURINAM</option>
																	<option value="391">
										SWAZILAND</option>
																	<option value="206">
										SYRIE</option>
																	<option value="259">
										TADJIKISTAN</option>
																	<option value="236">
										TAIWAN</option>
																	<option value="309">
										TANZANIE</option>
																	<option value="344">
										TCHAD</option>
																	<option value="219">
										THAILANDE</option>
																	<option value="345">
										TOGO</option>
																	<option value="509">
										TONGA OU FRIENDLY</option>
																	<option value="433">
										TRINITE ET TOBAGO</option>
																	<option value="351">
										TUNISIE</option>
																	<option value="260">
										TURKMENISTAN</option>
																	<option value="208">
										TURQUIE</option>
																	<option value="511">
										TUVALU</option>
																	<option value="155">
										UKRAINE</option>
																	<option value="423">
										URUGUAY</option>
																	<option value="514">
										VANUATU</option>
																	<option value="129">
										VATICAN</option>
																	<option value="424">
										VENEZUELA</option>
																	<option value="243">
										VIETNAM</option>
																	<option value="251">
										YEMEN</option>
																	<option value="121">
										YOUGOSLAVIE</option>
																	<option value="312">
										ZAIRE</option>
																	<option value="346">
										ZAMBIE</option>
																	<option value="310">
										ZIMBABWE</option>
                                            </select>
                                        </div> 
                                        
                                        
                                        

                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="font-12">Profession du père *</div>
                                            <select class="form-control show-tick" name="fct_pere" id="fct_pere" required>
                                                <option>-- Veuillez sélectionner un choix --</option>
                                                <option value="10">
										Agriculteur exploitant</option>
																	<option value="71">
										Ancien agriculteur exploitant</option>
																	<option value="72">
										Ancien artisan-commerce-chef entrepris</option>
																	<option value="21">
										Artisan</option>
																	<option value="37">
										Cadre administratif et commercial d'entr</option>
																	<option value="33">
										Cadre de la fonction publique</option>
																	<option value="64">
										Chauffeur</option>
																	<option value="23">
										Chef entreprise 10 salariés ou plus</option>
																	<option value="22">
										Commerçant et assimilé</option>
																	<option value="48">
										Contremaître-agent de maîtrise</option>
																	<option value="98">
										Décédé</option>
																	<option value="82">
										Eleve,Etudiant,sans activité profes</option>
																	<option value="54">
										Employé administratif d'entreprise</option>
																	<option value="52">
										Employé civil-agent de service de la FP</option>
																	<option value="55">
										Employé de commerce</option>
																	<option value="44">
										Imams-religieux</option>
																	<option value="38">
										Ingénieur cadre technique d'entreprise</option>
																	<option value="42">
										Instituteur et assimilé</option>
																	<option value="83">
										Militaires du contingent</option>
																	<option value="99">
										Non renseigné (inconnu)</option>
																	<option value="69">
										Ouvrier agricole</option>
																	<option value="67">
										Ouvrier non qualifié de type artisanal</option>
																	<option value="66">
										Ouvrier non qualifié de type industriel</option>
																	<option value="65">
										Ouvrier qualifié de la manutention,trsp</option>
																	<option value="63">
										Ouvrier qualifié de type artisanal</option>
																	<option value="62">
										Ouvrier qualifié de type industriel</option>
																	<option value="56">
										Person. service direct aux particuliers</option>
																	<option value="53">
										Policier et militaire</option>
																	<option value="34">
										Professeur, profession scientifique</option>
																	<option value="35">
										Profession information/arts/spectacles</option>
																	<option value="45">
										Profession interm adm de la fonction pub</option>
																	<option value="46">
										Profession interm adm et commerc. entrep</option>
																	<option value="43">
										Profession interm santé et  trav. social</option>
																	<option value="31">
										Profession libérale</option>
																	<option value="87">
										Retraite</option>
																	<option value="81">
										Sans Activité professionnelle</option>
																	<option value="47">
										Technicien</option>

                                            </select>
                                        </div>  
                                        
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="font-12">Profession de la mère *</div>
                                            <select class="form-control show-tick" name="fct_mere" id="fct_mere" required>
                                                <option>-- Veuillez sélectionner un choix --</option>
                                                <option value="10">
										Agriculteur exploitant</option>
																	<option value="71">
										Ancien agriculteur exploitant</option>
																	<option value="72">
										Ancien artisan-commerce-chef entrepris</option>
																	<option value="21">
										Artisan</option>
																	<option value="37">
										Cadre administratif et commercial d'entr</option>
																	<option value="33">
										Cadre de la fonction publique</option>
																	<option value="64">
										Chauffeur</option>
																	<option value="23">
										Chef entreprise 10 salariés ou plus</option>
																	<option value="22">
										Commerçant et assimilé</option>
																	<option value="48">
										Contremaître-agent de maîtrise</option>
																	<option value="98">
										Décédé</option>
																	<option value="82">
										Eleve,Etudiant,sans activité profes</option>
																	<option value="54">
										Employé administratif d'entreprise</option>
																	<option value="52">
										Employé civil-agent de service de la FP</option>
																	<option value="55">
										Employé de commerce</option>
																	<option value="44">
										Imams-religieux</option>
																	<option value="38">
										Ingénieur cadre technique d'entreprise</option>
																	<option value="42">
										Instituteur et assimilé</option>
																	<option value="83">
										Militaires du contingent</option>
																	<option value="99">
										Non renseigné (inconnu)</option>
																	<option value="69">
										Ouvrier agricole</option>
																	<option value="67">
										Ouvrier non qualifié de type artisanal</option>
																	<option value="66">
										Ouvrier non qualifié de type industriel</option>
																	<option value="65">
										Ouvrier qualifié de la manutention,trsp</option>
																	<option value="63">
										Ouvrier qualifié de type artisanal</option>
																	<option value="62">
										Ouvrier qualifié de type industriel</option>
																	<option value="56">
										Person. service direct aux particuliers</option>
																	<option value="53">
										Policier et militaire</option>
																	<option value="34">
										Professeur, profession scientifique</option>
																	<option value="35">
										Profession information/arts/spectacles</option>
																	<option value="45">
										Profession interm adm de la fonction pub</option>
																	<option value="46">
										Profession interm adm et commerc. entrep</option>
																	<option value="43">
										Profession interm santé et  trav. social</option>
																	<option value="31">
										Profession libérale</option>
																	<option value="87">
										Retraite</option>
																	<option value="81">
										Sans Activité professionnelle</option>
																	<option value="47">
										Technicien</option>

                                            </select>
                                        </div>  

                                        
                                    </div>

                                </div>
                                    
                                </fieldset>

                                <h3>Bac et équivalence</h3>
                                <fieldset>

                                    <div class="form-group col-sm-6">
                                        <div class="font-12">Série du bac *</div>
                                        <select class="form-control show-tick" name="serie_bac" id="serie_bac" required>
                                            <option>-- Veuillez sélectionner un choix --</option>
                                            <option value="0001">
                                            AGRICULTURE</option>
                                                                        <option value="0002">
                                            ARCHITECTURE</option>
                                                                        <option value="0003">
                                            ARTS ET INDUSTRIE GRAPHIQUE</option>
                                                                        <option value="0004">
                                            ARTS PLASTIQUES</option>
                                                                        <option value="0045">
                                            AUTRES</option>
                                                                        <option value="0048">
                                            BAC A</option>
                                                                        <option value="0005">
                                            BAC C</option>
                                                                        <option value="0006">
                                            BAC D</option>
                                                                        <option value="0007">
                                            BAC E</option>
                                                                        <option value="0099">
                                            BAC ETRANGER</option>
                                                                        <option value="0008">
                                            BAC F</option>
                                                                        <option value="0009">
                                            BAC G</option>
                                                                        <option value="0010">
                                            BAC MISSION</option>
                                                                        <option value="0047">
                                            BAC S</option>
                                                                        <option value="0049">
                                            BAC TECHNIQUE</option>
                                                                        <option value="0109">
                                            BATIMENT ET TRAVEAUX PUBLICS</option>
                                                                        <option value="0100">
                                            CHARIAA ORIGINELLE</option>
                                                                        <option value="0013">
                                            CHIMIE</option>
                                                                        <option value="0014">
                                            CHIMIE INDUSTRIELLE</option>
                                                                        <option value="0015">
                                            COMPTABILITE</option>
                                                                        <option value="0046">
                                            CONSTRUCTION M?CANIQUE</option>
                                                                        <option value="0016">
                                            ECONOMIE NOUVELLE</option>
                                                                        <option value="0104">
                                            EDUCATION PHYSIQUE</option>
                                                                        <option value="0134">
                                            FILIERE LANGUE ARABE</option>
                                                                        <option value="0125">
                                            FILIERE LETTRES</option>
                                                                        <option value="0127">
                                            FILIERE PHYSIQUE CHIMIE</option>
                                                                        <option value="0129">
                                            FILIERE SC. AGRONOMIQUES</option>
                                                                        <option value="0132">
                                            FILIERE SC. ECONOMIQUES</option>
                                                                        <option value="0123">
                                            FILIERE SC. ET TECHNO. ELECTRIQUE</option>
                                                                        <option value="0124">
                                            FILIERE SC. ET TECHNO. MECANIQUE</option>
                                                                        <option value="0133">
                                            FILIERE SC. GESTION COMPTABLE</option>
                                                                        <option value="0128">
                                            FILIERE SC. LA VIE ET LA TERRE</option>
                                                                        <option value="0131">
                                            FILIERE SC. MATHEMATIQUES -B-</option>
                                                                        <option value="0130">
                                            FILIERE SC.MATHEMATIQUES -A-</option>
                                                                        <option value="0135">
                                            FILIERE SCIENCES CHARIA</option>
                                                                        <option value="0126">
                                            FILIERE SCIENCES HUMAINES</option>
                                                                        <option value="0056">
                                            GENIE CHIMIQUE</option>
                                                                        <option value="0102">
                                            GENIE CIVIL</option>
                                                                        <option value="0055">
                                            GENIE INDUSTRIEL</option>
                                                                        <option value="0054">
                                            GENIE MECANIQUE</option>
                                                                        <option value="0057">
                                            INFORMATIQUE</option>
                                                                        <option value="0208">
                                            LETTRES ET SCIENCES HUMAINES</option>
                                                                        <option value="0107">
                                            LETTRES MODERNES</option>
                                                                        <option value="0101">
                                            LETTRES MODERNES ARABISEES</option>
                                                                        <option value="0025">
                                            LETTRES MODERNES BILINGUES</option>
                                                                        <option value="0111">
                                            LETTRES MODERNES SPECIALITE ALLEMANDE</option>
                                                                        <option value="0121">
                                            LETTRES MODERNES SPECIALITE ESPAGNOLE</option>
                                                                        <option value="0110">
                                            LETTRES MODERNES SPECIALITE FRANCAIS</option>
                                                                        <option value="0120">
                                            LETTRES MODERNES SPECIALITE &nbsp;ANGLAIS</option>
                                                                        <option value="0026">
                                            LETTRES ORIGINELLES</option>
                                                                        <option value="0027">
                                            LETTRES ORIGINELLES ARABISEES</option>
                                                                        <option value="0103">
                                            LETTRES SPECIALITE LANGUE</option>
                                                                        <option value="0028">
                                            MATHEMATIQUES-TECHNIQUES</option>
                                                                        <option value="0029">
                                            MECANIQUE AUTO</option>
                                                                        <option value="0030">
                                            MECANIQUE INGENIERIE</option>
                                                                        <option value="0031">
                                            MICRO-MECANIQUE</option>
                                                                        <option value="0000">
                                            SANS BAC</option>
                                                                        <option value="0206">
                                            SCIENCE ECONOMIE ET GESTION</option>
                                                                        <option value="0105">
                                            SCIENCES</option>
                                                                        <option value="0033">
                                            SCIENCES DE LA NATURE</option>
                                                                        <option value="0034">
                                            SCIENCES ECONOMIQUES</option>
                                                                        <option value="0112">
                                            SCIENCES EXPERIMENTALES</option>
                                                                        <option value="0035">
                                            SCIENCES EXPERIMENTALES ARABISEES</option>
                                                                        <option value="0036">
                                            SCIENCES EXPERIMENTALES BILINGUES</option>
                                                                        <option value="0113">
                                            SCIENCES EXPERIMENTALES SPC ALLMAND</option>
                                                                        <option value="0115">
                                            SCIENCES EXPERIMENTALES SPC ANGLAIS</option>
                                                                        <option value="0114">
                                            SCIENCES EXPERIMENTALES SPC ESPANGOL</option>
                                                                        <option value="0116">
                                            SCIENCES EXPERIMENTALES SPC FRANCAIS</option>
                                                                        <option value="0037">
                                            SCIENCES MATHEMATIQUES</option>
                                                                        <option value="0119">
                                            SCIENCES MATHEMATIQUES SPCFRANCAIS</option>
                                                                        <option value="0038">
                                            SCIENCES TECHNIQUES</option>
                                                                        <option value="0039">
                                            SECRETARIAT</option>
                                                                        <option value="0041">
                                            SECTION ESPAGNOLE</option>
                                                                        <option value="0122">
                                            SERIE ARTS APPLIQUES</option>
                                                                        <option value="0136">
                                            SERIE BAC ATIQ</option>
                                                                        <option value="0098">
                                            SERIE DE BAC NON SPECIFIEE</option>
                                                                        <option value="0042">
                                            TECHNIQUES COMMERCIALES</option>
                                                                        <option value="0043">
                                            TECHNIQUES INDUSTRIELLES</option>
                                                                        <option value="0052">
                                            TECHNIQUES ORGANISATION ADMINISTRATIVE</option>
                                                                        <option value="0053">
                                            TECHNIQUES ORGANISATION COMPTABLE</option>
                                                                        <option value="0044">
                                            TECHNIQUES QUANTITATIVES DE GESTION</option>
                                        </select>

                                        
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="font-12">Année d'obtention du bac *</div>
                                        <select class="form-control show-tick" name="annee_bac" id="annee_bac" required>
                                            <option>-- Veuillez sélectionner un choix --</option>
                                            <option value="2020">
                                            2020</option>
                                                                        <option value="2019">
                                            2019</option>
                                                                        <option value="2018">
                                            2018</option>
                                                                        <option value="2017">
                                            2017</option>
                                                                        <option value="2016">
                                            2016</option>
                                                                        <option value="2015">
                                            2015</option>
                                                                        <option value="2014">
                                            2014</option>
                                                                        <option value="2013">
                                            2013</option>
                                                                        <option value="2012">
                                            2012</option>
                                                                        <option value="2011">
                                            2011</option>
                                                                        <option value="2010">
                                            2010</option>
                                                                        <option value="2009">
                                            2009</option>
                                                                        <option value="2008">
                                            2008</option>
                                                                        <option value="2007">
                                            2007</option>
                                                                        <option value="2006">
                                            2006</option>
                                                                        <option value="2005">
                                            2005</option>
                                                                        <option value="2004">
                                            2004</option>
                                                                        <option value="2003">
                                            2003</option>
                                                                        <option value="2002">
                                            2002</option>
                                                                        <option value="2001">
                                            2001</option>
                                                                        <option value="2000">
                                            2000</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="font-12">Montion bacalauriat *</div>
                                        <select class="form-control show-tick" name="montion_bac" id="montion_bac" required>
                                            <option>-- Veuillez sélectionner un choix --</option>
                                            <option value="Passable">Passable</option>
                                            <option value="Assez-bien">Assez bien</option>
                                            <option value="Bien">Bien</option>
                                            <option value="Très-bien">Très bien</option>
                                        </select>
                                    </div>      
           

                                </fieldset>

                                <h3>Fichier scanées </h3>
                                <fieldset>

                                    
                                    <div class="col-sm-6">
                                        <div class="font-12">Bacalauriat (Recto)</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_bac" id="img_bac" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_bac']) ? $error['img_bac'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Bacalauriat (Verso)</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_bac_v" id="img_bac_v" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_bac_v']) ? $error['img_bac_v'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Carte d'Identité Nationale (Recto)</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_cin" id="img_cin" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_cin']) ? $error['img_cin'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Carte d'Identité Nationale (Verso)</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_cin_v" id="img_cin_v" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_cin_v']) ? $error['img_cin_v'] : '';?></div>
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

                                    <div class="col-sm-6">
                                        <div class="font-12">Fiche Entissab </div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_entissab" id="img_entissab" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif" required/>
                                                <div class="div-error"><?php echo isset($error['img_entissab']) ? $error['img_entissab'] : '';?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="font-12">Relever de note du bac ( Optionel )</div>
                                        <br>
                                        <div class="form-group">
                                                <input type="file" name="img_relever" id="img_relever" class="dropify-image" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png gif"/>
                                                <div class="div-error"><?php echo isset($error['img_relever']) ? $error['img_relever'] : '';?></div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <input id="terms-2" name="terms" type="checkbox" required>
                                        <label for="terms-2">Je certifie sur l'honneur l'exactitude des renseignements fournis .</label>
                                    </div>

                                    <div class="col-sm-12">
                                        <center>
                                            <!--button type="submit" name="btnAdd" id="btn2" class="btn bg-blue waves-effect pull-center" ><h4>Valider votre inscription ici ...</h4></button-->
                                        </center>
                                    </div>

                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
            <?php }else{ ?>
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Situation de votre dossier d'inscription</h2>

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

                            <br>

                            <center>
                                <h2 class="text-success" >Votre Inscription a était retenue, votre indentifiant d'inscription et : </h2>
                                <br><br>
                                <h1 style="color:red">#GHF-21<?php echo $data['id']; ?></h1>
                                <br><br>
                                <!--h4 class="text-infos">
                                    <a> Modifier vos informations avant le dernier délais , cliqué ici ! </a>
                                </!--h4-->

                                <br><br><br>

                                <h5 class="text-danger">
                                    <strong>N.B:</strong> Toute fausse information entraînera l'annulation de votre inscription.
                                </h5>

                            </center>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
            <?php } ?>
        </div>
    </section>

    <script>
		
var yas;
function arabicValue(txt) {
    yas = txt.value;
yas = yas.replace(/`/g, "ذ");
yas  = yas.replace(/q/g, "ض");
yas  = yas.replace(/w/g, "ص");
yas  = yas.replace(/e/g, "ث");
yas  = yas.replace(/r/g, "ق");
yas  = yas.replace(/t/g, "ف"); 
yas  = yas.replace(/y/g, "غ");
yas  = yas.replace(/u/g, "ع");
yas  = yas.replace(/i/g, "ه");
yas  = yas.replace(/o/g, "خ");
yas  = yas.replace(/p/g, "ح");
yas  = yas.replace(/\[/g, "ج");
yas  = yas.replace(/\]/g, "د");
yas  = yas.replace(/a/g, "ش");
yas  = yas.replace(/s/g, "س");
yas  = yas.replace(/d/g, "ي");
yas  = yas.replace(/f/g, "ب");
yas  = yas.replace(/g/g, "ل");
yas  = yas.replace(/h/g, "ا");
yas  = yas.replace(/j/g, "ت");
yas  = yas.replace(/k/g, "ن");
yas  = yas.replace(/l/g, "م");
yas = yas.replace(/\;/g, "ك");
yas  = yas.replace(/\'/g, "ط");
yas  = yas.replace(/z/g, "ئ");
yas  = yas.replace(/x/g, "ء");
yas  = yas.replace(/c/g, "ؤ");
yas  = yas.replace(/v/g, "ر");
yas  = yas.replace(/b/g, "لا");
yas  = yas.replace(/n/g, "ى");
yas  = yas.replace(/m/g, "ة");
yas  = yas.replace(/\,/g, "و");
yas  = yas.replace(/\./g, "ز");
yas  = yas.replace(/\//g, "ظ");
yas  = yas.replace(/~/g, " ّ");
yas  = yas.replace(/Q/g, "َ");
yas  = yas.replace(/W/g, "ً");
yas  = yas.replace(/E/g, "ُ");
yas  = yas.replace(/R/g, "ٌ");
yas  = yas.replace(/T/g, "لإ");
yas  = yas.replace(/Y/g, "إ");
yas  = yas.replace(/U/g, "‘");
yas  = yas.replace(/I/g, "÷");
yas  = yas.replace(/O/g, "×");
yas  = yas.replace(/P/g, "؛");
yas  = yas.replace(/A/g, "ِ");
yas  = yas.replace(/S/g, "ٍ");
yas  = yas.replace(/G/g, "لأ");
yas  = yas.replace(/H/g, "أ");
yas  = yas.replace(/J/g, "ـ");
yas  = yas.replace(/K/g, "،");
yas  = yas.replace(/L/g, "/");
yas  = yas.replace(/Z/g, "~");
yas  = yas.replace(/X/g, "ْ");
yas  = yas.replace(/B/g, "لآ");
yas  = yas.replace(/N/g, "آ");
yas  = yas.replace(/M/g, "’");
yas  = yas.replace(/\?/g, "؟");
txt.value = yas;
}
	</script>