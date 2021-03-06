<?php
    /**
     * Created by Yaiba.
     * Date: 24/03/2016
     * Time: 11:05
     */

    include_once('../../includes/includes.php');
    include_once('../../model/modelsLoader.php');

    // Changes the maximum execution time for this script to 30 minutes
    set_time_limit(18000);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //Changes the maximum memory used by this script to 512 Mo
    ini_set('memory_limit', '512M');

    /*
     *
     * Function used to feed the database with the excel files
     * This is where you will have to update fields if their name changes
     *
     */

    function sendDB($file){
        $start = microtime(true);
        // Sets the variable used in the return; Array with the answer of each file
        $reponse = array();


        // Rendez vous
        if(isset($file['rdvFile']) && !empty($file['rdvFile']['tmp_name'])){
            // Loads the file
            @$excel = PHPExcel_IOFactory::load($file['rdvFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects RDV
                if($i!=0){
                    $id_rdv = $sheet->getCellByColumnAndRow(intval(array_search('N° RDV',$headers[0])),$row->getRowIndex())->getValue();
                    $date_debut_rdv = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Date de Début du RDV',$headers[0])),$row->getRowIndex())->getValue());
                    $date_fin_rdv = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Date de Fin du RDV',$headers[0])),$row->getRowIndex())->getValue());
                    $site_realisateur = $sheet->getCellByColumnAndRow(intval(array_search('Site réalisateur MR',$headers[0])),$row->getRowIndex())->getValue();
                    $libelle = $sheet->getCellByColumnAndRow(intval(array_search('Libellé',$headers[0])),$row->getRowIndex())->getValue();
                    $id_materiel = $sheet->getCellByColumnAndRow(intval(array_search('Clé GMAO',$headers[0])),$row->getRowIndex())->getValue();
                    $statut = $sheet->getCellByColumnAndRow(intval(array_search('Statut',$headers[0])),$row->getRowIndex())->getValue();

                    $rdv = new rdv($id_rdv, $date_debut_rdv, $date_fin_rdv, $site_realisateur, $libelle, $id_materiel,$statut);
                    $rdv->sendDb($GLOBALS['connexion']);
                }
                $i++;
            }
            $reponse[] = "Import des RDV réussi.";
        }

        // Matériel
        if(isset($file['materielFile']) && !empty($file['materielFile']['tmp_name'])){
            // Loads the file
            $excel = PHPExcel_IOFactory::load($file['materielFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Materiel
                if($i!=0){
                    $id_materiel= $sheet->getCellByColumnAndRow(intval(array_search('Clé GMAO',$headers[0])),$row->getRowIndex())->getValue();
                    $serie = $sheet->getCellByColumnAndRow(intval(array_search('Série',$headers[0])),$row->getRowIndex())->getValue();
                    $sous_serie = $sheet->getCellByColumnAndRow(intval(array_search('Sous-série',$headers[0])),$row->getRowIndex())->getValue();
                    $numero = $sheet->getCellByColumnAndRow(intval(array_search('N° immatriculation EF',$headers[0])),$row->getRowIndex())->getValue();
                    $numero_europe = $sheet->getCellByColumnAndRow(intval(array_search('N° identification européenne',$headers[0])),$row->getRowIndex())->getValue();
                    $nom_stf = $sheet->getCellByColumnAndRow(intval(array_search('STF',$headers[0])),$row->getRowIndex())->getValue();
                    $id_flotte = $sheet->getCellByColumnAndRow(intval(array_search('Flotte',$headers[0])),$row->getRowIndex())->getValue();
                    $statut_operationnel = $sheet->getCellByColumnAndRow(intval(array_search('Statut opérationnel',$headers[0])),$row->getRowIndex())->getValue();
                    $etat_acquisition = $sheet->getCellByColumnAndRow(intval(array_search('Etat d\'acquisition',$headers[0])),$row->getRowIndex())->getValue();
                    $situation_materiel = $sheet->getCellByColumnAndRow(intval(array_search('Situation matériel',$headers[0])),$row->getRowIndex())->getValue();
                    $site_realisateur = $sheet->getCellByColumnAndRow(intval(array_search('Site réalisateur',$headers[0])),$row->getRowIndex())->getValue();
                    $coupon = $sheet->getCellByColumnAndRow(intval(array_search('Coupon',$headers[0])),$row->getRowIndex())->getValue();

                    $materiel = new materiel($id_materiel, $serie, $numero, $numero_europe, $nom_stf, $id_flotte, $statut_operationnel, $etat_acquisition, $situation_materiel, $site_realisateur , $coupon, $GLOBALS['connexion'],$sous_serie);
                    $materiel->createMaterielInDatabase($nom_stf, $GLOBALS['connexion']);

                }
                $i++;
            }
            $reponse[] = "Import du matériel réussi.";
        }

        // Demandes d'intervention
        if(isset($file['interventionFile']) && !empty($file['interventionFile']['tmp_name'])){
            // Loads the file
            @$excel = PHPExcel_IOFactory::load($file['interventionFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Intervention
                if($i!=0){
                    $id_intervention = $sheet->getCellByColumnAndRow(intval(array_search('N°',$headers[0])),$row->getRowIndex())->getValue();
                    $id_materiel = $sheet->getCellByColumnAndRow(intval(array_search('Clé GMAO',$headers[0])),$row->getRowIndex())->getValue();
                    $libelle_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Libellé de l\'intervention',$headers[0])),$row->getRowIndex())->getValue();
                    $type_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Type DI',$headers[0])),$row->getRowIndex())->getValue();
                    $statut_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Statut Intervention',$headers[0])),$row->getRowIndex())->getValue();
                    $code_operation_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Code Opération',$headers[0])),$row->getRowIndex())->getValue();
                    $date_debut_previsionnel_intervention = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Objectif de démarrage',$headers[0])),$row->getRowIndex())->getValue());
                    $date_fin_previsionnelle = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Fin prévisionnelle',$headers[0])),$row->getRowIndex())->getValue());
                    $date_fin_réelle = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Date-heure de fin réelle',$headers[0])),$row->getRowIndex())->getValue());
                    $site_realisateur = $sheet->getCellByColumnAndRow(intval(array_search('Site',$headers[0])),$row->getRowIndex())->getValue();
                    $date_fin_optimale = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Date optimale',$headers[0])),$row->getRowIndex())->getValue());
                    $id_coupon = $sheet->getCellByColumnAndRow(intval(array_search('N° de coupon',$headers[0])),$row->getRowIndex())->getValue();
                    $debut_rdv = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Début RDV',$headers[0])),$row->getRowIndex())->getValue());
                    $fin_rdv = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Fin RDV',$headers[0])),$row->getRowIndex())->getValue());
                    $butee_technique = dateOsmoseToDateMysql($sheet->getCellByColumnAndRow(intval(array_search('Butée technique',$headers[0])),$row->getRowIndex())->getValue());

                    $intervention = new intervention($id_intervention,$id_materiel,$libelle_intervention,$type_intervention,$statut_intervention,$code_operation_intervention,$debut_rdv,$fin_rdv,$date_debut_previsionnel_intervention,$date_fin_previsionnelle,$date_fin_réelle,$site_realisateur,$date_fin_optimale,$id_coupon,$butee_technique);

                    $intervention->insertDb($GLOBALS['connexion']);
                }
                $i++;

            }

        }

        // Restrictions
        if(isset($file['restrictionFile']) && !empty($file['restrictionFile']['tmp_name'])){
            // Loads the file
            @$excel = PHPExcel_IOFactory::load($file['restrictionFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Restriction
                if($i!=0){
                    $id_restriction= $sheet->getCellByColumnAndRow(intval(array_search('Restriction',$headers[0])),$row->getRowIndex())->getValue();
                    $description= $sheet->getCellByColumnAndRow(intval(array_search('Description',$headers[0])),$row->getRowIndex())->getValue();
                    $statut= $sheet->getCellByColumnAndRow(intval(array_search('Statut',$headers[0])),$row->getRowIndex())->getValue();
                    $motif_de_pose= $sheet->getCellByColumnAndRow(intval(array_search('Motif de pose',$headers[0])),$row->getRowIndex())->getValue();
                    $date_de_pose= $sheet->getCellByColumnAndRow(intval(array_search('Date de pose',$headers[0])),$row->getRowIndex())->getValue();
                    $id_materiel= $sheet->getCellByColumnAndRow(intval(array_search('Clé GMAO',$headers[0])),$row->getRowIndex())->getValue();
                    $id_flotte= $sheet->getCellByColumnAndRow(intval(array_search('Flotte',$headers[0])),$row->getRowIndex())->getValue();
                    $categorie= $sheet->getCellByColumnAndRow(intval(array_search('Catégorie',$headers[0])),$row->getRowIndex())->getValue();
                    $intervention_origine= $sheet->getCellByColumnAndRow(intval(array_search('Intervention origine',$headers[0])),$row->getRowIndex())->getValue();

                    $restriction = new restriction($id_restriction,$statut, $description, $categorie, $motif_de_pose, $date_de_pose, $id_flotte, $id_materiel, $intervention_origine);
                    $restriction->replaceDb($GLOBALS['connexion']);
                }
                $i++;
            }
            $reponse[] = "Import des restrictions réussi.";
        }

        // Flottes
        if(isset($file['flotteFile']) && !empty($file['flotteFile']['tmp_name'])){
            // Loads the file
            $excel = PHPExcel_IOFactory::load($file['flotteFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Flotte
                if($i!=0){
                    $id_flotte = $sheet->getCellByColumnAndRow(intval(array_search('Flotte',$headers[0])),$row->getRowIndex())->getValue();
                    $nom_flotte = $sheet->getCellByColumnAndRow(intval(array_search('Description',$headers[0])),$row->getRowIndex())->getValue();
                    $stf = $sheet->getCellByColumnAndRow(intval(array_search('STF',$headers[0])),$row->getRowIndex())->getValue();
                    $flotte = new flotte($id_flotte,$nom_flotte,trim($stf),$GLOBALS['connexion']);

                    // Creates Flotte in Database
                    $flotte->createFlotteInDatabase($GLOBALS['connexion']);
                }
                $i++;

            }
            $reponse[] = "Import des flottes réussi.";
        }
        // On verifie qu'il n'y a pas de MR dispo avec DI ouvertes dessus
        $queryMR = "SELECT DISTINCT(m.id_materiel) FROM materiel m JOIN intervention i ON m.id_materiel = i.id_materiel WHERE m.statut_operationnel = \"Dispo exploitation\" AND (i.statut_intervention = \"ENCOURSREAL\" OR i.statut_intervention = \"NOTIFIE\")";
        $queryMR = $GLOBALS['connexion']->prepare($queryMR);
        $queryMR->execute();
        $mrDispo = $queryMR->fetchAll(PDO::FETCH_ASSOC);

        foreach ($mrDispo as $mr){
                $materiel = materiel::findMrById($mr['id_materiel'], $GLOBALS['connexion']);

                $array['id_type_alerte']=7;
                $array['texte_alerte'] = "Le MR ".$materiel->getNumero()." est dispo exploitation alors que les DI ne sont pas cloturées";
                $array['id_gof']=null;
                $array['id_materiel']=$materiel->getIdMateriel();
                $array['id_stf']=$materiel->getIdStf();

                alerte::createAlerte($array, $GLOBALS['connexion']);
        }
        // Return of the answer once everything tried to be uploaded in DB
        return $reponse;
    }
